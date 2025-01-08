<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Cycle - Donation Form</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Header Section -->
    @include('layouts.header')
    
    <div class="flex items-center justify-center">
    <h1 class="text-lg font-semibold pt-8 font-sans">
        Donate to <span class="text-green-500">{{ $foodRequest->organization_name }}</span>
    </h1>
    </div>

    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6 step-container h-[700px]">
    <!-- Responsive Progress Bar -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0">
      <div class="flex items-center md:flex-1">
        <div class="w-10 h-10 flex items-center justify-center bg-green-500 text-white rounded-full step-icon">1</div>
        <p class="ml-2 text-sm font-medium text-gray-600 step-label">Details</p>
      </div>
      <div class="w-1 h-6 md:w-full md:h-1 bg-gray-300 md:mx-2 step-line"></div>
      <div class="flex items-center md:flex-1">
        <div class="w-10 h-10 flex items-center justify-center bg-gray-300 text-gray-600 rounded-full step-icon">2</div>
        <p class="ml-2 text-sm font-medium text-gray-600 step-label">Schedule</p>
      </div>
      <div class="w-1 h-6 md:w-full md:h-1 bg-gray-300 md:mx-2 step-line"></div>
      <div class="flex items-center md:flex-1">
        <div class="w-10 h-10 flex items-center justify-center bg-gray-300 text-gray-600 rounded-full step-icon">3</div>
        <p class="ml-2 text-sm font-medium text-gray-600 step-label">Confirmation</p>
      </div>
    </div>

    <!-- Form Steps -->
    <div id="step-1" class="step">
        <h2 class="text-xl font-bold mb-4">Enter Donation Details</h2>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="donorName" id="donorName" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="donorEmail" id="donorEmail" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Contact Number</label>
                <input type="tel" naem="donorContact" id="donorContact" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Donation Items</h3>
                <div id="itemList" class="border rounded h-32 overflow-y-scroll p-3 bg-gray-50">
                    <p class="text-gray-500 text-sm" id="noItemsMessage">No items added yet.</p>
                </div>
                <div class="flex space-x-2 mt-4">
                    <input type="text" id="itemName" placeholder="Item Name" class="w-2/3 border rounded px-3 py-2">
                    <input type="number" id="itemQuantity" placeholder="Quantity (Kg)" class="w-1/3 border rounded px-3 py-2">
                    <button type="button" onclick="addItem()" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <a href="{{ route('index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
                <button onclick="saveDetailsAndNext()" type="button" class="bg-green-500 text-white px-4 py-2 rounded">Next</button>
            </div>
        </form>
    </div>

    <div id="step-2" class="step hidden">
    <h2 class="text-xl font-bold mb-4">Choose Delivery Option</h2>
    <p class="text-gray-600 mb-4">Please choose your preferred delivery method. A delivery fee is included.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
        <button onclick="selectDeliveryOption('pickup')" class="bg-green-500 text-white px-4 py-2 rounded">Request a Pickup</button>
        <button onclick="selectDeliveryOption('dropoff')" class="bg-green-500 text-white px-4 py-2 rounded">Self Drop-off</button>
    </div>

    <!-- Pickup Option -->
    <div id="pickupDetails" class="hidden">
        <label class="block text-gray-700 mb-2">Pickup Address</label>
        <textarea id="pickupAddress" name="pickupAddress" rows="3" class="w-full border rounded px-3 py-2" placeholder="Enter your pickup address"></textarea>
    </div>

    <!-- Drop-off Option -->
    <div id="dropoffDetails" class="hidden">
        <label class="block text-gray-700 mb-2">Drop-off Date</label>
        <input type="date" name="dropoffDate" id="dropoffDate" class="w-full border rounded px-3 py-2 mb-4">
        <label class="block text-gray-700 mb-2">Drop-off Time</label>
        <input type="time" name="dropoffTime" id="dropoffTime" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mt-6 flex justify-between">
        <button onclick="prevStep(2)" class="bg-gray-500 text-white px-4 py-2 rounded">Back</button>
        <button onclick="saveDeliveryAndNext()" class="bg-green-500 text-white px-4 py-2 rounded">Next</button>
    </div>
