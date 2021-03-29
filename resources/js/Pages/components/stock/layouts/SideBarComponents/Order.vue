<template>
    <Tab :drops="order">
        <i class="fas fa-shopping-bag mr-2"></i>
        <span class="text-gray-700">Orders</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";
export default {
    name: "Orders",
    components:{
      Tab
    },
    data(){
        return{
            order:[
                {
                    name:'Today Order',
                    href: route('stock.order')
                },
                {
                    name:'Search',
                    href:route('searchOrder.index')
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>
