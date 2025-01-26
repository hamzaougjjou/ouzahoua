<div class="mx-auto p-8 rtl">


    <h2 class="text-2xl font-bold mb-6 text-gray-800 rtl">
        الأسئلة الشائعة
    </h2>




    <div class="px-4">
        @foreach ($faqs as $faq)
            <div>
                <!-- Accordion Item -->
                <div class="accordion-item border-b">
                    <button id="accordion-button-1"
                        class="flex justify-between items-center w-full py-4 text-left text-gray-600 focus:outline-none hover:text-blue-600 transition-colors"
                        aria-expanded="false">
                        <span class="accordion-title p-4 text-lg leading-5">
                            {!! $faq->question !!}
                        </span>
                        <span class="icon transform transition-transform duration-200" aria-hidden="true">+</span>
                    </button>
                    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-100 ease-linear">
                        <p class="text-gray-500 leading-10">
                            {!! $faq->answer !!}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> 






<script>
    // Accordion Toggle Functionality
    const accordionButtons = document.querySelectorAll("button[aria-expanded]");

    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const expanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !expanded);

            // Toggle accordion content
            const content = button.nextElementSibling;
            if (!expanded) {
                content.style.maxHeight = content.scrollHeight + 'px';
                button.querySelector('.icon').textContent = '−';
            } else {
                content.style.maxHeight = null;
                button.querySelector('.icon').textContent = '+';
            }
        });
    });
</script>
