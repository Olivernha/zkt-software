<template>
    <Master>
        <template #default>
            <supplierform title="Edit Supplier" @submit="submitForm" :data="form"></supplierform>
        </template>
    </Master>
</template>

<script>
import supplierform from "@/Pages/components/stock/supplier/components/supplierform";

export default {
    name: "edit",
    components: {
        supplierform
    },


    data() {
        return {
            form: {
                name: this.$page.props.supplier.name,
                email: this.$page.props.supplier.email,
                phone: this.$page.props.supplier.phone,
                company: this.$page.props.supplier.company,
                address: this.$page.props.supplier.address,
                photo: this.$page.props.supplier.photo,
            }
        };
    },
    methods: {
        submitForm(v) {
            this.$store.dispatch('stock/update', {
                id: this.$page.props.supplier.id,
                data: v,
                type: 'supplier'
            });
        }
    },
};
</script>

<style scoped>
</style>
