<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($blog->title); ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .like-button {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .like-button:hover {
            transform: scale(1.1);
        }
        .like-count {
            margin-left: 8px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <?php echo $__env->make('layouts.bheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Blog Container -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <?php if($blog->photos1): ?>
            <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-64 object-cover">
        <?php endif; ?>

            <!-- Blog Content -->
            <div class="p-6">
            <?php if(auth()->guard('blogger')->check()): ?>
                <?php if($blog->blogger_id === Auth::guard('blogger')->id()): ?>
                    <a href="<?php echo e(route('blogs.edit', $blog->id)); ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        Edit Blog
                    </a>
                <?php endif; ?>
            <?php endif; ?>

                <h1 class="text-3xl font-bold text-gray-800"><?php echo e($blog->title); ?></h1>
                <p class="text-gray-500 mt-2">By <?php echo e($blog->blogger->name); ?> | <?php echo e($blog->created_at->format('M d, Y')); ?></p>

                <div class="text-gray-700 leading-relaxed mt-4">
                    <?php echo $blog->content; ?>

                </div>

                <!-- Like Button Section -->
            <div class="mt-6 flex items-center">
                <?php if(auth()->guard('blogger')->check()): ?>
                    <!-- Like button for logged-in users -->
                    <form action="<?php echo e(route('blogs.like', $blog->id)); ?>" method="POST" class="inline-block" id="like-form">
                        <?php echo csrf_field(); ?>
                        <i onclick="toggleLike(this)" 
                        class="fa fa-thumbs-up like-button <?php echo e($blog->likes->where('blogger_id', Auth::id())->count() > 0 ? 'fa-thumbs-down' : ''); ?> text-3xl"
                        aria-hidden="true"></i>
                        <span class="like-count" id="like-count"><?php echo e($blog->likes->count()); ?> Likes</span>
                    </form>
                <?php else: ?>
                    <!-- Like button for guests (non-interactive, with login prompt) -->
                    <i onclick="promptLogin()" class="fa fa-thumbs-up like-button text-3xl" aria-hidden="true"></i>
                    <span class="like-count"><?php echo e($blog->likes->count()); ?> Likes</span>
                <?php endif; ?>
            </div>

            </div>
        </div>
        <?php if(Auth::guard('blogger')->check()): ?>
            <p>Logged-in Blogger ID: <?php echo e(Auth::guard('blogger')->id()); ?></p>
            <p>Logged-in Blogger Name: <?php echo e(Auth::guard('blogger')->user()->name); ?></p>
        <?php else: ?>
            <p>No blogger is logged in.</p>
        <?php endif; ?>



        <!-- Comments Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <h2 id="comment-count" class="text-2xl font-bold mb-6">Comments (<?php echo e($blog->comments->count()); ?>)</h2>

            <!-- Display Comments -->
        <div class="space-y-4">
            <?php $__empty_1 = true; $__currentLoopData = $blog->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="p-4 bg-gray-50 rounded-lg relative">
                    <p class="text-gray-800"><?php echo e($comment->comment); ?></p>
                    <p class="text-sm text-gray-500 mt-2">By: <?php echo e($comment->blogger->name); ?> | <?php echo e($comment->created_at->format('M d, Y')); ?></p>

                    <!-- Show Edit and Delete buttons only for the comment owner -->
                    <?php if(Auth::guard('blogger')->id() === $comment->blogger_id): ?>
                        <div class="absolute top-2 right-2 flex space-x-2">
                            <!-- Edit Button -->
                            <button onclick="editComment(<?php echo e($comment->id); ?>, '<?php echo e($comment->comment); ?>')" class="text-blue-500 hover:text-blue-700">
                                <i class="fa fa-edit"></i> 
                            </button>

                            <!-- Delete Button -->
                            <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fa fa-trash"></i> 
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-600">No comments yet. Be the first to comment!</p>
            <?php endif; ?>
        </div>

        <!-- Hidden Edit Comment Form -->
        <div id="editCommentFormContainer" class="hidden mt-8">
            <form id="editCommentForm" action="" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <textarea name="comment" id="editCommentInput" rows="3" required class="w-full border border-gray-300 rounded-lg p-4"></textarea>
                <button type="submit" class="mt-4 px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Update Comment
                </button>
                <button type="button" onclick="cancelEdit()" class="mt-4 px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Cancel
                </button>
            </form>
        </div>



            <!-- Add Comment Form -->
            <?php if(auth()->guard('blogger')->check()): ?>
                <form id="commentForm" action="<?php echo e(route('blogs.comment', $blog->id)); ?>" method="POST" class="mt-8">
                    <?php echo csrf_field(); ?>
                    <textarea name="comment" id="commentInput" rows="3" required class="w-full border border-gray-300 rounded-lg p-4" placeholder="Write your comment..."></textarea>
                    <button type="submit" class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Submit Comment
                    </button>
                </form>
            <?php endif; ?>

            <?php if(auth()->guard('blogger')->guest()): ?>
                <p class="text-gray-600 mt-4">Please <a href="<?php echo e(route('login')); ?>" class="text-blue-500 underline">login</a> to add a comment.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('blogs.partials.recent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JavaScript for Comments -->
    <script>
        document.getElementById('commentForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const form = this;
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Clear the input field
                    document.getElementById('commentInput').value = '';

                    // Append the new comment to the comments section
                    const commentsContainer = document.getElementById('comments-container');
                    commentsContainer.insertAdjacentHTML('beforeend', `
                        <div class="p-4 bg-gray-50 rounded-lg" id="comment-${data.comment.id}">
                            <p class="text-gray-800">${data.comment.comment}</p>
                            <p class="text-sm text-gray-500 mt-2">By: ${data.comment.blogger_name} | ${data.comment.created_at}</p>
                        </div>
                    `);

                    // Update the comment count instantly
                    const commentCountElement = document.getElementById('comment-count');
                    commentCountElement.innerText = `Comments (${data.comment_count})`;
                } else {
                    alert('Failed to submit the comment. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
        function promptLogin() {
        if (confirm('To like this post, you need to log in. Do you want to log in now?')) {
            window.location.href = "<?php echo e(route('blogger.login')); ?>";
        }
    }

        function toggleLike(element) {
            element.classList.toggle("fa-thumbs-down");

            const form = document.getElementById('like-form');
            const likeCountSpan = document.getElementById('like-count');

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                likeCountSpan.textContent = `${data.likes} Likes`;
            })
            .catch(error => console.error('Error:', error));
        }
        function editComment(commentId, commentContent) {
            // Show the edit form and populate it with the comment data
            const editFormContainer = document.getElementById('editCommentFormContainer');
            const editCommentInput = document.getElementById('editCommentInput');
            const editCommentForm = document.getElementById('editCommentForm');

            editFormContainer.classList.remove('hidden'); // Show the form
            editCommentInput.value = commentContent; // Set the current comment content

            // Set the form action dynamically
            editCommentForm.action = `/comments/${commentId}`;
        }

        function cancelEdit() {
            // Hide the edit form and clear its content
            const editFormContainer = document.getElementById('editCommentFormContainer');
            const editCommentInput = document.getElementById('editCommentInput');

            editFormContainer.classList.add('hidden');
            editCommentInput.value = '';
        }

    </script>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogs/show.blade.php ENDPATH**/ ?>