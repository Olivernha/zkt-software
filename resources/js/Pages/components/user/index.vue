<template>
    <Master>
        <template #default>
            <div class="relative  mx-auto w-full">
                <div class="flex flex-wrap -mt-36">
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div
                            class=" flex items-center p-6"
                        >
                            <div class="text-white">
                                <p class="font-semibold text-3xl"> Users</p>

                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div
                            class="text-blue-400 flex items-center p-6  xl:mb-0"
                        >
                            <Pagination :links="$page.props.users.links"></Pagination>
                        </div>
                    </div>

                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div
                            class="text-blue-400 flex items-center p-6  xl:mb-0"
                        >
                            <SearchBox @search-list="search"></SearchBox>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto border-b border-gray-200 rounded-lg">
                    <table class="w-full text-md bg-gray-200  ">
                        <tbody>
                        <tr class="border-b">

                            <th class="text-left p-3 px-5">No</th>
                            <th class="text-left p-3 px-5">Name</th>
                            <th class="text-left p-3 px-5">Email</th>
                            <th v-show="$page.props.role === 'admin'"  class="text-left p-3 px-5">Role</th>
                            <th class="text-left p-3 px-5">Date</th>
                            <th v-show="$page.props.role === 'admin'" class="text-left p-3 px-5">Action</th>

                        </tr>
                        <!--                    <tr class="border-b hover:bg-orange-100 bg-gray-100">-->
                        <tr v-for="(user,index) in filterList" :key="user.id">
                            <td class="p-3 px-5" >{{user.id}}</td>
                            <td class="p-3 px-5" >{{user.name}}</td>
                            <td class="p-3 px-5" >{{user.email}}</td>
                            <td v-show="$page.props.role === 'admin'"  class="p-3 px-5" >{{user.role.name}}</td>
                            <td class="p-3 px-5" >{{user.created_at }}</td>

                            <td  v-if="$page.props.role === 'admin' && $page.props.role !== user.role.name ">
                                <inertia-link :href="route('user.edit',user.id)" class="w-20 text-center inline-block text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Edit</inertia-link>
                                <button class="inline-block mt-2 lg:mt-0 w-20 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Delete</button>
                            </td>
                            <td v-else-if=" $page.props.role === user.role.name">
                                <inertia-link :href="route('profile.show')" class="inline-block w-30 mx-2 lg:mx-0 text-center text-sm  bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Your Account</inertia-link>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </template>

    </Master>
</template>

<script>
import Pagination from "@/Pages/components/stock/layouts/components/Pagination";
import SearchBox from "@/Pages/components/stock/layouts/components/SearchBox";
export default {
    name: "index",
    components:{
      Pagination,SearchBox
    },

    data() {
        return {
            searchList: '',
        }
    },
    methods:{
        search(v){
            this.searchList=v
        }
    },
    computed:{
        filterList() {
            return this.$page.props.users.data.filter((data) => {
                const role = data.role.name.toLowerCase();
                const joined_at = data.created_at.toString().toLowerCase();
                const name =  data.name.toLowerCase() ;
                const email = data.email.toLowerCase() ;
                const searchTerm = this.searchList ? this.searchList.toLowerCase() :'';


                return (role.includes(searchTerm) ||
                    joined_at.includes(searchTerm) ||
                    name.includes(searchTerm) ||
                    email.includes(searchTerm)

                );
            });
        },
    }

}
</script>

<style scoped>

</style>
