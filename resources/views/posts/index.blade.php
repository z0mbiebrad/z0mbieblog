<x-app-layout>
    <section class="dark:bg-gray-800 dark:text-gray-100">
        <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">

            @foreach ($posts as $post)
                {{-- <a rel="noopener noreferrer" href="{{ route('posts.show', $post->id) }}" --}}
                <a rel="noopener noreferrer" href="#"
                    class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                        class="object-cover max-w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500 flex">
                    <div class="p-6 space-y-2 lg:col-span-5">
                        <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">
                            {{ $post->title }}
                        </h3>
                        <span class="text-xs dark:text-gray-400">{{ $post->created_at->format('F d, Y') }}</span>
                        <p>{{ $post->body }}</p>
                    </div>
                </a>
            @endforeach

            <div class="flex justify-center">
                <button type="button"
                    class="px-6 py-3 text-sm rounded-md hover:underline dark:bg-gray-900 dark:text-gray-400">Load
                    more posts...</button>
            </div>
        </div>
    </section>
</x-app-layout>
