const calcTotal = (shipping = 0) => {
    let cart_field = document.getElementById("cart_field");
    let payment_total = document.getElementById("payment_total");

    function getCart2() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalPrice = cart.reduce((sum, item) => sum + (item.discount_price ? item.discount_price : item.price) * item.quantity, 0);
        payment_total.innerText = totalPrice + shipping;
        return cart;
    }
    cart_field.setAttribute('value', JSON.stringify(getCart2()));
}
