<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <!-- Toggler -->
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <a
                class="flex justify-center"
                to="/"
            >
                <img src="/images/logo.jpg" class="h-16" alt="">
            </a>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <notification-dropdown/>
                </li>
                <li class="inline-block relative">
                    <user-dropdown/>
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-gray-300"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <a
                                class="md:block text-left md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-sm uppercase font-bold p-4 px-0"
                                to="/"
                            >
                                Vue Notus
                            </a>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-6 mb-4 md:hidden">
                    <div class="mb-3 pt-0">
                        <input
                            type="text"
                            placeholder="Search"
                            class="px-3 py-2 h-12 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                        />
                    </div>
                </form>


                <hr class="my-4 md:min-w-full"/>
                <div>
                    <inertia-link :href="route('stock.index')"
                        class="w-full flex justify-between focus:outline-none items-center text-blue-400 h-10 pl-1 hover:bg-gray-200 rounded-lg cursor-pointer">
                        <div class="flex items-center">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            <span class="text-gray-700">Dashboard</span>
                        </div>

                    </inertia-link>
                </div>
                <div>
                    <button
                        class="w-full flex justify-between focus:outline-none items-center text-blue-400 h-10 pl-1 hover:bg-gray-200 rounded-lg cursor-pointer">
                        <div class="flex items-center">
                            <i class="fas fa-cart-plus mr-2"></i>
                            <span class="text-gray-700">POS</span>
                        </div>

                    </button>

                </div>
                <Setting></Setting>
                <hr class="my-4 md:min-w-full"/>
                <h6
                    class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
                >
                    Features
                </h6>

                <Product></Product>
                <Supplier></Supplier>
                <Expense></Expense>
                <Customer></Customer>
                <Category></Category>
                <Order></Order>
                <Stock></Stock>

            </div>
        </div>
    </nav>
</template>
); }

<script>
import NotificationDropdown from "./NotificationDropdown.vue";
import UserDropdown from "./UserDropdown.vue";
import Setting from "@/Pages/components/stock/layouts/SideBarComponents/Setting";
import Category from "@/Pages/components/stock/layouts/SideBarComponents/Category";
import Customer from "@/Pages/components/stock/layouts/SideBarComponents/Customer";
import Expense from "@/Pages/components/stock/layouts/SideBarComponents/Expense";
import Order from "@/Pages/components/stock/layouts/SideBarComponents/Order";
import Product from "@/Pages/components/stock/layouts/SideBarComponents/Product";
import Stock from "@/Pages/components/stock/layouts/SideBarComponents/Stock";
import Supplier from "@/Pages/components/stock/layouts/SideBarComponents/Supplier";

export default {
    data() {
        return {
            collapseShow: "hidden",

        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        }
    },
    components: {
        NotificationDropdown,
        UserDropdown,
        Setting, Category, Customer, Expense, Order, Product, Stock, Supplier
    },
};
</script>
<style>

.slide-enter-from, .slide-leave-to {
    opacity: 0;
}

.slide-enter-active {
    transition: all 0.3s ease-in;
}
.slide-leave-active{
    transition: all 0.3s ease-in;
}
.slide-enter-to, .slide-leave-from {
    opacity: 1;
}
</style>
