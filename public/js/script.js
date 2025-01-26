window.onload = ()=>{



// Function to handle image error and replace it with a placeholder
document.querySelectorAll('.placeholder-img').forEach(img => {
    img.onerror = function () {
        this.onerror = null; // Prevent infinite loop in case placeholder image is also missing
        this.src = '/assets/images/placeholder_img.png'; // Path to your placeholder image
    }
});


// tracking visitors


const visited_url = window.location.pathname;  // Get only the path part of the URL


const response = fetch(`${window.location.origin}/api/tracking`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'  // Specify that you're sending JSON data
    },
    body: JSON.stringify({ "visited_url" : visited_url })  // Convert the data to JSON
})
    .then(response => response.json())
    .catch(err => {
        console.log(err);
    });


} //window.onload