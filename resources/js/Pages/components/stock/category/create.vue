<template>
    <Master>
        <template #default>
            <categoryform title="Add Category" @submit="submitForm" />

        </template>
    </Master>

</template>

<script>
import categoryform from "@/Pages/components/stock/category/components/categoryform";
export default {
    name: "create",
    components:{
      categoryform
    },
    methods: {
        submitForm(e) {

            this.$store.dispatch('stock/add', {
                type: 'category',
                data: e.data,
            });
        }
    }
}
</script>

<style scoped>

</style>
