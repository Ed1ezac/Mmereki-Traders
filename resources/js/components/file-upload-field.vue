<template>
    <div :class="hasSelected ?'h-20':''" class="relative">
        <transition
            enter-active-class="transform-gpu duration-500 delay-75"
            enter-class="opacity-0 scale-0"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transform-gpu duration-700"
            leave-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-0">
            
            <div v-show="!hasSelected" @dragover="dragover" @dragleave="dragleave" @drop="drop"
            class="mt-1 flex z-0 justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                     <svg class="h-5 w-5 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    <div class="flex text-sm text-gray-600">
                        <label :for="identity+'-file'" class="relative cursor-pointer rounded-sm font-medium text-primary-800 hover:text-primary-400 focus-within:outline-none focus-within:ring-1 focus-within:ring-offset-1 focus-within:ring-primary-500">
                            <span>Click to select a file</span>
                            <input :id="identity+'-file'" name="file" type="file" multiple required ref="file" @change="onChange" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">{{ hint }}</p>
                </div>
            </div>
        </transition>
        <transition 
            enter-active-class="transform-gpu duration-700"
            enter-class="opacity-0 scale-x-50 translate-y-10"
            enter-to-class="opacity-100 scale-x-100 translate-y-0"
            leave-active-class="transform-gpu duration-1000"
            leave-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-20">
            <div v-show="hasSelected" class="absolute top-0 p-2 bg-primary-600 hover:bg-primary-400 rounded-md w-full">
                <div class="flex justify-start items-center">
                    <button @click="remove(filelist.indexOf(file))" type="button" class="bg-gray-800 rounded-full border-2 border-white text-white hover:bg-primary-200">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="flex flex-col ml-3" v-for="file in filelist" :key="filelist.indexOf(file)">
                        <h3 class="text-sm text-white">{{ file.name }}</h3>
                        <p class="text-xs text-gray-200">{{ fileSize }}</p><!--  -->
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        //delimiters: ['${', '}'],
        data() {
            return {
                hasSelected: false,
                filelist:[],
            }
        },
        computed : {
            fileSize :{
                get : function(){
                    var size = this.filelist[0].size
                    return this.formatBytes(size)
                },
		    }
        },
        props : {
            hint:{
                type: String,
                default: '',
            },
            identity: String,
        },
        methods: {
            onChange() {
                this.filelist = [...this.$refs.file.files];
                this.hasSelected = true;
            },
            remove(i) {
                this.filelist.splice(i, 1);
                this.hasSelected = false;
            },
            dragover(event) {
                event.preventDefault();
                //visual feedback
                if (!event.currentTarget.classList.contains('bg-gray-300')) {
                    event.currentTarget.classList.add('bg-gray-300');
                }
            },
            dragleave(event) {
                event.currentTarget.classList.remove('bg-gray-300');
            },
            drop(event) {
                event.preventDefault();
                this.$refs.file.files = event.dataTransfer.files;
                this.onChange();
                event.currentTarget.classList.remove('bg-gray-300');
            },
            formatBytes(a, b){
                if(0 == a)
                    return"0 Bytes";
                var c = 1024, 
                    d = b||2,
                    e = ["Bytes","KB","MB"],
                    f = Math.floor(Math.log(a)/Math.log(c));
                return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f];
	        }
        }
    }
</script>    