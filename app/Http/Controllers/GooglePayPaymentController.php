<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GooglePayPaymentController extends Controller
{
    //
    public function googlePay(Request $request)
    {
        $paymentData = $request->input('paymentData');

        // معالجة الدفع هنا
        // إرسال الطلب إلى Google Pay API إذا كان ضروريًا
        return $paymentData;
    }

}
