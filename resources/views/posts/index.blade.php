<x-app-layout>

    @if ($message = session('error') ?: session('success'))
        <div class="text-white bg-green-500 p-4 rounded-md mb-6 max-w-4xl mx-auto text-center">
            {{ $message }}
        </div>
    @endif

    <article class="transparent py-24 sm:py-32 w-5/6 sm:w-4/5 max-w-5xl mx-auto">
        <div class="lg:w-4/5 lg:mx-auto mb-10">
            <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-100 sm:text-5xl">Code with me</h2>
            <p class="mt-2 text-lg leading-8 text-gray-300">Let's learn together!</p>
        </div>

        <div class="mx-auto lg:px-8">
            <div class="mx-auto max-w-2xl space-y-16 border-t border-slate-300 pt-10 sm:pt-16">
                @foreach ($posts as $post)
                    @can('admin')
                        <div class="flex self-center justify-end space-x-4 mb-6">
                            <form action="{{ route('post.destroy', $post) }}" method="post" onsubmit="return confirmDeletion()">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-md ring-1 ring-red-500 px-3 py-1.5 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 shadow-md">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('post.edit', $post) }}" class="rounded-md ring-1 ring-blue-500 px-3 py-1.5 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 shadow-md">
                                Edit
                            </a>
                        </div>
                    @endcan

                    <article class="flex max-w-xl flex-col items-start justify-between space-y-4 border-b border-slate-300">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post->created_at }}" class="text-gray-400">
                                {{ $post->created_at->format('Y-m-d') }}
                            </time>
                        </div>

                        <div class="group relative prose prose-invert prose-headings:text-gray-200 prose-p:text-gray-200 prose-a:text-blue-400">
                            <h3 class="text-xl font-semibold text-gray-100">{{ $post->title }}</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-300 break-all">
                                {!! $post->html !!}
                            </p>
                        </div>

                        <div class="relative mt-4 flex items-center gap-x-4 pb-10 pl-8">
                            <p class="text-sm font-semibold text-gray-100">
                                <span class="absolute inset-0"></span>
                                <a href="https://github.com/z0mbiebrad">z0mbiebrad</a>
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </article>

</x-app-layout>

<script>
    function confirmDeletion() {
        return confirm("Are you sure you want to delete this post? This action cannot be undone.");
    }
</script>