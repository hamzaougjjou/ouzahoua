<?php
namespace App\Services;

use App\Models\Product;

class CartService
{
    /**
     * جلب المنتجات من قاعدة البيانات بناءً على الكارت الممرر
     *
     * @param array $cart
     * @return array
     */
    public function cartFromDb($cart)
    {
        $newCart = [];

        // المرور عبر الكارت الممرر
        foreach ($cart as $cartItem) {
            // جلب المنتج من قاعدة البيانات بناءً على product_id
            $product = Product::find($cartItem->id);

            // إذا تم العثور على المنتج
            if ($product) {
                // تحويل المنتج إلى مصفوفة ثم دمج الكمية
                $newCart[] = array_merge(
                    $product->toArray(), // تحويل المنتج إلى مصفوفة
                    ['quantity' => $cartItem->quantity ? $cartItem->quantity : 1] // إضافة الكمية من الكارت أو القيمة الافتراضية 1
                );
            }
        }

        return $newCart;
    }

}