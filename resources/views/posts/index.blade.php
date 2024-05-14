<style>
    .img {
        margin: auto;
        max-width: 75%;
    }

    p {
        font-size: large;
        padding: 2px 2em;
    }

    @media (max-width: 640px) {
        .img {
            margin: auto;
            max-width: 100%;
        }
    }

    @media (min-width: 641px) and (max-width: 767px) {
        .img {
            margin: auto;
            max-width: 90%;
        }
    }

    @media (min-width: 768px) and (max-width: 1023px) {
        .img {
            margin: auto;
            max-width: 80%;
        }
    }

    @media (min-width: 1024px) and (max-width: 1279px) {
        .img {
            margin: auto;
            max-width: 70%;
        }
    }

    @media (min-width: 1280px) and (max-width: 1535px) {
        .img {
            margin: auto;
            max-width: 60%;
        }
    }

    @media (min-width: 1536px) {
        .img {
            margin: auto;
            max-width: 50%;
        }
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
            <div class="p-6 space-y-2 sm:w-3/5 mx-auto mb-6 bg-slate-900 rounded-lg">
                @can('admin')
                    <div class="flex self-center">
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                        <a href="{{ route('post.edit', $post) }}">Edit</a>
                    </div>
                @endcan
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





