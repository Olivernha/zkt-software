<template>
    <Master>
        <template #default>
            <expenseform title="Edit Expense" @submit="submitForm" :data="form"></expenseform>
        </template>
    </Master>
</template>

<script>
import expenseform from "@/Pages/components/stock/expense/components/expenseform";

export default {
    name: "edit",
    components: {
        expenseform
    },
    data() {
        return {
            form: {
                details: this.$page.props.expense.details,
                amount: this.$page.props.expense.amount,
                expense_date: this.$page.props.expense.expense_date
            }
        }
    },
    methods: {
        submitForm(v) {
                this.$store.dispatch('stock/update', {
                    id: this.$page.props.expense.id,
                    data: v,
                    type: 'expense'
                });
        }
    }

}
</script>

<style scoped>

</style>
