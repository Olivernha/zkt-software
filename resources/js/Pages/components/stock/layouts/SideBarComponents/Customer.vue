<template>
    <Tab :drops="customer">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <span class="text-gray-700">Customer</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";
export default {
name: "Customer",
    components:{
    Tab
    },
    data(){
        return{
           customer:[
                {
                    name:'Add Customer',
                    href: route('customer.create')
                },
                {
                    name:'All Customer',
                    href: route('customer.index')
                }
            ],
        }
    }

}
</script>

<style scoped>

</style>
