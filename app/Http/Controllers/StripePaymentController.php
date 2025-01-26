<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe(Request $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // يجب التأكد من أن paymentMethod موجودة
        $paymentMethodId = $request->paymentMethod;

        try {
            // إنشاء عميل جديد
            $customer = \Stripe\Customer::create([
                'payment_method' => $paymentMethodId,
                'email' => 'customer@example.com',
            ]);

            // إنشاء PaymentIntent مع تضمين معرّف العميل
            $intent = \Stripe\PaymentIntent::create([
                'amount' => 10000, // المبلغ المطلوب (مثلاً 100 دولار)
                'currency' => 'sar',
                'payment_method' => $paymentMethodId, // طريقة الدفع المقدمة
                'customer' => $customer, // معرّف العميل المرتبط بطريقة الدفع
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('stripe.success'), // تحديد رابط العودة (اختياري)
            ]);

            return back()->with('success', 'تم الدفع بنجاح!');

        } catch (\Stripe\Exception\ApiErrorException $e) {
            // عرض رسالة خطأ عند فشل الدفع
            dd($e->getMessage());
            return back()->with(['error' => $e->getMessage()]);
        }
    }





    public function success(Request $request)
    {


        return redirect()->route("payment")
            ->with("success", "order has been completed")
            ->with("order_completed", "order has been completed");
    }


}
