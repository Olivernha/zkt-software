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
                    <form
                        class="mt-4"
                        @submit.prevent="submitProduct"
                        enctype="multipart/form-data"
                    >
                        <div class="flex flex-wrap">
                            <AppControlInput
                                @blur="error.name =''"
                                placeholder="Enter Product Name"
                                v-model="form.name"
                                :error="error.name"
                            >
                                Product Name
                            </AppControlInput>
                            <AppControlInput
                                placeholder="Enter Code"
                                v-model="form.code"
                            >
                                Product Code
                            </AppControlInput>
<!--                            <div class="w-full lg:w-6/12 px-4">-->
<!--                                <div class="relative w-full mb-3">-->
<!--                                    <label-->
<!--                                        class="block uppercase text-gray-700 text-xs font-bold mb-2"-->

<!--                                    >-->
<!--                                        Product Category-->
<!--                                    </label>-->
<!--                                    <select-->
<!--                                        :class="{ 'border-2 border-red-500': error.category}"-->
<!--                                        v-model="form.category"-->
<!--                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">-->

<!--                                        <option :value="c.id" v-for="c in $page.props.categories" :key="c.id">-->
<!--                                            {{ c.category_name }}-->
<!--                                        </option>-->
<!--                                    </select>-->
<!--                                    <p-->
<!--                                        v-if="error.category"-->
<!--                                        class="p-2 text-red text-xs text-red-500 italic"-->
<!--                                    >-->
<!--                                        {{ error.category }}-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="w-full lg:w-6/12 px-4">-->
<!--                                <div class="relative w-full mb-3">-->
<!--                                    <label-->
<!--                                        class="block uppercase text-gray-700 text-xs font-bold mb-2"-->

<!--                                    >-->
<!--                                        Product Supplier-->
<!--                                    </label>-->
<!--                                    <select-->
<!--                                        :class="{ 'border-2 border-red-500': error.supplier }"-->
<!--                                        v-model="form.supplier"-->
<!--                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">-->
<!--                                        <option :value="s.id" v-for="s in $page.props.suppliers" :key="s.id">-->
<!--                                            {{ s.company }}-->
<!--                                        </option>-->
<!--                                    </select>-->
<!--                                    <p-->
<!--                                        v-if="error.supplier"-->
<!--                                        class="p-2 text-red text-xs text-red-500 italic"-->
<!--                                    >-->
<!--                                        {{ error.supplier }}-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->

                            <AppControlInput
                                :control-type="'selectionCategory'"
                                @blur="error.category =''"
                                placeholder="Enter Category"
                                v-model="form.category"
                                :error="error.category"
                                :select-option="$page.props.categories"
                            >
                                Product Category
                            </AppControlInput>
                            <AppControlInput
                                :control-type="'selection'"
                                @blur="error.supplier=''"
                                placeholder="Enter Supplier"
                                v-model="form.supplier"
                                :error="error.supplier"
                                :select-option="$page.props.suppliers"
                            >
                                Product Supplier
                            </AppControlInput>
                            <AppControlInput
                                type="number"
                                @blur="error.buying_price =''"
                                placeholder="Enter Buying Price"
                                v-model="form.buying_price"
                                :error="error.buying_price"
                            >
                                Buying Price
                            </AppControlInput>
                            <AppControlInput
                                type="number"
                                @blur="error.selling_price =''"
                                placeholder="Enter Selling Price"
                                v-model="form.selling_price"
                                :error="error.selling_price"
                            >
                                Selling Price
                            </AppControlInput>
                            <AppControlInput
                                type="date"
                                @blur="error.date =''"
                                placeholder="Enter Buying Date"
                                v-model="form.date"
                                :error="error.date"
                            >
                                Buying Date
                            </AppControlInput>
                            <AppControlInput
                                type="number"
                                @blur="error.quantity =''"
                                placeholder="Enter Product Quantity"
                                v-model="form.quantity"
                                :error="error.quantity"
                            >
                                Product Quantity
                            </AppControlInput>
                            <AppControlInput
                                :control-type="'file'"

                                @change="onFileSelected"
                            >
                                Photo
                            </AppControlInput>
                        </div>
                        <div class="flex justify-center">
                            <inertia-link :href="route('product.index')"
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
    name: "productform",
    emits:['submit'],
    components: {
        AppControlInput
    },
    mixins: [formProps],

    data() {
        return {
            form: {
                name: this.data ? this.data.name : '',
                code: this.data ? this.data.code : '',
                category: this.data ? this.data.category : '',
                supplier: this.data ? this.data.supplier : '',
                buying_price: this.data ? this.data.buying_price : '',
                selling_price:this.data ?  this.data.selling_price : '',
                date: this.data ? this.data.date : '',
                quantity: this.data ? this.data.quantity : '',
                image: this.data ? this.data.image : '',
                newimage: ''
            },
            error: {
                name: '',
                category: '',
                supplier: '',
                buying_price: '',
                selling_price: '',
                date: '',
                quantity: '',
            }
        }
    },
    methods:{
        onFileSelected(event) {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onload = (event) => {
                if(this.form.image){
                    this.form.newimage = event.target.result;
                }else{
                    this.form.image = event.target.result;
                }
                console.log(event.target.result);
            };
            reader.readAsDataURL(file);
        },
        submitProduct(){
            Object.keys(this.error).forEach(f=>{
                this.error[f] = '';
            });
            if (!this.form.name || !this.form.category || !this.form.quantity || !this.form.buying_price || !this.form.date ||
                !this.form.selling_price || !this.form.supplier) {
                if (!this.form.buying_price) {
                    this.error.buying_price = 'The field is required';
                }
                if (!this.form.date) {
                    this.error.date = 'The field is required';

                }
                if (!this.form.quantity) {
                    this.error.quantity = 'The field is required';

                }

                if (!this.form.name) {
                    this.error.name = 'The field is required';

                }
                if (!this.form.supplier) {
                    this.error.supplier = 'The field is required';
                }
                if (!this.form.selling_price) {
                    this.error.selling_price = 'The field is required';

                }
                if (!this.form.category) {
                    this.error.category = 'The field is required';
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
