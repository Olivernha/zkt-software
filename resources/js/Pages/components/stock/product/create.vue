<template>
    <Master>
        <template #default>
            <productform title="Add Product" @submit="submitForm"></productform>
        </template>
    </Master>
</template>

<script>
import productform from "@/Pages/components/stock/product/components/productform";

export default {
    name: "create",
    components: {
        productform
    },


    methods: {
        submitForm(v) {
            console.log(v);
                this.$store.dispatch('stock/add', {
                    data: v,
                    type: 'product'
                });
            }

        }

}
</script>

<style scoped>

</style>
