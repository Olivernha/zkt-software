<template>
    <Master>
        <template #stat>
            <div class="flex flex-row justify-between items-center">
                <div class="flex text-gray-700">

                    <pagination :links="$page.props.customer.links"
                    ></pagination>

                </div>

                <SearchBox @search-list="search"></SearchBox>
            </div>
        </template>
        <Table :title="title" :header="header">
            <tr v-for="s in filterList" :key="s.id">
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.id }}
                </td>
                <th
                    class="border-t-0 px-6 text-left border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    {{ s.name}}
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
                    {{ s.address }}
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    <div class="flex">
                        <img
                            :src="s.photo" :class="{ hidden : !s.photo}"
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
                    class="border-t-0 flex align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap px-2 py-4"
                >
                    <inertia-link
                        :href="route('customer.edit', s.id)"
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
    </Master>
</template>

<script>
import Table from "@/Pages/components/stock/layouts/components/Table";
import Pagination from "@/Pages/components/stock/layouts/components/Pagination";
import SearchBox from "@/Pages/components/stock/layouts/components/SearchBox";
import filterMixin from "@/Pages/components/stock/mixins/filterMixin";
export default {
name: "index",
    components: {
        Table,
        Pagination,SearchBox
    },
    mixins:[
        filterMixin('customer')
    ],
    data() {
        return {
            title: "All Customers",
            header: [
                "No",
                "Name",
                "Phone",
                "Email",
                'Address',
                "Photo",
                "created_at",
                "action"
            ],
        };
    },
    methods: {
        deleteItem(id) {
            this.$store.dispatch('stock/delete',{
                id: id,
                type:'customer'
            });
        },
    }

}
</script>

<style scoped>

</style>
