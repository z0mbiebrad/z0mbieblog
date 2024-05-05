<x-app-layout>
    <div class="container mx-auto my-4 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Create a New Blog Post</h1>

        <div>
            <form action="{{ route('post.update', $post) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium pt-6">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}"
                        class="mt-1 p-2 w-full border rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium">Body:</label>
                    <textarea name="body" id="body" class="mt-1 p-2 w-full border rounded-md text-black" required rows="8">{{ $post->body }}</textarea>
                </div>

                <button type="submit"
                    class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 mb-10">Update
                    Post</button>
            </form>
        </div>
    </div>
</x-app-layout>