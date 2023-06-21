<template>
    <div class="relative w-full mt-1">
        <Combobox v-model="selectedLocation" name="location">
            <div class="relative overflow-visible">
                <!---Input & Button--->
                <div class="relative border border-gray-600 w-full cursor-default overflow-hidden text-left 
                    shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-600 
                    focus-visible:ring-opacity-75 focus-visible:ring-offset-2 
                    focus-visible:ring-offset-gray-300 sm:text-sm">
                    <ComboboxInput class="w-full bg-gray-300 pl-3 pr-10 text-sm leading-5 font-semibold text-gray-900 border-none "
                        :displayValue="(location) => location.name"
                        @change="query = $event.target.value" placeholder="Location, e.g. Gaborone"/>
                </div>
                <!---Options--->
                <TransitionRoot leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                    @after-leave="query = ''">
                    <ComboboxOptions v-if="query.length >= 2" class="absolute mt-1.5 mb-2 max-h-64 z-10 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <div v-if="filteredLocations.length === 0 && query !== ''"
                            class="relative cursor-default select-none py-2 px-4 text-gray-700">
                            No match found.
                        </div>

                        <ComboboxOption
                            v-for="location in filteredLocations"
                            as="template"
                            :key="location.id"
                            :value="location"
                            v-slot="{ selected, active }">
                                <li class="relative cursor-default select-none py-2 pl-10 pr-4"
                                    :class="{ 'bg-primary-500 text-white': active, 'text-gray-900': !active,}">
                                    <span class="block truncate"
                                        :class="{ 'font-semibold': selected, 'font-normal': !selected }">
                                        {{ location.name }}
                                    </span>
                                    <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3"
                                        :class="{ 'text-white': active, 'text-green-600': !active }">
                                    <!---CheckIcon---->
                                        <div class="text-primary-300" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </span>
                                </li>
                        </ComboboxOption>
                    </ComboboxOptions>
                </TransitionRoot>
            </div>
        </Combobox>
    </div>
</template>

<script>
import { ref } from 'vue';
import {
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
    TransitionRoot,
} from '@headlessui/vue';
export default {
    data (){
        return {
            query : ref(''),
            selected: ref([]),
            selectedLocation: ref(),          
        }
    },
    props: {
        locations: Array,
        myLocation: {
            type: Object,
            default: undefined,
        }
    },
    mounted(){
        //Initial population, if user already has trades
        console.log(this.myLocation);
        if(this.myLocation !== null && this.myLocation !== undefined){
            for(let j=0; j<this.locations.length; j++){
                if(this.myLocation.name === this.locations[j].name){
                    this.selectedLocation = this.myLocation;
                    //push(this.trades[j]);
                }
            }
        }
    },
    computed: {
        filteredLocations (){            
            return this.query === '' ? this.locations
                : this.locations.filter((location) =>
                    location.name
                    .toLowerCase()
                    .replace(/\s+/g, '')
                    .includes(this.query.toLowerCase().replace(/\s+/g, ''))
                );
        },
    },
    components:{
        Combobox,
        ComboboxInput,
        ComboboxButton,
        ComboboxOptions,
        ComboboxOption,
        TransitionRoot,
    },
}
</script>