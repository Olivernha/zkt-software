<template>
    <inertia-link :href="route('stock.view')"
        class="w-full flex justify-between focus:outline-none items-center text-blue-400 h-10 pl-1 hover:bg-gray-200 rounded-lg cursor-pointer">
        <div class="flex items-center">
            <i class="fas fa-tachometer-alt mr-2"></i>
            <span class="text-gray-700">Stock</span>
        </div>
    </inertia-link>
</template>

<script>
export default {
    name: "Stock"
}
</script>

<style scoped>

</style>
