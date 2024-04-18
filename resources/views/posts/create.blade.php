<x-app-layout>

    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif

    <div class="container mx-auto my-8 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Create a New Blog Post</h1>

        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 flex">
                <input type="file" name="image" id="image"
                    accept="image/jpeg, image/png, image/jpg, image/gif, image/svg" class="mt-1 p-2">
                <button type="submit" class="bg-gray-500 text-white px-4 rounded-md hover:bg-gray-600">Upload
                    Image</button>
            </div>
        </form>


        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <h2 class="block">Images:</h2>
            <div class="flex flex-wrap">
                @foreach ($images as $image)
                    <div class="basis-1/4 box-content flex relative p-2">
                        <label for="image{{ $loop->iteration }}">
                            <input type="checkbox" name="" id="image{{ $loop->iteration }}"
                                class="absolute top-2 left-2"
                                onclick="copyToClipboard('![image]({{ asset('storage/' . $image->image_path) }})')">

                            <img src="{{ asset('storage/' . $image->image_path) }}" class="">
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium pt-6">Title:</label>
                <input type="text" name="title" id="title"
                    class="mt-1 p-2 w-full border rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-sm font-medium">Body:</label>
                <textarea name="body" id="body" class="mt-1 p-2 w-full border rounded-md text-black" rows="8"></textarea>
            </div>

            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 mb-10">Create
                Post</button>
        </form>
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