</div>

    <div id="step-3" class="step hidden">
        <h2 class="text-xl font-bold mb-4">Confirmation</h2>
        <p class="mb-6">You are donating to {{ $foodRequest->organization_name }}'s {{ $foodRequest->title }} campaign</p>
        <p class="mb-6">Here is a summary of your details:</p>
        <ul class="list-disc list-inside">
            <li id="summaryName"></li>
            <li id="summaryEmail"></li>
            <li id="summaryContact"></li>
            <li id="summaryPickup"></li>
            <li>
                <h3 class="font-semibold">Donation Items:</h3>
                <ul id="summaryItems" class="list-decimal list-inside"></ul>
            </li>
        </ul>
        <div class="mt-6 flex justify-between">
            <button onclick="prevStep(3)" class="bg-gray-500 text-white px-4 py-2 rounded">Back</button>
            <form action="{{ route('donation.donor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="requestID" value="{{ $foodRequest->id }}">
                <input type="hidden" name="orgLocation" value="{{ $foodRequest->Org_location }}">
                <input type="hidden" name="summaryName" id="summaryNameField">
                <input type="hidden" name="summaryEmail" id="summaryEmailField">
                <input type="hidden" name="summaryContact" id="summaryContactField">
                <input type="hidden" name="summaryPickup" id="summaryPickupField">
                <input type="hidden" name="donationItems" id="donationItemsField"> 
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    let currentStep = 1;
const userSelections = {};
let donationItems = []; // Array to store donation items

function nextStep(step) {
    document.getElementById(`step-${step}`).classList.add('hidden');
    document.getElementById(`step-${step + 1}`).classList.remove('hidden');
    currentStep = step + 1;
    updateProgressBar();
}

function prevStep(step) {
    document.getElementById(`step-${step}`).classList.add('hidden');
    document.getElementById(`step-${step - 1}`).classList.remove('hidden');
    currentStep = step - 1;
    updateProgressBar();
}

function addItem() {
    const itemName = document.getElementById('itemName').value.trim();
    const itemQuantity = document.getElementById('itemQuantity').value.trim();

    if (itemName && itemQuantity) {
        // Add the item to the donation items array
        donationItems.push({ name: itemName, quantity: `${itemQuantity} Kg` });

        // Update the item list
        const itemList = document.getElementById('itemList');
        const noItemsMessage = document.getElementById('noItemsMessage');
        if (noItemsMessage) {
            noItemsMessage.remove(); // Remove the "No items added yet" message
        }

        const newItem = document.createElement('div');
        newItem.className = 'flex justify-between items-center mt-2 border-b pb-2';
        newItem.innerHTML = `
            <span>${itemName} (${itemQuantity} Kg)</span>
            <button type="button" class="text-red-500" onclick="removeItem('${itemName}')">
                Remove
            </button>
        `;
        itemList.appendChild(newItem);

        // Clear input fields
        document.getElementById('itemName').value = '';
        document.getElementById('itemQuantity').value = '';
    } else {
        alert('Please enter both item name and quantity.');
    }
}

function removeItem(itemName) {
    // Remove the item from the array
    donationItems = donationItems.filter(item => item.name !== itemName);

    // Update the displayed list
    const itemList = document.getElementById('itemList');
    const items = Array.from(itemList.children);
    items.forEach(child => {
        if (child.innerText.includes(itemName)) {
            itemList.removeChild(child);
        }
    });

    // Show "No items added yet" if the list is empty
    if (donationItems.length === 0) {
        const noItemsMessage = document.createElement('p');
        noItemsMessage.className = 'text-gray-500 text-sm';
        noItemsMessage.id = 'noItemsMessage';
        noItemsMessage.textContent = 'No items added yet.';
        itemList.appendChild(noItemsMessage);
    }
}

function saveDetailsAndNext() {
    const name = document.getElementById('donorName').value;
    const email = document.getElementById('donorEmail').value;
    const contact = document.getElementById('donorContact').value;

    if (!name || !contact || !email) {
        alert('Please fill in your name, email and contact information.');
        return;
    }

    userSelections.name = name;
    userSelections.email = email;
    userSelections.contact = contact;
    userSelections.items = donationItems;

    nextStep(currentStep);
}

function selectDeliveryOption(option) {
    const pickupDetails = document.getElementById('pickupDetails');
    const dropoffDetails = document.getElementById('dropoffDetails');

    if (option === 'pickup') {
        pickupDetails.classList.remove('hidden');
        dropoffDetails.classList.add('hidden');
        userSelections.deliveryMethod = 'pickup';
    } else if (option === 'dropoff') {
        dropoffDetails.classList.remove('hidden');
        pickupDetails.classList.add('hidden');
        userSelections.deliveryMethod = 'dropoff';
    }
}

