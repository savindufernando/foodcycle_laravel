<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Provider Signup</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="text-gray-800 bg-gray-50">
    <!-- Header -->
    <header class="fixed top-0 z-50 w-full text-white bg-black shadow-md">
        <div class="flex items-center justify-between max-w-6xl px-6 py-4 mx-auto">
            <div class="text-lg font-bold">Delivery Provider</div>
            <nav class="hidden space-x-6 md:flex">
                <a href="{{ route('service.delivery') }}" class="hover:underline">Delivery</a>
                <a href="{{ route('service.storage') }}" class="hover:underline">Storage</a>
                <a href="/" class="hover:underline">Home</a>
            </nav>
            <button id="menu-button" class="block md:hidden focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="hidden text-white bg-black md:hidden">
            <a href="{{ route('service.delivery') }}" class="block px-4 py-2 hover:bg-black">Delivery</a>
            <a href="{{ route('service.storage') }}" class="block px-4 py-2 hover:bg-black">Storage</a>
            <a href="/" class="block px-4 py-2 hover:bg-black">Home</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="pt-20 pb-10">
        <div class="max-w-4xl px-6 mx-auto">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6 md:p-10">
                    <h2 class="mb-6 text-2xl font-bold text-center text-gray-600">Delivery Provider Signup</h2>
                    <form action="{{ route('delivery.signup') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <!-- Personal Details -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-500">Personal Details</legend>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="fullName" class="block text-sm font-medium">Full Name</label>
                                    <input type="text" id="fullName" name="full_name" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="gender" class="block text-sm font-medium">Gender</label>
                                    <select id="gender" name="gender" class="w-full px-3 py-2 border rounded-md" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="contactNumber" class="block text-sm font-medium">Contact Number</label>
                                    <input type="text" id="contactNumber" name="contact_number" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="profilePhoto" class="block text-sm font-medium">Profile Photo</label>
                                    <input type="file" id="profilePhoto" name="profile_photo" class="w-full px-3 py-2 border rounded-md" accept="image/*">
                                </div>

                                <div >
                                  <label for="location" class="block text-sm font-medium">Location</label>
                                  <select class="w-full px-3 py-2 border rounded-md" id="location" name="location" required>
                                      <option value="">Select Location</option>
                                      <option value="Colombo">Colombo</option>
                                      <option value="Kandy">Kandy</option>
                                  </select>
                              </div>
                            </div>
                        </fieldset>

                        <!-- Vehicle Details -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-500">Vehicle Details</legend>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="vehicleType" class="block text-sm font-medium">Vehicle Type</label>
                                    <input type="text" id="vehicleType" name="vehicle_type" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="vehicleModel" class="block text-sm font-medium">Vehicle Model</label>
                                    <input type="text" id="vehicleModel" name="vehicle_model" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="vehicleRegNumber" class="block text-sm font-medium">Vehicle Registration Number</label>
                                    <input type="text" id="vehicleRegNumber" name="vehicle_reg_number" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="vehicleColor" class="block text-sm font-medium">Vehicle Color</label>
                                    <input type="text" id="vehicleColor" name="vehicle_color" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="vehiclePhoto" class="block text-sm font-medium">Vehicle Photo</label>
                                    <input type="file" id="vehiclePhoto" name="vehicle_photo" class="w-full px-3 py-2 border rounded-md" accept="image/*">
                                </div>
                            </div>
                        </fieldset>

                        <!-- Bank Details -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-500">Bank Details</legend>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                              
                              <div class="mb-3">
                                  <label for="bankAccountName" class="block text-sm font-medium">Bank Account Name</label>
                                  <input type="text" class="w-full px-3 py-2 border rounded-md" id="bankAccountName" name="bank_account_name" required>
                              </div>

                              <div class="mb-3">
                                  <label for="bankAccountNumber" class="block text-sm font-medium">Bank Account Number</label>
                                  <input type="text" class="w-full px-3 py-2 border rounded-md" id="bankAccountNumber" name="bank_account_number" required>
                              </div>

                              <div class="mb-3">
                                  <label for="bankName" class="block text-sm font-medium">Bank Name</label>
                                  <input type="text" class="w-full px-3 py-2 border rounded-md" id="bankName" name="bank_name" required>
                              </div>

                              <div class="mb-3">
                                  <label for="branchName" class="block text-sm font-medium">Branch Name</label>
                                  <input type="text" class="w-full px-3 py-2 border rounded-md" id="branchName" name="branch_name" required>
                              </div>
                        </fieldset>

                        <!-- Identification -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-500">Identification</legend>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">  
                            
                            <div >
                                <label for="idNumber" class="block text-sm font-medium">ID Number</label>
                                <input type="text" class="w-full px-3 py-2 border rounded-md" id="idNumber" name="id_number" required>
                            </div>

                            <div >
                                <label for="licenseNumber" class="block text-sm font-medium">License Number</label>
                                <input type="text" class="w-full px-3 py-2 border rounded-md" id="licenseNumber" name="license_number" required>
                            </div>

                            <div >
                                <label for="licenseExpiry" class="block text-sm font-medium">License Expiry Date</label>
                                <input type="date" class="w-full px-3 py-2 border rounded-md" id="licenseExpiry" name="license_expiry" required>
                            </div>

                            <div >
                                <label for="photoID" class="block text-sm font-medium">Photo ID</label>
                                <input type="file" class="w-full px-3 py-2 border rounded-md" id="photoID" name="photo_id" accept="image/*">
                            </div>

                            <div >
                                <label for="drivingLicense" class="block text-sm font-medium">Driving License Photo</label>
                                <input type="file" class="w-full px-3 py-2 border rounded-md" id="drivingLicense" name="driving_license" accept="image/*">
                            </div>

                            <div class="mb-3">
                              <label for="emergencyContactName" class="block text-sm font-medium">Emergency Contact Name</label>
                              <input type="text" class="w-full px-3 py-2 border rounded-md" id="emergencyContactName" name="emergency_contact_name" required>
                          </div>
      
                          <div class="mb-3">
                              <label for="emergencyContactNumber" class="block text-sm font-medium">Emergency Contact Number</label>
                              <input type="text" class="w-full px-3 py-2 border rounded-md" id="emergencyContactNumber" name="emergency_contact_number" required>
                          </div>
                        </fieldset>

                        
                        <!-- Account Details -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-500">Account Details</legend>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="email" class="block text-sm font-medium">Email</label>
                                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium">Password</label>
                                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded-md" required>
                                </div>
                            </div>
                        </fieldset>

                        <div class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" class="w-4 h-4 border rounded-md" required>
                            <label for="terms" class="ml-2 text-sm">I agree to the <a href="#" class="underline text-indig-500">Terms and Conditions</a>.</label>
                        </div>

                        <button type="submit" class="w-full py-3 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('menu-button').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>

