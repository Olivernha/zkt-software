<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0"
    >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-gray-800 text-xl font-bold">{{ title }}</h6>
            </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form @submit.prevent="submitExpense"
                  class="mt-4"
            >
                <div class="flex flex-wrap">
                    <AppControlInput
                        :control-type="textarea"
                        v-model.trim="form.details"
                        placeholder="Enter Details"
                        @blur="error.details=''"
                        :error="error.details"
                    >Details
                    </AppControlInput>
                    <AppControlInput
                        type="number"
                        v-model.trim="form.amount"
                        placeholder="Enter Amount"
                        @blur="error.amount=''"
                        :error="error.amount"
                    >Amount
                    </AppControlInput>
                    <AppControlInput
                        type="date"
                        v-model.trim="form.expense_date"
                        placeholder="Enter Expense Date"
                        @blur="error.expense_date=''"
                        :error="error.expense_date"
                    > Expense Date
                    </AppControlInput>
                </div>
                <div class="flex justify-center">
                    <inertia-link :href="route('expense.index')"
                                  class="bg-white text-gray-500  active:bg-green-600 font-bold uppercase text-xs px-6 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                  type="submit"
                    >
                        Cancel
                    </inertia-link>
                    <button
                        class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-6 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                        type="submit"
                    >
                        Submit
                    </button>
                </div>
                <hr class="mt-6 border-b-1 border-gray-400"/>
            </form>
        </div>
    </div>
</template>

<script>
import AppControlInput from "@/Pages/components/stock/layouts/components/AppControlInput";
import formProps from "@/Pages/components/stock/mixins/formProps";

export default {
    name: "expenseform",
    components: {
        AppControlInput
    },
    mixins: [formProps],
    data() {
        return {
            form: {
                details: this.data ? this.data.details : '',
                amount: this.data ? this.data.amount : '',
                expense_date: this.data ? this.data.expense_date : ''
            },
            error:{
                details:'',
                amount:'',
                expense_date:''
            }
        }
    },
    methods:{
        submitExpense(){
            Object.keys(this.error).forEach(f=>{
                this.error[f] = '';
            })
            if (!this.form.details || !this.form.amount || !this.form.expense_date) {
                if (!this.form.details) {
                    this.error.details = 'The field is required';
                }
                if (!this.form.amount) {
                    this.error.amount = 'The field is required';

                }
                if (!this.form.expense_date) {
                    this.error.expense_date = 'The field is required';
                }
            }
            else{
               this.$emit('submit',this.form);
            }
        }
    }
}
</script>

<style scoped>

</style>
