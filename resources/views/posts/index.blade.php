<x-app-layout>

    @if ($message = session('error') ?: session('success'))
        <div class="text-white">
            {{ $message }}
        </div>
    @endif
    <article class="transparent py-24 sm:py-32 w-5/6 sm:w-4/5 max-w-5xl mx-auto">
        <div>
            <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-100 sm:text-5xl">Code with me
            </h2>
            <p class="mt-2 text-lg leading-8 text-gray-300">Let's learn together!</p>
        </div>
        @foreach ($posts as $post)
            <div class="mx-auto max-w-7xl lg:px-8">
                @can('admin')
                    <div class="flex self-center justify-end space-x-4 mb-6">
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md ring-1 ring-red-300 px-2.5 py-1.5 text-sm font-semibold text-red-300 shadow-sm hover:bg-red-100">
                                Delete
                            </button>
                        </form>
                        <button type="button"
                            class="rounded-md ring-1 text-blue-300 ring-blue-300 px-2.5 py-1.5 text-sm font-semibold shadow-sm hover:bg-blue-100">
                            <a href="{{ route('post.edit', $post) }}" class="">Edit</a>
                        </button>
                    </div>
                @endcan
                <div class="mx-auto max-w-2xl">
                    <div class="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16"
                                    class="text-gray-300">{{ $post->created_at->format('Y-m-d') }}</time>
                            </div>
                            <div
                                class="group relative prose prose-headings:text-gray-200 prose-p:text-gray-100 prose-a:text-blue-400">
                                <p class="mt-5 line-clamp-3 text-sm leading-6">
                                    {!! $post->html !!}
                                </p>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-100">
                                        <span class="absolute inset-0"></span>
                                        z0mbiebrad
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        @endforeach
    </article>
</x-app-layout>
