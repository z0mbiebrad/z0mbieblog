<style>
    img {
        margin: auto;
    }
</style>

<x-app-layout>
    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif
    <section class="dark:bg-gray-800 dark:text-gray-100">
        <div class="container max-w-6xl mx-auto space-y-6 sm:space-y-12 w-5/6 mb-10 bg-gray-900">
            @foreach ($posts as $post)
                @can('admin')
                    <form action="{{ route('post.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 px-4 py-3">Delete</button>
                    </form>
                @endcan
                <a rel="noopener noreferrer" href="#"
                    class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline dark:bg-gray-900">
                    <div class="p-6 space-y-2 w-4/5 mx-auto">
                        <h3
                            class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline text-center">
                            {{ $post->title }}
                        </h3>
                        <p class="text-xs dark:text-gray-400 text-center">{{ $post->created_at->format('F d, Y') }}</p>
                        {!! $post->body !!}
                    </div>
                </a>
            @endforeach
        </div>
        <x-footer />

    </section>

</x-app-layout>
