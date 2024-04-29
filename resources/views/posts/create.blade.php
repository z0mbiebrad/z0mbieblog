<x-app-layout>
    @if ($message = session('error') ?: session('success'))
        <div class="text-white p-2">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white p-2">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="container mx-auto my-4 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Create a New Blog Post</h1>

        <div>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" id="post.store">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium pt-6">Title:</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 p-2 w-full border rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium">Body:</label>
                    <textarea name="body" id="body" class="mt-1 p-2 w-full border rounded-md text-black" required rows="8">{{ old('body') }}</textarea>
                </div>

                <button type="submit"
                    class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 mb-10">Create
                    Post</button>
            </form>
        </div>
    </div>

    <div class="container mx-auto my-4 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Images:</h1>

        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 flex">
                <input type="file" name="images[]" id="images" multiple
                    accept="image/jpeg, image/png, image/jpg, image/gif, image/svg" class="mt-1 p-2" required>
                <button type="submit" class="bg-gray-500 text-white px-4 rounded-md hover:bg-gray-600">Upload
                    Images</button>
            </div>
        </form>

        @if (!empty($images[0]))
            <form action="{{ route('image.destroy') }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                    Delete Selected
                </button>

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
            </form>
        @endif
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

    document.addEventListener('DOMContentLoaded', function() {
        var titleTextarea = document.getElementById('title');
        var savedContent = localStorage.getItem('blogTitle');

        titleTextarea.value = savedContent;
        titleTextarea.addEventListener('input', function() {
            localStorage.setItem('blogTitle', this.value);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var bodyTextarea = document.getElementById('body');
        var savedContent = localStorage.getItem('blogBody');

        bodyTextarea.value = savedContent;
        bodyTextarea.addEventListener('input', function() {
            localStorage.setItem('blogBody', this.value);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var postForm = document.getElementById('post.store');
        postForm.addEventListener('submit', function() {
            console.log('test');

            localStorage.removeItem('blogTitle');
            localStorage.removeItem('blogBody');
        });
    });
</script>
