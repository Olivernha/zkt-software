<template>
  <Master>
      <template #stat>
         <div class="flex justify-start ml-3 items-center flex-row">
                <inertia-link :href="route('stock.order')" class="px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white  leading-tight">
                    Today Order
                </inertia-link>
         </div>
      </template>
      <template #default>
        <div class="relative bg-gray-300 px-5 py-3 contaner mx-auto border-2 shadow rounded">
            <div>
                <p class="text-center font-bold text-2xl ">Search Order</p>
            </div>
            <div>

            </div>
            <div>

            </div>
        </div>
      </template>
  </Master>
</template>
<script>

export default {

};
</script>
