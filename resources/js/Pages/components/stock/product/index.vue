<template>
    <Master>
        <template #stat>
            <div class="flex flex-row justify-between items-center">
                <div class="flex text-gray-700">

                    <pagination :links="$page.props.product.links"
                    ></pagination>

                </div>

                <SearchBox @search-list="search"></SearchBox>
            </div>
        </template>
        <template #default>
            <Table  :title="title" :header="header">
                <tr v-for="(s,i) in filterList" :key="i">
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ i + 1 }}
                    </td>
                    <th
                        class="border-t-0 px-6 text-left border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.product_name }}
                    </th>

                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.product_code }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        <div class="flex">
                            <img
                                :src="s.image" :class="{ hidden : !s.image}"
                                alt="..."
                                class="w-10 h-10 rounded-full border-2 border-gray-100 shadow"
                            />
                        </div>
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.category_name }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.buying_price }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.selling_price }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.buying_date }}
                    </td>
                    <td
                        class="border-t-0 flex align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap px-2 py-4"
                    >
                        <inertia-link
                            :href="route('product.edit', s.id)"
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
    components:{
        Table,Pagination,SearchBox
    },

    mixins:[filterMixin('product')],
    data() {
        return {
            title: "All Products",
            header: [
                "No",
                "Name",
                "Code",
                "Photo",
                "Category",
                "Buying Price",
                "Selling Price",
                "Buying Date",
                "action",
            ]
        }
    },
    methods:{
        deleteItem(id){
            this.$store.dispatch('stock/delete',{
                id:id,
                type:'product'
            })

        }
    }

}
</script>

<style scoped>

</style>
