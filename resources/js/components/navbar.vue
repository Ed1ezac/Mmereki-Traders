<template>
    <nav v-bind:class="isLanding ? 'fixed w-full z-50 mt-0 bg-transparent':'fixed w-full z-50 shadow-md mt-0 bg-gray-600'">
        <!--Normal View-->
        <div class="flex justify-between px-4 h-16 2xl:mx-auto max-w-7xl"> 
            <div class="flex">
                <a href="/" class="self-center">
                    <img class="h-9 w-12 bg-green-600 rounded sm:inline-block" alt="logo">
                    <!--img class="h-9 sm:hidden" :src="logoUri" alt="logo"-->
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
                            Profile
                        </div>
                    </a>
                    <a v-if="isAuth" href="/membership" v-bind:class="currentUrl == 'membership' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Membership
                        </div>
                    </a>
                    <a v-if="isAuth" href="/settings" v-bind:class="currentUrl == 'settings' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Settings
                        </div>
                    </a>
                    <a v-if="isAuth" href="/admin/companies" v-bind:class="currentUrl == 'companies' ? 'text-white border-b-4 border-white hover:text-gray-800':'text-gray-400 hover:text-white py-1'" class="my-navbar-link">
                        <div class="text-sm font-bold">
                            Traders
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="block md:hidden self-center">
                <button @click="isOpen = !isOpen" type="button" class="text-primary-200 text-white focus:text-white focus:outline-none" 
                aria-controls="mobile-menu" aria-expanded="false">     
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path v-if="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        <path v-if="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex md:items-center pt-0 pb-0 px-2">
                <a v-if="isAuth" href="/logout" v-on:click.prevent="logout" class="block px-2 py-1 sm:ml-2 rounded text-white hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
                <!---->
                <a v-if="!isAuth" href="/login" class="block text-white rounded-sm border border-white px-2 py-1 hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
                <a v-if="!isAuth" href="/register" class="block sm:ml-2 text-white rounded-sm border border-white px-2 py-1 border-transparent hover:no-underline hover:bg-gray-400 focus:ring-offset-0 focus:ring-gray-300">Register</a>
            </div>
        </div>

        <div :class="isOpen ? 'block': 'hidden'" class="md:hidden overflow-auto px-4 pt-1 pb-4">
            <a v-if="isAuth" href="/home" v-bind:class="currentUrl == 'home' ? 'text-white bg-gray-900 border-white hover:text-gray-400':'text-gray-400 hover:text-white'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Dashboard
                </div>
            </a>
            <a v-if="isAuth" href="/edit-profile" v-bind:class="currentUrl == 'edit-profile' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Profile
                </div>
            </a>
            <a v-if="isAuth" href="/membership" v-bind:class="currentUrl == 'membership' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Membership
                </div>
            </a>
            <a v-if="isAuth" href="/settings" v-bind:class="currentUrl == 'settings' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Settings
                </div>
            </a>
            <a v-if="isAuth" href="/admin/companies" v-bind:class="currentUrl == 'companies' ? 'text-white bg-gray-900 hover:text-gray-400':'text-gray-400 hover:text-white hover:bg-gray-900'" class="rounded my-navbar-link-mobile">
                <div class="text-sm font-bold">
                    Traders
                </div>
            </a>
            <div class="border border-t border-gray-50 my-1"></div>
            <a v-if="isAuth" href="/logout" v-on:click.prevent="logout" class="block px-2 py-1 sm:ml-2 rounded text-white hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
        </div>

        <!----->
        <form ref="mform" action="/logout" method="POST" class="hidden">    
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </nav>
</template>

<script>
    export default {
        data () {
            return {
                isOpen: false,
                //isLanding: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props:{
            currentUrl: String,
            isAuth: Boolean,
            /*currentAdminUrl: {
                type: String,
                default: '',
            },*/
            //logoUri: String,
            //username: String,
            //initials: String,
            //loginRoute: String,
            //registerRoute: String,
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
    }
</script>