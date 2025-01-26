<?php


namespace App\Services;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * حفظ الطلب.
     *
     * @param array $data
     * @return Order
     */
    public function createOrder(
        $request,
        $order_status = null
    ) {

        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'user_id' => Auth()->id() ?? null,
            'order_status' => $order_status ?? 'pending',
        ]);

        if ($request->product) {
            $product = Product::where("slug", $request->product)->first();
            if ($product) {
                $amount = $product->discount_price ?? $product->price;
                $order_item = OrderItem::create([
                    "quantity" => 1,
                    "price" => $amount,
                    "product_id" => $product->id,
                    "order_id" => $order->id
                ]);
                $order->amount = $amount;
                $order->save();
                return $order;
            }
        }

        try {
            // Parse the cart JSON
            $cart = json_decode($request->cart, true);
        } catch (\Exception $e) {
            return null;
        }

        try {
            $amount = 0;
            foreach ($cart as $item) {
                $product_total = ($item["discount_price"] ? $item["discount_price"] : $item["price"]) * $item["quantity"] ?? 1;
                $order_item = OrderItem::create([
                    "quantity" => $item["quantity"] ?? 1,
                    "price" => $product_total,
                    "product_id" => $item["id"],
                    "order_id" => $order->id
                ]);
                $amount += $product_total;
                // if item failed to create reurn false
                if (!$order_item) {
                    return null;
                }
            }

            $order->amount = $amount;
            $order->save();
            return $order;
        } catch (\Exception $e) {
            // إذا حدث أي خطأ، يتم استرجاع المعاملة بالكامل
            // DB::rollBack();

            // حذف الطلب إذا فشل أحد عناصر الطلب
            Order::find($order->id)->delete();
            return null;
        }
    }
}
