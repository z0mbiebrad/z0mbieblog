<x-app-layout>
    <div class="container mx-auto my-8 text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Upload an Image</h1>

        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @if ($message = session('error') ?: session('success'))
                <div class="text-white">
                    {{ $message }}
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Image:</label>
                <input type="file" name="image" id="image"
                    accept="image/jpeg, image/png, image/jpg, image/gif, image/svg"
                    class="mt-1 p-2 w-full border rounded-md text-white">
                <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Upload Image</button>
            </div>

            <div class="flex flex-wrap">
                @foreach ($images as $image)
                    <div class="relative basis-1/5 box-content">
                        <label for="image"></label>
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="px-3">
                    </div>
                @endforeach
            </div>

            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Create
                Post</button>
        </form>
    </div>
</x-app-layout>
