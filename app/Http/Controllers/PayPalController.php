<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\OrderCompleted;
use App\Services\CartService;
use App\Services\CurrencyService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    protected $orderService;
    protected $currencyService;




    public function __construct(OrderService $orderService, CurrencyService $currencyService)
    {
        $this->orderService = $orderService;
        $this->currencyService = $currencyService;
    }

    public function paypal(Request $request)
    {

        if (!Auth()->user()) {
            return redirect()->route("login", ["next" => "payment"]);
        }

        $cartService = new CartService();
        $cart = $cartService->cartFromDb(json_decode($request->cart));

        $total_amount = 0;
        foreach ($cart as $cart_item) {
            $total_amount +=
                $cart_item["quantity"] *
                ($cart_item["discount_price"] ? $cart_item["discount_price"] : $cart_item["price"]);
        }

        $usdAmount = $this->currencyService->convertSarToUsd(sarAmount: $total_amount);

        $orderService = new OrderService();

        $order = $orderService->createOrder(
            $usdAmount,
            $total_amount,
            $cart
        );

        if (false == $order) {
            return redirect()->back()
                ->with("error", "order not completed");
        }



        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route("paypal.success", ['order_id' => $order->id]),
                "cancel_url" => route("paypal.cancel", ['order_id' => $order->id]),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "usd",
                        "value" => number_format($usdAmount, 2, '.', '')
                    ]
                ]
            ]
        ]);

        // dd( $response );

        if (isset($response['id']) && isset($response['id']) != null) {
            foreach ($response['links'] as $link) {
                # code...
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route("paypal.cancel", ['order_id' => $order->id]);

    }

    public function success(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response["status"]) && $response['status'] == "COMPLETED") {
            //code where order completed'
            $order = Order::find($request->order_id);
            $order->order_status = "completed";
            $order->save();

            // إرسال الإشعار للمستخدم
            Auth()->user()->notify(new OrderCompleted($order));

            return redirect()->route("payment")
                ->with("success", "order has been completed")
                ->with("order_completed", "order has been completed");
        }

        // code where order failed

        return redirect()->route('paypal.cancel');
    }

    public function cancel(Request $request)
    {

        // جلب الطلب بناءً على order_id
        $order = Order::find($request->order_id);

        if ($order) {
            // جلب جميع العناصر المرتبطة بالطلب وحذفها
            $order->orderItems()->delete();

            // حذف الطلب نفسه
            $order->delete();
        }

        return redirect()->back()
            ->with("error", "order not completed");
    }

}