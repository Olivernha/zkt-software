<template>
    <Master>
        <template #default>
            <expenseform title="Add Expense" @submit="submitForm" ></expenseform>
        </template>
    </Master>
</template>

<script>
import expenseform from "@/Pages/components/stock/expense/components/expenseform";
export default {
    name: "create",
  components:{
    expenseform
  },
    methods: {
        submitExpense(v) {
                this.$store.dispatch('stock/add', {
                    data: v,
                    type: 'expense'
                });
        }
    }
}
</script>

<style scoped>

</style>
