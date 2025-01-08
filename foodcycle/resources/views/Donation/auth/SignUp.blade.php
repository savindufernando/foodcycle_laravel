<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Sign-Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    @include('layouts.header')
    <div class="flex items-center justify-center min-h-screen pt-6">
        <!-- Sign-Up Form Card -->
        <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-md">
            <!-- Back to Sign-In Option -->
            <div class="text-right">
            <p class="text-gray-700">
                If you have an account, 
                <a href="{{ route('donation.login') }}" class="font-medium text-green-500 hover:text-green-700">
                log in
                </a>
            </p>
            </div>
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Organization Sign-Up</h2>
            <form method="POST" action="{{ route('donation.signup') }}" enctype="multipart/form-data">
    @csrf
    
    @if($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Organization Details -->
    <h3 class="mb-4 text-xl font-bold text-gray-700">1. Organization Details</h3>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="organization_name" class="block mb-2 font-medium text-gray-700">Organization Name</label>
            <input id="organization_name" name="organization_name" type="text" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="registration_number" class="block mb-2 font-medium text-gray-700">Registration Number</label>
            <input id="registration_number" name="registration_number" type="text" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="organization_type" class="block mb-2 font-medium text-gray-700">Type of Organization</label>
            <select id="organization_type" name="organization_type" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                <option value="">Select Type</option>
                <option value="NGO">NGO</option>
                <option value="Charity">Charity</option>
                <option value="Religious">Religious</option>
                <option value="Community-based">Community-based</option>
            </select>
        </div>
        <div>
            <label for="date_of_registration" class="block mb-2 font-medium text-gray-700">Date of Registration</label>
            <input id="date_of_registration" name="date_of_registration" type="date" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="registration_authority" class="block mb-2 font-medium text-gray-700">Registration Authority</label>
            <input id="registration_authority" name="registration_authority" type="text" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
    </div>

    <!-- Contact Information -->
    <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">2. Contact Information</h3>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="contact_person_name" class="block mb-2 font-medium text-gray-700">Contact Person's Name</label>
            <input id="contact_person_name" name="contact_person_name" type="text" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="contact_person_position" class="block mb-2 font-medium text-gray-700">Contact Person's Position</label>
            <input id="contact_person_position" name="contact_person_position" type="text" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
            <input id="email" name="email" type="email" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div>
            <label for="phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
            <input id="phone" name="phone" type="tel" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
        </div>
        <div class="md:col-span-2">
            <label for="office_address" class="block mb-2 font-medium text-gray-700">Office Address</label>
            <textarea id="office_address" name="office_address" rows="3" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500"></textarea>
        </div>
    </div>
    <!-- Mission and Purpose -->
    <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">3. Mission and Purpose</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="mission" class="block mb-2 font-medium text-gray-700">Brief Description</label>
                        <textarea id="mission" name="mission" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500"></textarea>
                    </div>
                    <div>
                        <label for="beneficiaries" class="block mb-2 font-medium text-gray-700">Target Beneficiaries</label>
                        <input id="beneficiaries" name="beneficiaries" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="regions" class="block mb-2 font-medium text-gray-700">Regions of Operation</label>
                        <select id="regions" name="regions" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                            <option value="">Select Region</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Colombo">Colombo</option>
                        </select>
                    </div>
                </div>

    <!-- Website/Social Media -->
    <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">4. Website/Social Media</h3>
    <div>
        <label for="website" class="block mb-2 font-medium text-gray-700">Official Website/Social Media URL (Optional)</label>
        <input id="website" name="website" type="url"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
    </div>

    <!-- Supporting Documents -->
    <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">5. Supporting Documents</h3>
    <div>
        <label for="registration_certificate" class="block mb-2 font-medium text-gray-700">Upload Registration Certificate</label>
        <input id="registration_certificate" name="registration_certificate" type="file" accept=".pdf,.jpg,.png" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
    </div>

     <!-- Password Fields -->
     <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">6. Password Setup</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="confirm_password" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
                        <input id="confirm_password" name="confirm_password" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                </div>

    <!-- Terms and Agreements -->
    <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">7. Terms and Agreements</h3>
    <div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" name="terms" required
                class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
            <span class="ml-2 text-sm text-gray-700">
                I agree to the <a href="#" class="text-teal-600 underline">Terms and Conditions</a>, <a href="#" class="text-teal-600 underline">Privacy Policy</a>, and the <a href="#" class="text-teal-600 underline">Verification Process</a>.
            </span>
        </label>
    </div>

    <!-- Submit Button -->
    <div class="mt-8">
        <button type="submit"
            class="w-full px-4 py-2 font-medium text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50">
            Register
        </button>
    </div>
</form>

        </div>
    </div>
    <!-- Footer Section -->
    <div class="mt-10">
        @include('layouts.footer')
    </div>
</body>
</html>
