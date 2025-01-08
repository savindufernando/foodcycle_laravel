<h1 class="text-4xl font-bold text-green-500 mb-6">Most Liked Blogs</h1>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
    @foreach ($mostLikedBlogs as $blog)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if ($blog->photos1)
                <img src="{{ asset('storage/' . $blog->photos1) }}" alt="{{ $blog->title }}" class="w-full h-40 object-cover">
            @else
                <div class="w-full h-40 flex items-center justify-center bg-gray-200 text-gray-600">
                    No Image Available
                </div>
            @endif
            <div class="p-4">
                <h3 class="text-lg font-semibold">{{ $blog->title }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ Str::limit(strip_tags($blog->content), 80) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        </div>
    @endforeach
</div>
