<template>

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
    }
}
</script>

<style scoped>

</style>
