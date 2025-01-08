<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showPopup(requestId) {
            const modal = document.getElementById('cancel-modal-' + requestId);
            modal.classList.remove('hidden');
        }

        function closePopup(requestId) {
            const modal = document.getElementById('cancel-modal-' + requestId);
            modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Dashboard Container -->
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4 shadow-lg">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Consultant Dashboard</h1>
                <div class="flex space-x-4">
                    <form action="<?php echo e(route('consultant.profile')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded shadow">Profile</button>
                    </form>
                    <form action="<?php echo e(route('consultant.logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded shadow">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-6 py-8">
            <!-- Section: Pending Requests -->
            <h2 class="text-xl font-semibold text-gray-700 mb-6">Pending Requests</h2>

            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-6">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Pending Requests List -->
            <?php if($pendingRequests->isEmpty()): ?>
                <p class="text-gray-600">No pending requests found.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $pendingRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">
                                <?php echo e($request->first_name); ?> <?php echo e($request->last_name); ?>

                            </h3>
                            <p class="text-sm text-gray-600"><strong>Email:</strong> <?php echo e($request->email); ?></p>
                            <p class="text-sm text-gray-600"><strong>Phone:</strong> <?php echo e($request->phone_number); ?></p>
                            <p class="text-sm text-gray-600"><strong>City:</strong> <?php echo e($request->city); ?>, <?php echo e($request->state); ?></p>
                            <p class="text-sm text-gray-600"><strong>Country:</strong> <?php echo e($request->country); ?></p>
                            <p class="text-sm text-gray-600"><strong>Company:</strong> <?php echo e($request->company_name); ?></p>
                            <p class="text-sm text-gray-600"><strong>Services of Interest:</strong> <?php echo e(implode(', ', json_decode($request->services_of_interest, true))); ?></p>
                            <p class="text-sm text-gray-600"><strong>Project Location:</strong> <?php echo e($request->project_location); ?></p>
                            <p class="text-sm text-gray-600"><strong>Start Date:</strong> <?php echo e($request->project_start_date); ?></p>
                            <p class="text-sm text-gray-600 mb-4"><strong>Description:</strong> <?php echo e($request->project_description); ?></p>

                            <form action="<?php echo e(route('requests.accept', $request->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Accept Request</button>
                            </form>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <!-- Section: Accepted Requests -->
            <h2 class="text-xl font-semibold text-gray-700 mt-12 mb-6">Accepted Requests</h2>

            <?php if($acceptedRequests->isEmpty()): ?>
                <p class="text-gray-600">No accepted requests found.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $acceptedRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">
                                <?php echo e($request->first_name); ?> <?php echo e($request->last_name); ?>

                            </h3>
                            <p class="text-sm text-gray-600"><strong>Email:</strong> <?php echo e($request->email); ?></p>
                            <p class="text-sm text-gray-600"><strong>Phone:</strong> <?php echo e($request->phone_number); ?></p>
                            <p class="text-sm text-gray-600"><strong>City:</strong> <?php echo e($request->city); ?>, <?php echo e($request->state); ?></p>
                            <p class="text-sm text-gray-600"><strong>Country:</strong> <?php echo e($request->country); ?></p>
                            <p class="text-sm text-gray-600"><strong>Company:</strong> <?php echo e($request->company_name); ?></p>
                            <p class="text-sm text-gray-600"><strong>Services of Interest:</strong> <?php echo e(implode(', ', json_decode($request->services_of_interest, true))); ?></p>
                            <p class="text-sm text-gray-600"><strong>Project Location:</strong> <?php echo e($request->project_location); ?></p>
                            <p class="text-sm text-gray-600"><strong>Start Date:</strong> <?php echo e($request->project_start_date); ?></p>
                            <p class="text-sm text-gray-600 mb-4"><strong>Description:</strong> <?php echo e($request->project_description); ?></p>

                            <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded w-full" onclick="showPopup(<?php echo e($request->id); ?>)">
                                Unaccept Request
                            </button>

                            <!-- Popup Modal -->
                            <div id="cancel-modal-<?php echo e($request->id); ?>" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-2/3">
                                    <h2 class="text-lg font-bold mb-4">Unaccept Request</h2>
                                    <form action="<?php echo e(route('requests.unaccept', $request->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <textarea name="reason" placeholder="Reason for unaccepting..." class="w-full border border-gray-300 p-2 rounded mb-4" required></textarea>
                                        <div class="flex justify-end space-x-2">
                                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closePopup(<?php echo e($request->id); ?>)">Cancel</button>
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/consultant/requests.blade.php ENDPATH**/ ?>