<template>
    <Tab :drops="expense">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <span class="text-gray-700">Expense</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";
export default {
    name: "Expense",
    components:{
      Tab
    },
    data(){
        return{
           expense:[
                {
                    name:'Add Expense',
                    href: route('expense.create')
                },
                {
                    name:'All Expense',
                    href: route('expense.index')
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>
