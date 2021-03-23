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
                @submit.prevent="submitSupplier"
                enctype="multipart/form-data"
            >
                <div class="flex flex-wrap">
                    <AppControlInput
                        type="text"
                        v-model="form.name"
                        placeholder="Enter Your Full Name"

                    >
                        Username
                    </AppControlInput>
                    <AppControlInput
                        type="email"
                        v-model="form.email"
                        placeholder="Enter Your Email"
                        :error="error.email"
                        @blur="error.email = ''"
                    >
                        Email
                    </AppControlInput>
                    <AppControlInput
                        type="text"
                        v-model="form.address"

                        placeholder="Enter Your Address"
                    >
                        Address
                    </AppControlInput>
                    <AppControlInput
                        type="text"
                        v-model="form.company"
                        @blur="error.company = ''"
                        placeholder="Enter Your Company Name"
                        :error="error.company"
                    >
                        Company & Shop
                    </AppControlInput>
                    <AppControlInput
                        type="number"
                        v-model="form.phone"
                        placeholder="Enter Your Phone Number"
                    >
                        Phone
                    </AppControlInput>
                    <AppControlInput
                        :control-type="'file'"

                        @change="onFileSelected"
                    >
                        Photo
                    </AppControlInput>
                </div>
                <div class="flex justify-center">
                    <inertia-link :href="route('supplier.index')"
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
    name: "supplierform",
    emits: ['submit'],
    components: {
        AppControlInput
    },
    mixins: [formProps],
    data() {
        return {
            form: {
                name: this.data ? this.data.name : '',
                email: this.data ? this.data.email : '',
                phone: this.data ? this.data.phone : '',
                address: this.data ? this.data.address : '',
                photo: this.data ? this.data.photo : '',
                company: this.data ? this.data.company : '',
                newphoto: ''
            },
            error: {
                company: '',
                email: '',
            }
        }
    },
    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onload = (event) => {
                if (this.form.photo) {
                    this.form.newphoto = event.target.result;
                } else {
                    this.form.photo = event.target.result;
                }
                console.log(event.target.result);
            };
            reader.readAsDataURL(file);
        },
        submitSupplier() {
            this.error.company = "";
            this.error.email = '';
            if (!this.form.company) {
                this.error.company = "Company is required";

            } else if (this.form.email && !this.form.email.includes(".com")) {
                this.error.email = "Email is invalid";

            } else {
                this.$emit('submit', this.form);
            }
        },
    }
}
</script>

<style scoped>

</style>
