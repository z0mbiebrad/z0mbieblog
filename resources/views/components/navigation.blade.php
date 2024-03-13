<div
    class="p-6 text-right z-10 items-center justify-end flex font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
    @auth

        @can('admin')
            <a class="mr-4" href="{{ url('/dashboard') }}">Admin</a>
        @endcan

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">{{ __('Log Out') }}
            </a>
        </form>
    @else
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login
        </a>

        <a href="{{ route('register') }}"
            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register
        </a>
    @endauth
</div>
