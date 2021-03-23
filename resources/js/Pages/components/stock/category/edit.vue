<template>
    <Master>
        <template #default>
            <categoryform title="Edit Category" @submit="submitForm" :data="form"></categoryform>
        </template>
    </Master>

</template>

<script>
import categoryform from "@/Pages/components/stock/category/components/categoryform";
export default {
    name: "edit",
    components:{
      categoryform
    },
    data(){
        return{
            form:{
                name:this.$page.props.category.category_name
            },
            error:{
                name:''
            }
        }
    },
    methods:{
        submitForm(e){
            this.$store.dispatch('stock/update',{
                id:this.$page.props.category.id,
                type:'category',
                data:e.data
            })
        }
    }

}
</script>

<style scoped>

</style>
