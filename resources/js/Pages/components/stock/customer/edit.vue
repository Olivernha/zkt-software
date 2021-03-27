<template>
    <Master>
        <template #default>
            <customerform title="Edit Customer" :data="form" @submit="submitForm"></customerform>
        </template>
    </Master>

</template>

<script>
import customerform from "@/Pages/components/stock/customer/components/customerform";
export default {
    name: "edit",
    components:{
        customerform
    },
    data(){
        return {
            form: {
                name: this.$page.props.customer.name ,
                email:this.$page.props.customer.email ,
                phone:this.$page.props.customer.phone ,
                address: this.$page.props.customer.address,
                photo: this.$page.props.customer.photo
            },
        }
    },
    methods: {
        submitForm(v){
            this.$store.dispatch('stock/update', {
                id: this.$page.props.customer.id,
                data: v,
                type: 'customer'
            });
        }
    }
}
</script>

<style scoped>

</style>
