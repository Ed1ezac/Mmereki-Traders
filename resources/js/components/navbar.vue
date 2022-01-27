<template>
    <nav v-bind:class="isLanding ? 'fixed w-full z-50 h-16 mt-0 bg-transparent':'fixed w-full z-50 h-16 shadow-md mt-0 bg-gray-600'">
        <div class="sm:flex sm:justify-between sm:px-4 2xl:mx-auto max-w-7xl h-full"> 
            <a href="/" class="self-center">
                <img class="h-9 w-16 bg-white sm:inline-block" alt="logo">
                <!--img class="h-9 sm:hidden" :src="logoUri" alt="logo"-->
            </a>

            <div class="flex space-x-12">
                <a v-if="isAuth" href="/home" class="flex justify-center items-center text-center h-full border-b-4 border-white hover:no-underline hover:bg-text-400">
                    <div class="-mb-1">
                        <p class="text-sm font-bold text-white hover:text-gray-700">
                            Dashboard
                        </p>
                    </div>
                </a>
                <a v-if="isAuth" href="/edit-profile" class="flex justify-center items-center py-1 h-full hover:no-underline">
                    <div class="">
                        <p class="text-sm font-bold text-gray-400 hover:text-white">
                            Profile
                        </p>
                    </div>
                </a>
                <a v-if="isAuth" href="/membership" class="flex justify-center items-center py-1 h-full hover:no-underline">
                    <div class="">
                        <p class="text-sm font-bold text-gray-400 hover:text-white">
                            Membership
                        </p>
                    </div>
                </a>
                <a v-if="isAuth" href="/settings" class="flex justify-center items-center py-1 h-full hover:no-underline">
                    <div class="">
                        <p class="text-sm font-bold text-gray-400 hover:text-white">
                            Settings
                        </p>
                    </div>
                </a>
            </div>

            <div class="sm:flex hidden sm:items-center pt-0 pb-0 px-2">
                <a v-if="isAuth" href="/logout" v-on:click.prevent="logout" class="block px-2 py-1 sm:ml-2 rounded text-white hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
                <!---->
                <a v-if="!isAuth" href="/login" class="block text-white rounded-sm border border-white px-2 py-1 hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
                <a v-if="!isAuth" href="/register" class="block sm:ml-2 text-white rounded-sm border border-white px-2 py-1 border-transparent hover:no-underline hover:bg-gray-400 focus:ring-offset-0 focus:ring-gray-300">Register</a>
            </div>
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