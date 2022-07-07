<nav class="fixed w-full z-50 h-16 shadow-md mt-0 bg-gray-600">
    <div class="sm:flex sm:justify-between items-center sm:px-4 2xl:mx-auto max-w-7xl h-full">
        <div> 
            <a href="/">
                <img class="h-9 w-16 bg-white sm:inline-block" alt="logo">
            </a>
        </div>

        <div class="sm:flex hidden sm:items-center pt-0 pb-0 px-2">
            @if (auth::check())
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('mform').submit();"
                 class="my-btn block px-2 py-1 rounded text-white hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
                <form id="mform" action="/logout" method="POST" class="hidden">    
                    @csrf
                    <!--input type="hidden" name="_token" :value="csrf" -->
                </form>
            @else
                <a href="/login" class="block text-white rounded-sm border border-white px-2 py-1 hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
                <a href="/register" class="block text-white rounded-sm border border-white px-2 py-1 border-transparent hover:no-underline hover:bg-gray-400 focus:ring-offset-0 focus:ring-gray-300 sm:ml-2">Register</a>
            @endif
        </div>
    </div>
</nav>