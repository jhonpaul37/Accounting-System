const quantityInput = document.getElementById('credit2');
// Function to calculate amount
function calculateAmount() {   
    // Get the values from the input fields and convert them to numbers
     // Set to fixed decimal places (e.g., 2 decimal places)
}

// Event listeners to trigger calculation on input change
quantityInput.addEventListener('input', function(event){
    
    const credits2 = parseFloat(quantityInput.value) || 0;
    
    // Calculate total amount
    const credit2 = credits2;
    
    // Display the calculated amount in the totalAmount span
    result2.textContent = credits2.toFixed(2);
    
});