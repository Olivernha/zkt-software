<template>
    <Master>
        <template #stat>

            <div class="flex flex-row justify-between items-center">
                <inertia-link :href="route('product.create')" class="px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white  leading-tight">
                    Add Product
                </inertia-link>
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
                        {{ s.selling_price }}
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        <span  class="h-6 text-xs text-white flex justify-center items-center rounded bg-red-500" v-if="s.product_quantity < 1">Stock Out</span>

                        <span class="h-6 text-xs text-white flex justify-center items-center rounded bg-green-500" v-else>Available</span>
                    </td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                        {{ s.product_quantity }}
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
                    </td>
                </tr>
            </Table>
        </template>
    </Master>
</template>

<script>
import filterMixin from "@/Pages/components/stock/mixins/filterMixin";
import Table from "@/Pages/components/stock/layouts/components/Table";
import Pagination from "@/Pages/components/stock/layouts/components/Pagination";
import SearchBox from "@/Pages/components/stock/layouts/components/SearchBox";

export default {
    name: "index",
    components: {
        Table, Pagination, SearchBox
    },

    mixins: [filterMixin('product')],
    data() {
        return {
            title: "All Stocks",
            header: [
                "No",
                "Name",
                "Code",
                "Photo",
                "Category",
                "Selling Price",
                "Status",
                "Quantity",
                "action",
            ]
        }
    },
}
</script>

<style scoped>

</style>
