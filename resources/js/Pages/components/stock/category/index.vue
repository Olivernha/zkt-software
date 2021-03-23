<template>
<Master>
    <template #stat>
        <div class="flex flex-row justify-between items-center">
                <div class="flex text-gray-700">

                    <pagination :links="$page.props.category.links"
                               ></pagination>
                </div>
                <SearchBox @search-list="search"></SearchBox>
            </div>
    </template>
  <template #default>
      <Table  :title="title" :header="header">
          <tr v-for="s in filterList" :key="s.id">
              <td
                  class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
              >
                  {{ s.id }}
              </td>
              <th
                  class="border-t-0 px-6 text-left border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
              >
                  {{ s.category_name }}
              </th>

              <td
                  class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
              >
                  {{ s.created_at }}
              </td>
              <td
                  class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
              >
                  <inertia-link
                      :href="route('category.edit', s.id)"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full mr-1"
                  >
                      Edit
                  </inertia-link>
                  <button
                      @click.prevent="deleteItem(s.id)"
                      class="bg-red-500 mt-3 lg:mt-0 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-full"
                  >
                      Delete
                  </button>
              </td>
          </tr>
      </Table>
  </template>
</Master>
</template>

<script>
import Table from "@/Pages/components/stock/layouts/components/Table";
import Pagination from "@/Pages/components/stock/layouts/components/Pagination";
import SearchBox from "@/Pages/components/stock/layouts/components/SearchBox";
import  filterMixin  from '@/Pages/components/stock/mixins/filterMixin';
export default {
    name: "index",
    mixins:[
        filterMixin('category')
    ],
    components:{
        Table,Pagination,SearchBox
    },

    data(){
        return{
            title:"All Category",
            header: [
                "No",
                "Name",
                "created_at",
                "action",
            ]
        }
    },
    methods:{
        deleteItem(id){
            this.$store.dispatch('stock/delete',{
                id:id,
                type:'category'
            })

        }
    }
}
</script>

<style scoped>

</style>
