<template>
    <Master>
        <template #default>
            <productform title="Edit Product" @submit="submitForm" :data="form"></productform>
        </template>
    </Master>
</template>

<script>
import productform from "@/Pages/components/stock/product/components/productform";
export default {
    name: "edit",
    components:{
      productform
    },
    data() {
        return {
            form: {
                name: this.$page.props.product.product_name,
                code: this.$page.props.product.product_code,
                category: this.$page.props.product.category_id,
                supplier: this.$page.props.product.supplier_id,
                buying_price: this.$page.props.product.buying_price,
                selling_price: this.$page.props.product.selling_price,
                date: this.$page.props.product.buying_date,
                quantity: this.$page.props.product.product_quantity,
                image: this.$page.props.product.image,
            },
        }
    },
    methods: {
        submitForm(v){
            this.$store.dispatch('stock/update', {
                id: this.$page.props.product.id,
                data: v,
                type: 'product'
            });
        }
    }
}
</script>

<style scoped>

</style>
