<template>
    <nav v-bind:class="isLanding ? 'fixed w-full z-50 mt-0 bg-transparent':'fixed w-full z-50 shadow-md mt-0 bg-gray-600'">
        <!--Normal View-->
        <div class="flex justify-between px-4 h-16 2xl:mx-auto max-w-7xl"> 
            <div class="flex">
                <a href="/" class="self-center text-white text-center">
                    <img class="h-9 w-12 bg-green-600 rounded-full sm:inline-block" alt="logo">
                </a>

                <div class="hidden md:flex md:ml-12 md:space-x-12">
                    <a v-if="isAuth" href="/home" v-bind:class="currentUrl == 'home' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="-mb-1">
                            <p class="text-sm font-bold">
                                Dashboard
                            </p>
                        </div>
                    </a>
                    <a v-if="isAuth" href="/edit-profile" v-bind:class="currentUrl == 'edit-profile' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Edit Profile
                        </div>
                    </a>
                    <a v-if="isAuth" href="/membership" v-bind:class="currentUrl == 'membership' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Membership
                        </div>
                    </a>
                    <a v-if="isAuth && isAdmin" href="/admin/companies" v-bind:class="currentUrl == 'companies' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Companies
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="block md:hidden self-center">
                <button @click="isOpen = !isOpen" type="button" :class="currentUrl == ''? 'text-gray-500 focus:text-gray-500':'text-white focus:text-white'" class="focus:outline-none" 
                aria-controls="mobile-menu" aria-expanded="false">     
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path v-if="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        <path v-if="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex md:items-center pt-0 pb-0 px-2">
                <!---Avatar---->
                <div v-if="isAuth" class="relative inline-block text-left">
                    <Menu>
                        <MenuButton type="button" class="bg-gray-800 relative z-10 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-300" id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-gray-700 rounded-full overflow-hidden shadow-inner text-center bg-purple table">
                                <span class="table-cell text-sm text-white font-bold align-middle uppercase">{{ initials }}</span>
                            </div>
                        </MenuButton>
                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-out"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0">
                            <MenuItems class="absolute right-0 w-52 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg outline-none">
                                 <MenuItem>
                                    <div class="flex-col border-b py-1 bg-gray-50 border-gray-100">
                                        <h3 class="whitespace-normal px-4 w-52 text-gray-800">{{ username }}</h3>
                                        <h3 class="whitespace-normal px-4 text-sm w-52 text-gray-400">{{ company }}</h3>
                                        <h3 class="whitespace-normal px-4 text-xs w-52 text-gray-400">{{ email }}</h3>
                                    </div>
                                </MenuItem>
                                 <MenuItem v-slot="{ active }">
                                    <a href="/settings" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Settings</a>
                                </MenuItem> 
                                <MenuItem v-slot="{ active }">
                                    <a v-on:click.prevent="logout" href="/logout" :class="active ? 'bg-gray-100 text-gray-900':'text-gray-700'" class="block px-4 py-3 rounded-b-md text-sm text-gray-700 hover:bg-gray-100 hover:no-underline" role="menuitem">Logout</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
                <!---->
                <a v-if="!isAuth && currentUrl != 'login'" href="/login" class="block text-white bg-gray-700 px-8 py-1.5 hover:no-underline hover:bg-gray-800 border-transparent focus:ring-offset-0 focus:ring-gray-300">Trades Login</a>
                <a v-if="!isAuth && currentUrl != 'register'" href="/register" class="block sm:ml-2 text-white bg-gray-700 px-8 py-1.5 border-transparent hover:no-underline hover:bg-gray-800 focus:ring-offset-0 focus:ring-gray-300">Trades Register</a>
            </div>
        </div>

        <!---Mobile Veiw---->
        <div :class="isOpen ? isAuth && currentUrl == '' ? 'bg-gray-600 block':'block' : 'hidden'" class="md:hidden overflow-auto px-4 pt-1 pb-4">
            <a v-if="isAuth" href="/home" v-bind:class="currentUrl == 'home' ? 'text-white bg-gray-900 border-white hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Dashboard
                </div>
            </a>
            <a v-if="isAuth" href="/edit-profile" v-bind:class="currentUrl == 'edit-profile' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Edit Profile
                </div>
            </a>
            <a v-if="isAuth" href="/membership" v-bind:class="currentUrl == 'membership' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Membership
                </div>
            </a>
            <a v-if="isAuth && isAdmin" href="/admin/companies" v-bind:class="currentUrl == 'companies' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Companies
                </div>
            </a>
            <div v-if="isAuth" class="border-b border-gray-50 my-1"></div>
            <!---Avatar And All---->
            <div>
                <div v-if="isAuth" class="flex items-center py-1">
                    <div class="w-12 h-12 bg-gray-700 rounded-full overflow-hidden shadow-inner text-center table">
                        <span class="table-cell text-sm text-white font-bold align-middle">MT</span>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="whitespace-normal px-4 text-white">{{ username }}</h3>
                        <h3 class="whitespace-normal px-4 text-xs text-gray-200">{{ company }}</h3>
                        <h3 class="whitespace-normal px-4 text-xs text-gray-300">{{ email }}</h3>
                    </div>
                </div>
                <a v-if="isAuth" href="/settings" v-bind:class="currentUrl == 'settings' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                    <div class="text-sm font-bold">
                        Settings
                    </div>
                </a>   
                <a v-if="isAuth" href="/logout" v-on:click.prevent="logout" class="block mt-1 px-2 py-2 font-bold text-sm hover:no-underline rounded text-gray-400 hover:text-white hover:bg-gray-900 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
            </div>
            <!----Un-Authenticated----->
            <a v-if="!isAuth && currentUrl != 'login'" href="/login" :class="currentUrl == ''? 'border-gray-600 text-gray-500 hover:text-white':'border-white text-white'" class="block border px-2 py-1 hover:no-underline hover:bg-gray-700 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
            <a v-if="!isAuth && currentUrl != 'register'" href="/register" :class="currentUrl == ''? 'border-gray-600 text-gray-500 hover:text-white':'border-white text-white'" class="block mt-1 border px-2 py-1 hover:no-underline hover:bg-gray-700 focus:ring-offset-0 focus:ring-gray-300">Register</a>
        </div>

        <!----->
        <form ref="mform" action="/logout" method="POST" class="hidden">    
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </nav>
</template>

<script>
    import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
    export default {
        data () {
            return {
                isOpen: false,
                //isLanding: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props:{
            email:{
                type: String,
                default: '',
            },
            company: {
                type: String,
                default: '',
            },
            isAuth: Boolean,
            isAdmin: Boolean,
            /*currentAdminUrl: {
                type: String,
                default: '',
            },*/
            //logoUri: String,
            username: {
                type: String,
                default: '',
            },
            currentUrl: String,
            initials: String,
        },
        computed: {
            /*isOnAdmin(){
                return this.currentUrl === 'admin';
            },*/
            isLanding(){
                return this.currentUrl === '';
            }
        },
        methods:{
            logout: function(){
                this.$refs.mform.submit();
            },
        },
        components:{
            Menu, 
            MenuItem,
            MenuItems,
            MenuButton,
        }
    }
</script>