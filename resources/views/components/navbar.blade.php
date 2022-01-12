<nav class="fixed w-full z-50 h-16 shadow-md mt-0 items-center bg-gray-600 sm:flex sm:justify-between sm:px-4">
    <div>
        <a href="/">
            <img class="h-9 w-16 bg-white sm:inline-block" alt="logo">
        </a>
    </div>

    <div class="sm:flex hidden sm:items-center pt-0 pb-0 px-2">
        @if (auth::check())
            <a href="/logout" class="my-btn block px-2 py-1 hover:no-underline hover:bg-primary-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Log out</a>
            <form ref="mform" action="/logout" method="POST" class="hidden">
                    <input type="hidden" name="_token" :value="csrf">
            </form>
        @else
            <a href="/login" class="block text-white rounded-sm border border-white px-2 py-1 hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
            <a href="/register" class="block text-white rounded-sm border border-white px-2 py-1 border-transparent hover:no-underline hover:bg-gray-400 focus:ring-offset-0 focus:ring-gray-300 sm:ml-2">Register</a>
        @endif
    </div>
</nav>