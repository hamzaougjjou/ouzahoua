
async function verifyEmail(email, verificationCode, btn_origin_text) {
    try {
        // Prepare the data to be sent
        const data = {
            email: email,
            verification_code: verificationCode
        };

        // Send the POST request to the API
        const response = await fetch('/api/verify-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });

        // Parse the JSON response
        const result = await response.json();

        // Handle success or error responses
        if (response.ok) {
            // Success response (status code 200)
            alert(result.message); // Display success message
        } else {
            // Error response (status code 4xx or 5xx)
            alert(result.message); // Display error message
        }

        document.getElementById('email_validation_pop_up').style.display='none'
    } catch (error) {
        // Handle any network or unexpected errors
        console.error('An error occurred:', error);
        alert('An unexpected error occurred. Please try again.');
    }
    finally {
        reg_btn_virify_email.innerHTML = btn_origin_text;
    }
}
