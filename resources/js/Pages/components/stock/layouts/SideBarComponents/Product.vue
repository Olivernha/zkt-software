<template>
    <button @click="load = !load"
            class="w-full flex justify-between focus:outline-none items-center text-blue-400 h-10 pl-1 hover:bg-gray-200 rounded-lg cursor-pointer">
                <span class="flex items-center">
               <i class="fas fa-cog mr-2"></i>
                <span class="text-gray-700">Products</span>

</span>
        <svg
            class="h-4 w-4"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                v-show="!load"
                d="M9 5L16 12L9 19"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                style="display: none"
            ></path>
            <path
                v-show="load"
                d="M19 9L12 16L5 9"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
        </svg>
    </button>
    <transition name="slide">
        <div v-if="load" >

            <a
                href="/stock/users"
                class="py-3 flex justify-center  text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
            >

               Add Product
            </a>

            <a
                href="/stock/categories"
                class="py-3 flex justify-center  text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
            >

                All Products
            </a>

        </div>
    </transition>
</template>

<script>
export default {
    name: "Product",
    data(){
        return{
            load:false
        }
    }
}
</script>

<style scoped>

</style>
