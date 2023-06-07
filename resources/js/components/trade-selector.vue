<template>
    <div class="relative w-full">
        <Combobox v-model="selectedTrades" name="trades" multiple>
            <div class="relative overflow-visible">
                <ul class="flex flex-row flex-wrap space-x-2 justify-items-start items-start rounded-t px-3 py-2 bg-gray-100" v-if="selectedTrades.length > 0">
                    <li class="text-xs px-2 my-1 text-center text-white leading-5 font-semibold rounded-full bg-primary-600" v-for="trade in selectedTrades" :key="trade.id">
                        <div class="flex justify-start py-0.5 px-0.5 items-center">
                            {{ trade.name }}
                            <div @click="deSelectTrade(trade)" class="ml-1 text-white hover:text-red-500">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </div>
                        </div>
                    </li>
                </ul>
                <!---Input & Button--->
                <div class="relative border border-gray-600 w-full cursor-default overflow-hidden text-left 
                    shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-white 
                    focus-visible:ring-opacity-75 focus-visible:ring-offset-2 
                    focus-visible:ring-offset-gray-300 sm:text-sm">
                    <ComboboxInput class="w-full border-none bg-gray-300 py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
                        :displayValue="(trade) => trade.name"
                        @change="query = $event.target.value"/>
                    <ComboboxButton class="absolute inset-y-0 right-0 flex items-center pr-2">                        
                        <!---SelectorIcon---->
                        <div class="text-primary-600 hover:text-primary-300" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </ComboboxButton>
                </div>
                <!---Options--->
                <TransitionRoot leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                    @after-leave="query = ''">
                    <ComboboxOptions class="absolute mt-1.5 mb-2 max-h-80 z-10 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <div v-if="filteredTrades.length === 0 && query !== ''"
                            class="relative cursor-default select-none py-2 px-4 text-gray-700">
                            No trades found.
                        </div>

                        <ComboboxOption
                            v-for="trade in filteredTrades"
                            as="template"
                            :key="trade.id"
                            :value="trade"
                            v-slot="{ selected, active }">
                                <li class="relative cursor-default select-none py-2 pl-10 pr-4"
                                    :class="{ 'bg-primary-500 text-white': active, 'text-gray-900': !active,}">
                                    <span class="block truncate"
                                        :class="{ 'font-semibold': selected, 'font-normal': !selected }">
                                        {{ trade.name }}
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
            selectedTrades: ref([]),          
        }
    },
    props: {
        trades: Array,
        myTrades: Array,
    },
    methods:{
        deSelectTrade(trade){
            if (this.selectedTrades.length > 0 &&
                this.selectedTrades.indexOf(trade) >= 0){
                // remove trade
                this.selectedTrades = this.selectedTrades.filter(function (val) {
                        return val.name !== trade.name;
                    });
            }
        }
    },
    mounted(){
        if(this.myTrades !== undefined && this.myTrades.length > 0){
            for(let i=0; i<this.myTrades.length; i++){
                //lets deal with this.trades only
                for(let j=0; j<this.trades.length; j++){
                    if(this.myTrades[i].name === this.trades[j].name){
                        this.selectedTrades.push(this.trades[j]);
                    }
                }
            }
        }
    },
    computed: {
        filteredTrades (){            
            return this.query === '' ? this.trades
                : this.trades.filter((trade) =>
                    trade.name
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