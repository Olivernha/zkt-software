<template>
    <Master>
        <template #default>
            <customerform title="Add Customer" @submit="submitForm"></customerform>
        </template>
    </Master>
</template>

<script>
import customerform from "@/Pages/components/stock/customer/components/customerform";
export default {
    name: "create",
    components:{
        customerform
    },
    methods: {
        submitForm(v) {
            this.$store.dispatch('stock/add', {
                data: v,
                type: 'customer'
            });
        }

    }
}
</script>

<style scoped>

</style>