function saveDeliveryAndNext() {
    if (userSelections.deliveryMethod === 'pickup') {
        const pickupAddress = document.getElementById('pickupAddress').value.trim();
        if (!pickupAddress) {
            alert('Please provide a pickup address.');
            return;
        }
        userSelections.pickupAddress = pickupAddress;
    } else if (userSelections.deliveryMethod === 'dropoff') {
        const dropoffDate = document.getElementById('dropoffDate').value;
        const dropoffTime = document.getElementById('dropoffTime').value;

        if (!dropoffDate || !dropoffTime) {
            alert('Please provide both drop-off date and time.');
            return;
        }

        const selectedDate = new Date(dropoffDate);
        const currentDate = new Date();

        // Ensure the date is not in the past
        if (selectedDate < currentDate.setHours(0, 0, 0, 0)) {
            alert('Please select a valid date. Past dates are not allowed.');
            return;
        }

        // Ensure time is within the allowed range
        const [hours, minutes] = dropoffTime.split(':').map(Number);
        if (hours < 8 || (hours === 8 && minutes < 30) || hours > 17 || (hours === 17 && minutes > 30)) {
            alert('Please select a time between 8:30 AM and 5:30 PM.');
            return;
        }

        userSelections.dropoffDate = dropoffDate;
        userSelections.dropoffTime = dropoffTime;
    }

    // Fill the hidden form fields
    document.getElementById('summaryNameField').value = userSelections.name || '';
    document.getElementById('summaryEmailField').value = userSelections.email || '';
    document.getElementById('summaryContactField').value = userSelections.contact || '';
    if (userSelections.deliveryMethod === 'pickup') {
        document.getElementById('summaryPickupField').value = userSelections.pickupAddress || '';
    } else if (userSelections.deliveryMethod === 'dropoff') {
        document.getElementById('summaryPickupField').value = `Drop-off Scheduled: ${userSelections.dropoffDate} at ${userSelections.dropoffTime}`;
    }

    // Serialize donationItems array into JSON
    document.getElementById('donationItemsField').value = JSON.stringify(donationItems);

    // Proceed to the next step
    nextStep(currentStep);
}


function updateProgressBar() {
    const progressSteps = document.querySelectorAll('.step-icon');
    const progressLabels = document.querySelectorAll('.step-label');
    const progressLines = document.querySelectorAll('.step-line');

    progressSteps.forEach((step, index) => {
        if (index + 1 <= currentStep) {
            step.classList.add('bg-green-500', 'text-white');
            step.classList.remove('bg-gray-300', 'text-gray-600');
        } else {
            step.classList.add('bg-gray-300', 'text-gray-600');
            step.classList.remove('bg-green-500', 'text-white');
        }
    });

    progressLabels.forEach((label, index) => {
        label.classList.toggle('text-green-500', index + 1 === currentStep);
        label.classList.toggle('text-gray-600', index + 1 !== currentStep);
    });

    progressLines.forEach((line, index) => {
        if (index < currentStep - 1) {
            line.classList.add('bg-green-500');
            line.classList.remove('bg-gray-300');
        } else {
            line.classList.add('bg-gray-300');
            line.classList.remove('bg-green-500');
        }
    });

    // Update Confirmation Step
    if (currentStep === 3) {
        document.getElementById('summaryName').textContent = `Name: ${userSelections.name || ''}`;
        document.getElementById('summaryEmail').textContent = `Email: ${userSelections.email || ''}`;
        document.getElementById('summaryContact').textContent = `Contact: ${userSelections.contact || ''}`;

        if (userSelections.deliveryMethod === 'pickup') {
            document.getElementById('summaryPickup').textContent = `Pickup Address: ${userSelections.pickupAddress}`;
        } else if (userSelections.deliveryMethod === 'dropoff') {
            document.getElementById('summaryPickup').textContent = `Drop-off Scheduled: ${userSelections.dropoffDate} at ${userSelections.dropoffTime}`;
        }

        // Display items
        const summaryItems = document.getElementById('summaryItems');
        summaryItems.innerHTML = '';
        donationItems.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.name} (${item.quantity})`;
            summaryItems.appendChild(li);
        });
    }
}

</script>

    <!-- Footer Section -->
    <div class="mt-10">
        @include('layouts.footer')
    </div>
    <!-- Custom JavaScript -->
    <script src="{{ asset('panel/js/script.js') }}"></script>
</body>
</html>
