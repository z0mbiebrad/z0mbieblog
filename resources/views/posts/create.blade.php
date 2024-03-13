<x-app-layout>
    <div class="container mx-auto my-8 texwhite">
        <h1 class="text-3xl font-semibold text-white mb-6">Create a New Blog Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Title:</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Image:</label>
                <input type="file" name="image" id="image"
                    accept="image/jpeg, image/png, image/jpg, image/gif, image/svg"
                    class="mt-1 p-2 w-full border rounded-md text-white">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-sm font-medium">Content (Markdown):</label>
                <textarea name="body" id="body" class="mt-1 p-2 w-full border rounded-md text-black" rows="8"></textarea>
            </div>

            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Create
                Post</button>
        </form>
    </div>
</x-app-layout>
