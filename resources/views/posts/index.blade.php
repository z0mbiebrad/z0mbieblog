<x-app-layout>
    
    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif
    <article class="dark:bg-gray-950 dark:text-gray-100">
        @foreach ($posts as $post)
            <div class="p-6 space-y-2 md:w-11/12 lg:w-4/5 2xl:w-3/5 mx-auto mb-6 bg-slate-900 rounded-lg prose prose-invert prose-img:rounded-xl">
                @can('admin')
                    <div class="flex self-center justify-between">
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                        <a href="{{ route('post.edit', $post) }}" class="text-white">Edit</a>
                    </div>
                @endcan
                <p class="dark:text-gray-00 text-center mx-auto">{{ $post->created_at->format('F d, Y') }}</p>
                {!! $post->html !!}
            </div>
        @endforeach
        <x-footer />

    </article>

</x-app-layout>





