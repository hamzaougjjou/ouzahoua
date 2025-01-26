<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected $apiKey;
    protected $baseUrl = 'https://v6.exchangerate-api.com/v6';

    public function __construct()
    {
        // جلب مفتاح API من .env
        $this->apiKey = env('EXCHANGE_RATE_API_KEY');
    }

    /**
     * تحويل SAR إلى USD
     *
     * @param float $sarAmount
     * @return float
     */
    public function convertSarToUsd(float $sarAmount): float
    {
        try {
            // استدعاء API لجلب سعر التحويل
            $response = Http::get("{$this->baseUrl}/{$this->apiKey}/latest/SAR");

            if ($response->successful()) {
                $conversionRates = $response->json('conversion_rates');

                // التأكد من وجود USD في الرد
                if (isset($conversionRates['USD'])) {
                    $usdRate = $conversionRates['USD'];
                    return $sarAmount * $usdRate;
                }
            }

            // إذا فشل الطلب نرجع القيمة الافتراضية 
            return $sarAmount * 0.2667;
        } catch (\Exception $e) {
            // في حالة حدوث خطأ نرجع
            return $sarAmount * 0.2667;
        }
    }
}
