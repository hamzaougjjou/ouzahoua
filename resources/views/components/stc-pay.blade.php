<head>
    <!-- Other Tags -->
    <title>Moyasar payment form</title>
    <meta charset="UTF-8" />
  
    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css" />
  
    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  
    <!-- Download CSS and JS files in case you want to test it locally, but use CDN in production -->
  </head>
  
  <body>
    <!--
    This example requires some changes to your config:
    
    ```
    // tailwind.config.js
    module.exports = {
      // ...
      plugins: [
        // ...
        require('@tailwindcss/forms'),
      ],
    }
    ```
  -->
  
    <section style="display: flex; height: 100%; width: 100%; justify-content: center; justofy-items: center;">
      <div class="mysr-form" style="width: 360px; margin: 40px 0 0 0"></div>
    </section>
  
    <script>
      Moyasar.init({
        element: '.mysr-form',
        // Amount in the smallest currency unit.
        // For example:
        // 10 SAR = 10 * 100 Halalas
        // 10 KWD = 10 * 1000 Fils
        // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
        amount: 1600,
        currency: 'SAR',
        description: 'Coffee Order #1',
        publishable_api_key: 'pk_test_Ftqg19y9DJCzZaVtoXi7dFT5jXPx4jcgqmWTKZtd',
        callback_url: 'https://moyasar.com/thanks',
        methods: ['stcpay'],
        fixed_width: false, // optional, only for demo purposes
        on_initiating: function () {
              return new Promise(function (_, reject) {
                  setTimeout(function () {
                      reject('This is just a sample form, it won\'t work ;)');
                  }, 2000);
              });
          }
          
      })
    </script>