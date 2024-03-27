<x-app-layout>
    <div class="container mx-auto my-8 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Create a New Blog Post</h1>

        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @if ($message = session('error') ?: session('success'))
                <div class="text-white">
                    {{ $message }}
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
            @php
                $imagesDirectory = public_path('storage/images');
                $imageFileNames = array_diff(scandir($imagesDirectory), ['.', '..']);
            @endphp
            <div class="flex flex-wrap">
                @foreach ($imageFileNames as $fileName)
                    <div class="relative basis-1/4 box-content">
                        <input type="checkbox" name="" id="" class="absolute"
                            onclick="copyToClipboard('{{ asset('storage/images/' . $fileName) }}')">
                        <img src="{{ asset('storage/images/' . $fileName) }}" class="">
                    </div>
                @endforeach
            </div>

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





            <div class="mb-4">
                <label for="body" class="block text-sm font-medium">Body:</label>
                <textarea name="body" id="body" class="mt-1 p-2 w-full border rounded-md text-black" rows="8"></textarea>
            </div>

            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Create
                Post</button>
        </form>
    </div>
</x-app-layout>

<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("MyID")
    });
</script>
