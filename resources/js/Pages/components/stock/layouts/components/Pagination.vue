<template>
    <div class="flex text-gray-700">
        <div v-if="previousUrl"
             class="h-8 w-8 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-chevron-left w-4 h-4">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </div>
        <div  class="flex h-8 font-medium rounded-full bg-gray-200">
            <a v-for="(q,i) in links" :key="q" :href="q.url" :class="{ 'bg-pink-600 text-white ' : q.active }"
                class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">
                <span v-if='q.label === previous'>
                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                           class="feather feather-chevron-left w-4 h-4">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
                </span>
                <span v-else-if='q.label === next'>
                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-chevron-right w-4 h-4">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
                </span>
                <span v-else>
                    {{ q.label }}
                </span>
            </a>
        </div>
        <div v-if="nextUrl"
             class="h-8 w-8 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-chevron-right w-4 h-4">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </div>


</template>

<script>
export default {
    name: "Pagination.vue",
    data(){
        return{
            previous : "&laquo; Previous",
            next:"Next &raquo;"
        }
    },

    props: ['links', 'previousUrl', 'nextUrl']
}
</script>

<style scoped>

</style>
