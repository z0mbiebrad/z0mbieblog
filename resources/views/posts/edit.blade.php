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

        <div class="mb-4 flex flex-wrap">
            @foreach ($images as $image)
                <div class="basis-1/4 box-content flex relative p-2">
                    <input type="checkbox" name="selected_images[]" id="image{{ $loop->iteration }}"
                        value="{{ $image->id }}" class="absolute top-2 left-2"
                        onclick="copyToClipboard('![image]({{ asset('storage/' . $image->image_path) }})')">

                    <label for="image{{ $loop->iteration }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="">
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    function copyToClipboard(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }
</script>