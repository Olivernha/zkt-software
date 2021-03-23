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
            <form @submit.prevent="submitCategory"
                  class="mt-4"
            >
                <div class="flex flex-wrap">
                    <app-control-input
                        @blur="error.name=''"
                        type="text"
                        :error="error.name"
                        v-model="form.name"
                        placeholder="Enter Category Name">Name
                    </app-control-input>
                </div>
                <div class="flex justify-center">
                    <inertia-link :href="route('category.index')"
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
    name: "categoryform",
    components: {
        AppControlInput
    },

    mixins:[formProps],
    data() {
        return {
            form: {
                name: this.data ? this.data.name : ''
            },
            error: {
                name: ''
            }
        }
    },
    methods: {
        submitCategory() {
            this.error.name = '';
            if (!this.form.name) {
                this.error.name = 'Please fill the field';
                return;
            }
            this.$emit('submit', {
                data: this.form
            })
        }
    }
}
</script>

<style scoped>

</style>
