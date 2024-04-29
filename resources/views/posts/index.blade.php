<style>
    img {
        margin: auto;
        max-width: 500px !important;
    }

    p {
        font-size: large;
        padding: 2px 2em;
        /* Simplified padding declaration */
    }
</style>

<x-app-layout>
    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif
    <section class="dark:bg-gray-950 dark:text-gray-100">
        @foreach ($posts as $post)
            @can('admin')
                <form action="{{ route('post.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 px-4 py-3">Delete</button>
                </form>
            @endcan
            <div class="p-6 space-y-2 w-3/5 mx-auto mb-6 bg-slate-900 rounded-lg">
                <h3
                    class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline text-center underline">
                    {{ $post->title }}
                </h3>
                <p class="dark:text-gray-400 text-center mx-auto">{{ $post->created_at->format('F d, Y') }}</p>
                {!! $post->body !!}
            </div>
        @endforeach
        <x-footer />

    </section>

</x-app-layout>
