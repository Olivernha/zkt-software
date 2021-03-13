<template>
<Master>
    <template #stat>
        <div class="flex flex-row justify-between items-center ">
            <div class="flex text-gray-700">
                <div class="h-8 w-8 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
                <div class="flex h-8 font-medium rounded-full bg-gray-200">
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">1</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">...</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">3</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full bg-pink-600 text-white ">4</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">5</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">...</div>
                    <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">15</div>
                    <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-pink-600 text-white">4</div>
                </div>
                <div class="h-8 w-8 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </div>
            <div class="flex relative flex-wrap items-stretch">
                <span class="z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" placeholder="Search here..." class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10">
            </div>
        </div>
    </template>
  <Table :title="title"  :header="header" >
      <tr v-for="s in $page.props.suppliers" :key="s.id" >
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              {{ s.id }}
          </td>
          <th
              class="border-t-0 px-6 text-left border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              {{ s.company }}
          </th>
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              {{ s.phone }}
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
                {{ s.email }}
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              <div class="flex">
                  <img
                      :src="'storage/'+s.photo"
                      alt="..."
                      class="w-10 h-10 rounded-full border-2 border-gray-100 shadow"
                  />
              </div>
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              {{ s.created_at }}
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
          >
              <inertia-link :href="route('supplier.edit',s.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full mr-1">
                  Edit
              </inertia-link>
              <inertia-link  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-full">
                Delete
              </inertia-link>
          </td>
      </tr>
  </Table>
</Master>
</template>

<script>
import Master from "@/Pages/components/stock/layouts/Master";
import Table from "@/Pages/components/stock/layouts/components/Table";
export default {
    name: "index",
    data(){
        return{
            title:"Add Suppliers",
            header:['No','company','phone','email','photo','joined_at','action'],

        }
    },
    components:{
        Master,Table,
    }
}
</script>

<style scoped>

</style>
