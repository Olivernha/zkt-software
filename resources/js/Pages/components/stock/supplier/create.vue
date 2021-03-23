<template>
    <Master>
        <template #default>
            <supplierform title="Add Supplier" @submit="submitForm"></supplierform>
        </template>
    </Master>
</template>

<script>

import supplierform from "@/Pages/components/stock/supplier/components/supplierform";

export default {
    name: "create",
    components: {
        supplierform
    },
    methods: {
        submitForm(v) {
            this.$store.dispatch('stock/add', {
                data: v,
                type: 'supplier'
            });
        }

    }
};
</script>

<style scoped>
</style>
