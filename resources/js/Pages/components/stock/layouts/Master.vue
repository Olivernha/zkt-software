<template>
    <div >
        <sidebar/>
        <div class="relative md:ml-64 ">
            <admin-navbar/>
            <div class="relative bg-green-600 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <slot name="stat"></slot>
                </div>
            </div>
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <slot></slot>
                <footer-admin/>
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
