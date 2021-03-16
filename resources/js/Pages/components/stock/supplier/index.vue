<template>
    <Master>
        <template #stat>
            <div class="flex flex-row justify-between items-center">
                <div class="flex text-gray-700">

                    <pagination :links="suppliers.links"  :previousUrl="suppliers.prev_page_url"
                                :nextUrl="suppliers.next_page_url"></pagination>

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
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                >
                    <inertia-link
                        :href="route('supplier.edit', s.id)"
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
export default {
    name: "index",
    props: ["suppliers"],
    data() {
        return {
            searchList: "",
            title: "Add Suppliers",
            header: [
                "No",
                "company",
                "phone",
                "email",
                "photo",
                "joined_at",
                "action",
            ],
        };
    },
    methods: {
        search(v){
            this.searchList=v;
        },
        deleteItem(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.value) {
                    this.$inertia.delete("/supplier/" + id).then(() => {
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                    });
                }
            });
        },
    },
    components: {
        Table,
        Pagination,SearchBox
    },

    computed: {

        filterList() {
            return this.suppliers.data.filter((data) => {
                const company = data.company.toString();
                const address = data.address ? data.address.toString().toLowerCase() : '';
                const joined_at = data.created_at.toString().toLowerCase();
                const name = data.name ? data.name.toLowerCase() : '';
                const email = data.email ? data.email.toLowerCase() : '';
                const phone = data.phone ? data.phone.toString().toLowerCase() : '';
                const searchTerm = this.searchList.toLowerCase();


                return (company.includes(searchTerm) ||
                    address.includes(searchTerm) ||
                    joined_at.includes(searchTerm) ||
                    name.includes(searchTerm) ||
                    email.includes(searchTerm) ||
                    phone.includes(searchTerm)

                );
            });
        },
    },
};
</script>

<style scoped>
.hidden{
    display: none;
}
</style>
