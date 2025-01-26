let timeOut; // Declare the timeout variable globally
let header_cart_total = document.getElementById("header-cart-total");
let header_cart_count = document.getElementById("header-cart-count");


getCart();

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-cart').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let product = this.dataset.product;

            addToCart(JSON.parse(product));
            console.log('====================================');
            console.log(JSON.parse(product));
            console.log('====================================');

        });
    });
});

function ho_truncate_text(text, maxLength) {
    // Check if the text length exceeds the maximum length
    if (text.length > maxLength) {
        // Truncate the text and add "..." at the end
        return text.substring(0, maxLength - 3) + "...";
    }
    // If the text is within the limit, return it as-is
    return text;
}


// Add product to cart
function addToCart(product) {

    let cart = getCart();

    // Check if product is already in the cart
    const existingProductIndex = cart.findIndex(item => item.id === product.id);

    if (existingProductIndex > -1) {
        // cart[existingProductIndex].quantity++;
        showAddedMessage("المنتج موجود مسبقا في السلة", "#D72638");
    } else {
        cart.push({ ...product, quantity: 1 });
        showAddedMessage("تمت إضافة المنتج بنجاح", "#52FFB8");
    }
    saveCart(cart);
    // 
}

// Retrieve cart from localStorage
function getCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalPrice = cart.reduce((sum, item) => sum + (item.discount_price ? item.discount_price : item.price) * item.quantity, 0);
    header_cart_count.innerText = cart.length > 10 ? cart.length : "0" + cart.length;
    header_cart_total.innerText = totalPrice;
    return cart;
}

// Save cart to localStorage
function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
    getCart();
    // renderCart();
}

// Render the cart items
var renderCart = (shipping_price) => {
    let cart_container = document.getElementById("cart-container");
    let cart_total = document.getElementById("cart-total");
    let cart_sub_total = document.getElementById("cart-sub-total");

    let template = ``;
    const cart = getCart();

    if (cart.length === 0) {
        template = `   <h2 class="text-center text-red-200 py-16 text-3xl font-semibold">
        لم يتم العثورعلى اي منتجات
    </h2>`;
    }


    cart.forEach(product => {
        template += `
    <tr class="border-b">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <span 
                                            title="${product.name}"
                                            class="font-semibold ml-4">
                                                     ${ho_truncate_text(product.name, 15)}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <img class="bg-gray-200 h-12 w-12 rounded-md" src="${product.thumbnail}" alt="${product.name}" />
                                    </td>
                                    <td class="py-4">199.90 د.م.</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                            <span class="text-gray-700 mx-2">1</span>
                                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 12H4" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                    ${product.discount_price ? product.discount_price : product.price}
                                    د.م.
                                    
                                    </td>
                                    <td class="py-4">
                                        <button
                                            class="flex items-center p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors 
                                        duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                                            onclick="removeFromCart(${product.id})" aria-label="Delete item">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
       
    
        `;
    });

    cart_container.innerHTML = template;
    const totalPrice = cart.reduce((sum, item) => sum + (item.discount_price ? item.discount_price : item.price) * item.quantity, 0);
    cart_sub_total.innerText = totalPrice;
    cart_total.innerText = shipping_price + totalPrice;
}

// Update the quantity of items in the cart
function updateQuantity(productId, change = 1) {
    let cart = getCart();
    const productIndex = cart.findIndex(item => item.id === productId);

    console.log('====================================');
    console.log(cart);
    console.log('====================================');
    if (productIndex > -1) {
        // cart[productIndex].quantity += change;

        // If quantity becomes 0 or more, change the item
        if (cart[productIndex].quantity > 1) {
            cart[productIndex].quantity += change;
            saveCart(cart);
            renderCart();
        }

    }
}

// Remove an item from the cart
function removeFromCart(productId) {
    let cart = getCart();
    console.log('====================================');
    console.log(productId, cart);
    console.log('====================================');
    const newCart = cart.filter(item => item.id !== productId);
    saveCart(newCart);
    renderCart();
}


function showAddedMessage(message, color) {

    document.getElementById("cart-pop-up").innerHTML = '';

    document.getElementById("cart-pop-up").innerHTML += `
        <div style ="
    display: block;
    position: fixed;
    z-index: 98999989;
    bottom: 16px;
    left: 16px;
    align-items: bottom;
    border-radius: 8px;
    padding: 4px 8px;
    text-align: left;
    overflow: hidden;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease-in-out;
    min-width: 150px;
    width: fit-content;
    background-color: ${color};
    ">
        <div div style = "display: flex; direction: rtl;gap:6px;" >
            <div style="
                display: flex; 
                align-items: center; 
                justify-content: center; 
                flex-shrink: 0; 
                margin-right: auto; 
                border-radius: 50%; 
                background-color: #D1FAE5; 
                height: 40px; 
                width: 40px; 
                margin-top: 5px;
            ">
                <svg style="height: 40px; width: 40px; color: #059669;" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div style="padding-left: 16px; margin-top: 12px; text-align: start;">
                <h3 style="font-size: 1.125rem; line-height: 1rem; font-weight: 500; color: #1F2937;">
                    ${message}
                </h3>
            </div>
        </div >
    </div >
    `;

    // Clear the previous timeout (if any) before setting a new one
    if (timeOut) {
        clearTimeout(timeOut);
    }

    // Set a new timeout to clear the message after 5 seconds
    timeOut = setTimeout(() => {
        document.getElementById("cart-pop-up").innerHTML = '';
    }, 5000);

}

// Function to save the cart
function saveCartInDb(cartData) {

    // Prepare the request data
    const requestData = {
        cart: cartData,    // The cart data (items) to be saved
        cart_id: localStorage.getItem("cart_id"),   // The authenticated user's ID (null if not authenticated)
        is_auth: isAuthenticated, // Set to true if the user is authenticated, false otherwise
    };

    // Send a POST request to save the cart in the database
    fetch('/api/carts', {
        method: 'POST', // POST method to create a new cart
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${localStorage.getItem('auth_token')} ` // Include the auth token in the request header
        },
        body: JSON.stringify(requestData) // Convert the request data to JSON
    })
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            if (data.id) {
                console.log('Cart saved successfully!', data);
                alert('Cart saved successfully!');
            } else {
                console.error('Error saving cart:', data.message);
                alert('Failed to save cart.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving the cart.');
        });
}


