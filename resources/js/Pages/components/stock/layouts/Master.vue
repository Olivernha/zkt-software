<template>
    <div>
        <sidebar />
        <div class="relative md:ml-64 bg-gray-200">
            <admin-navbar />
            <header-stats />
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
               <slot></slot>
                <footer-admin />
            </div>

        </div>
    </div>
</template>
<script>
import AdminNavbar from "./AdminNavbar.vue";
import Sidebar from "./Sidebar.vue";
import HeaderStats from "./HeaderStats.vue";
import FooterAdmin from "./FooterAdmin.vue";
export default {
    name: "admin-layout",
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
};
</script>
