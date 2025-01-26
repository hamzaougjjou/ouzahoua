<script src="https://js.stripe.com/v3/"></script>



<div class="flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg 
    mb-4 mt-1
    max-w-md w-full">
        <h2 class="text-2xl font-bold text-center mb-6">الدفع بواسطة البطاقة البنكية</h2>


        <!-- نموذج الدفع -->
        <form id="payment-form" action="{{ route('stripe') }}" method="POST">
            @csrf
            <div>
                <label for="card-holder-name" class="block text-sm font-medium text-gray-700">اسم حامل البطاقة</label>
                <input id="card-holder-name" type="text"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="أدخل اسمك">
            </div>

            <div id="card-element" class="mt-4">
                <!-- سيتم إضافة حقول Stripe هنا -->
            </div>

            <div id="card-errors" role="alert" class="text-red-500 mt-2"></div>

            <button id="card-button" type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300 mt-6">
                ادفع الآن
            </button>
        </form>
    </div>
</div>

<script>

        // إعداد Stripe
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();

    // تخصيص نمط عناصر Stripe
    const style = {
        base: {
            color: '#32325d',
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4',
            },
            // إضافة الحدود والخصائص
            border: '1px solid #e2e8f0',
            padding: '10px',
            backgroundColor: '#ffffff',
            borderRadius: '0.375rem',
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a',
        },
    };

    // إنشاء عنصر البطاقة
    const cardElement = elements.create('card', { style: style });

    // تركيب عنصر البطاقة في المكان المناسب
    cardElement.mount('#card-element');

    // التحقق من الأخطاء في الوقت الفعلي
    cardElement.on('change', function(event) {
        const displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });


    // Handle form submission
    const form = document.getElementById('payment-form');
    const cardHolderName = document.getElementById('card-holder-name');
    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const {
            paymentMethod,
            error
        } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: {
                    name: cardHolderName.value
                }
            }
        );

        if (error) {
            // Display error message in the card-errors div
            const displayError = document.getElementById('card-errors');
            displayError.textContent = error.message;
        } else {
            // Append the paymentMethod.id to the form and submit it
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    });
</script>
