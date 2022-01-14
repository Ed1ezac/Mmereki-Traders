<template>
    <nav v-bind:class="isLanding ? 'fixed w-full z-50 h-16 mt-0 bg-transparent':'fixed w-full z-50 h-16 shadow-md mt-0 bg-gray-600'">
        <div class="sm:flex sm:justify-between items-center sm:px-4 2xl:mx-auto max-w-7xl h-full">
            <div> 
                <a href="/">
                    <img class="h-9 w-16 bg-white sm:inline-block" alt="logo">
                    <!--img class="h-9 sm:hidden" :src="logoUri" alt="logo"-->
                </a>
            </div>

            <div class="sm:flex hidden sm:items-center pt-0 pb-0 px-2">
                <a v-if="isAuth" href="/logout" v-on:click.prevent="logout" class="my-btn block px-2 py-1 rounded text-white hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Logout</a>
                <!---->
                <a v-if="!isAuth" href="/login" class="block text-white rounded-sm border border-white px-2 py-1 hover:no-underline hover:bg-gray-400 border-transparent focus:ring-offset-0 focus:ring-gray-300">Login</a>
                <a v-if="!isAuth" href="/register" class="block text-white rounded-sm border border-white px-2 py-1 border-transparent hover:no-underline hover:bg-gray-400 focus:ring-offset-0 focus:ring-gray-300 sm:ml-2">Register</a>
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