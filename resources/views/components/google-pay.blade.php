<!-- يمكنك إضافة CSS لتغيير نمط الـ div الذي يحتوي على الزر -->
<style>
    /* تغيير حجم container */
    #customGooglePayButton {
        background-color: #2563EB;
        font-weight: bold;
        width: 100%;
        max-width: 500px;
        margin: 50px auto;
        text-align: center;
        padding: 10px;
        display: block;
    }
</style>

<div>
    <!-- زر مخصص -->
    <button id="customGooglePayButton"
        style="background-color: #4285f4; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        ادفع باستخدام Google Pay
    </button>

    <!-- زر Google Pay (مخفي) -->
    <div id="googlePayButton" style="display: none;"></div>
</div>

<!-- مكتبة Google Pay JavaScript API -->
<script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>


<script>
    
    function onGooglePayLoaded() {
        const paymentsClient = new google.payments.api.PaymentsClient({
            environment: 'TEST'
        });

        const button = paymentsClient.createButton({
            onClick: onGooglePayButtonClicked
        });

        // إخفاء زر Google Pay الأصلي
        document.getElementById('googlePayButton').appendChild(button);
    }

    // عند الضغط على زر "ادفع باستخدام Google Pay"
    document.getElementById('customGooglePayButton').addEventListener('click', function() {
        onGooglePayButtonClicked(); // استدعاء نفس دالة الدفع
    });


    // معالجة الدفع عند الضغط على الزر
    function onGooglePayButtonClicked() {
        const paymentDataRequest = getGooglePaymentDataRequest();
        const paymentsClient = new google.payments.api.PaymentsClient({
            environment: 'TEST'
        });

        paymentsClient.loadPaymentData(paymentDataRequest)
            .then(function(paymentData) {
                processPayment(paymentData);
            })
            .catch(function(err) {
                console.error(err);
            });
    }

    // نفس دوال طلب الدفع ومعالجة البيانات كما تم تعريفها سابقاً
    function getGooglePaymentDataRequest() {
        // بيانات الدفع...
        return {
            apiVersion: 2,
            apiVersionMinor: 0,
            allowedPaymentMethods: [{
                type: 'CARD',
                parameters: {
                    allowedAuthMethods: ['PAN_ONLY', 'CRYPTOGRAM_3DS'],
                    allowedCardNetworks: ['MASTERCARD', 'VISA']
                },
                tokenizationSpecification: {
                    type: 'PAYMENT_GATEWAY',
                    parameters: {
                        gateway: 'example',
                        gatewayMerchantId: 'exampleMerchantId'
                    }
                }
            }],
            merchantInfo: {
                merchantId: "01234567890123456789",
                merchantName: 'Example Merchant'
            },
            transactionInfo: {
                totalPriceStatus: 'FINAL',
                totalPrice: '178.00',
                currencyCode: 'USD',
                countryCode: 'US'
            }
        };
    }

    function processPayment(paymentData) {
        fetch('/google-pay', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    paymentData: paymentData
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Payment successful', data);
            })
            .catch(error => {
                console.error('Payment failed', error);
            });
    }


</script>
