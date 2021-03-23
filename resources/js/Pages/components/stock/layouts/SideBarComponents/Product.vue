<template>
    <Tab :drops="product">
        <i class="fab fa-product-hunt mr-2"></i>
        <span class="text-gray-700">Products</span>
    </Tab>
</template>

<script>
import Tab from "@/Pages/components/stock/layouts/SideBarComponents/Tab";
export default {
    name: "Product",
    components:{
      Tab
    },
    data(){
        return{
            product:[
                {
                    name:'Add Product',
                    href: route('product.create')
                },
                {
                    name:'All Product',
                    href: route('product.index')
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>
