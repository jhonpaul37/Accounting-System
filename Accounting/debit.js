const quantityInput = document.getElementById('debit1');
// Function to calculate amount
function calculateAmount() {   
    // Get the values from the input fields and convert them to numbers
     // Set to fixed decimal places (e.g., 2 decimal places)
}

// Event listeners to trigger calculation on input change
quantityInput.addEventListener('input', function(event){
    
    const amounts = parseFloat(quantityInput.value) || 0;
    
    // Calculate total amount
    const amount = amounts;
    
    // Display the calculated amount in the totalAmount span
    result1.textContent = amount.toFixed(2);
    
});