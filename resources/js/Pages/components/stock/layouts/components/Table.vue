<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full bg-white mb-6 shadow-lg rounded"

    >
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3
                        class="font-semibold text-lg text-gray-800"

                    >
                        {{ title }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                <tr>
                    <th v-for="h in header" :key="h"
                        class="px-6 bg-gray-100 text-gray-600 border-gray-200 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                        {{ h }}
                    </th>

                </tr>
                </thead>
                <tbody>
               <slot></slot>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
// import TableDropdown from "@/components/Dropdowns/TableDropdown.vue";


export default {
    name: "Table",
    data() {
        return {};
    },

    components: {
        // TableDropdown,
    },
    props: {

        title: {
            required: false,
            type: String
        },
        header: {
            required: false,
            type: Array
        }

    },
};
</script>
