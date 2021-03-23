<template>
<Master>
    <template #stat>
      <header-stats></header-stats>
    </template>
    <template #default>
        <div class="flex flex-wrap mt-4">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                <out-of-stock />
            </div>

        </div>
    </template>

</Master>
</template>

<script>
import Master from "@/Pages/components/stock/layouts/Master";
import OutOfStock from "@/Pages/components/stock/layouts/components/OutOfStock";
import HeaderStats from "@/Pages/components/stock/layouts/components/HeaderStats";
export default {
    name: "index",
    components:{
        Master,OutOfStock,HeaderStats
    }
}
</script>

<style scoped>

</style>
