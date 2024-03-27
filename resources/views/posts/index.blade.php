<x-app-layout>
    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif
    <section class="dark:bg-gray-800 dark:text-gray-100">
        <div class="container max-w-6xl mx-auto space-y-6 sm:space-y-12 w-5/6 mb-10 bg-gray-900">

            @foreach ($posts as $post)
                {{-- <a rel="noopener noreferrer" href="{{ route('posts.show', $post->id) }}" --}}
                <a rel="noopener noreferrer" href="#"
                    class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                        class="object-cover max-w-full h-96 rounded lg:col-span-7 dark:bg-gray-500 flex mx-auto">
                    <div class="p-6 space-y-2 lg:col-span-5 w-4/5 mx-auto">
                        <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">
                            {{ $post->title }}
                        </h3>
                        <span class="text-xs dark:text-gray-400">{{ $post->created_at->format('F d, Y') }}</span>
                        <p>{!! $post->body !!}</p>
                    </div>
                </a>
                @can('admin')
                    <form action="{{ route('post.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                @endcan
            @endforeach
        </div>
        <x-footer />

    </section>

</x-app-layout>
