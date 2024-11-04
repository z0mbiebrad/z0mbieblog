<x-app-layout>

    @if ($message = session('error') ?: session('success'))
        <div class="text-white bg-green-500 p-4 rounded-md mb-6 max-w-4xl mx-auto text-center">
            {{ $message }}
        </div>
    @endif

    <article class="transparent sm:py-32 sm:w-4/5 max-w-5xl sm:mx-auto mx-4">
        <div class="lg:mx-auto py-20 lg:px-8">
            <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-100 sm:text-5xl">Code with me</h2>
            <p class="mt-2 text-lg leading-8 text-gray-300">Let's learn together!</p>
        </div>

        <div class="mx-auto lg:px-8">
            <div class="mx-auto space-y-16 border-t border-slate-300 pt-24">
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

                    <article class="flex flex-col items-start justify-between space-y-4 border-b border-slate-300  prose-code:break-all">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post->created_at }}" class="text-gray-400">
                                {{ $post->created_at->format('Y-m-d') }}
                            </time>
                        </div>

                        <div 
                            class="w-full sm:w-4/5 group relative prose prose-invert prose-headings:my-10 prose-headings:text-gray-200 prose-p:text-gray-200 prose-a:text-blue-400 prose-code:mx-auto prose-code:inline-block prose-code:text-left prose-code:m-0 prose-pre:p-0 prose-pre:m-0 prose-pre:text-left prose-code:w-11/12">
                            <p class="mt-2 text-sm leading-6 text-gray-300 break-all w-11/12">
                                {!! $post->html !!}
                            </p>
                        </div>

                            <p class="text-sm font-semibold text-gray-100 flex justify-end w-full pb-4 pr-6">
                                <a href="https://github.com/z0mbiebrad">- z0mbiebrad</a>
                            </p>
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