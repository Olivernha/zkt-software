<template>
    <Tab :drops="supplier">
        <i class="fas fa-building mr-2"></i>
        <span class="text-gray-700">Suppliers</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";
export default {
    name: "Supplier",
    components:{
      Tab
    },
    data(){
        return{
           supplier:[
                {
                    name:'Add Supplier',
                    href: route('supplier.create')
                },
                {
                    name:'All Supplier',
                    href: route('supplier.index')
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>
