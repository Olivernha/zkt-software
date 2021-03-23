<template>
    <Tab :drops="category">
        <i class="fas fa-list mr-2"></i>
        <span class="text-gray-700">Category</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";

export default {
    name: "Category",
    components: {
        Tab
    },
    data() {
        return {
            category: [
                {
                    name: 'Add Category',
                    href: route('category.create')
                },
                {
                    name: 'All Category',
                    href: route('category.index')
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
