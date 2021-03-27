<template>
    <button @click="load = !load"
            class="w-full flex justify-between focus:outline-none items-center text-blue-400 h-10 pl-1 hover:bg-gray-200 rounded-lg cursor-pointer">
                <span class="flex items-center">
             <slot></slot>

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
        <div v-if="load">

            <inertia-link v-for="d in drops" :key="d"
                          :href="d.href"
                          class="py-3 flex justify-center items-center text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
            >
                <i class="fas fa-chevron-circle-right mr-2"></i>
                {{ d.name }}
            </inertia-link>


        </div>
    </transition>
</template>

<script>
export default {
    name: "Tab",
    data() {
        return {
            load: false
        }
    },
    props: ['drops']
}
</script>

<style scoped>
.slide-enter-from, .slide-leave-to {
    opacity: 0;
}

.slide-enter-active {
    transition: all 0.3s ease-in;
}

.slide-leave-active {
    transition: all 0.3s ease-out;
}

.slide-enter-to, .slide-leave-from {
    opacity: 1;
}
</style>
