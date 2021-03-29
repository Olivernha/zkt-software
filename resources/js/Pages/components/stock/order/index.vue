<template>
<Master>
    <template #stat>
        <div class="flex flex-row justify-between items-center">
            <div class="flex text-gray-700">
                <pagination :links="$page.props.order.links"
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
                    {{ s.name }}
                </th>

                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.total }} Ks
                </td>

                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.pay }}
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.due }}
                </td>

                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.payby }}
                </td>
                <td
                    class="border-t-0 flex align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap px-2 py-4"
                >
                    <inertia-link
                        :href="route('order.details', s.id)"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full mr-1"
                    >
                       View
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
    mixins: [filterMixin('order')],
    data() {
        return {
            title: "All Stocks",
            header: [
                "No",
                "Name",
                "Total Amount",
                "Pay",
                "Due",
                "Pay By",
                "action",
            ]
        }
    },
}
</script>

<style scoped>

</style>
