// Populate via_cities dropdown
const viaCityDropdown = document.getElementById('viaCity');
// Function to update the form based on the selected city
function updateForm() {
    const selectedCity = viaCityDropdown.value;
    const registrationNumberDropdown = document.getElementById('registrationNumber');
    const seatContainer = document.getElementById('seatContainer');
    const registrationNumberInput = document.getElementById('registrationNumberInput');

    // Clear previous options
    registrationNumberDropdown.innerHTML = '';
    registrationNumberInput.value = '';

    // Fetch registration numbers based on the selected via_city using AJAX
    fetch(`get_registration_numbers.php?city=${selectedCity}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(regNumber => {
                const option = document.createElement('option');
                option.value = regNumber;
                option.text = regNumber;
                registrationNumberDropdown.add(option);
            });

            // Autofill registration number in the input field
            registrationNumberInput.value = data[0]; // Default to the first registration number
        })
        .catch(error => console.error('Error fetching registration numbers:', error));

    // Update the seat container based on the selected registration number
    seatContainer.innerHTML = '';
    for (let i = 1; i <= maxCapacity; i++) {
        const seat = document.createElement('div');
        seat.className = 'seat';
        seat.innerText = i;
        seatContainer.appendChild(seat);
    }
}

// Function to handle seat selection
function selectSeat(event) {
    if (event.target.className === 'seat') {
        const selectedSeat = event.target.innerText;
        // Logic to handle seat selection, e.g., highlight the selected seat
    }
}

// Function to validate the cost
function validateCost() {
    const costInput = document.getElementById('cost');
    // Logic to validate the cost, e.g., compare it with the database
}
