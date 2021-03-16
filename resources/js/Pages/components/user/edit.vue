<template>
<Master>
    <template #default>
        <div class="flex justify-center ">
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-2 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form class="">
                    <nav class="flex items-center justify-between flex-wrap bg-blue-500 p-4 text-3xl">
                        <h2 class="text-2xl font-bold leading-7  text-white sm:text-3xl sm:leading-9 sm:truncate">
                            Edit User
                        </h2>
                    </nav>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-6 sm:pb-4">
<!--                        <div v-show="errors.length"  class="my-2 border border-red-400 rounded bg-red-100 px-4 py-2 text-red-700">-->
<!--                            <ul>-->
<!--                                <li v-for="error in errors" :key="error.id">&bull; &nbsp;{{error}}</li>-->
<!--                            </ul>-->
<!--                        </div>-->
                        <div class="">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2"> Name  :</label>
                                <input v-model="form.name"  id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  placeholder="Enter Title" >
<!--                                <span v-show="errors.length" class="text-red-500"></span>-->
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Role :</label>
                                <div class="inline-block relative w-64">
                                    <select v-model="form.role_name" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" >
                                        <option :value="user.role_id" disabled selected>{{user.role.name}}</option>
                                        <option :value="role.id" v-for="role in $page.props.allrole" :key="role.id">{{role.name}}</option>
                                    </select>
<!--                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">-->
<!--                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>-->
<!--                                    </div>-->
                                </div>
                                <!--                                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror-->
                            </div>
                            <div class="mb-4">
                                <label  class="block text-gray-700 text-sm font-bold mb-2">Email  :</label>
                                <input v-model="form.email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  placeholder="Enter Email" >

                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
<button @click="saveUser(editUser.slug)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
Save
</button>
</span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
<inertia-link href="/stock/users" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
Cancel
</inertia-link>
</span>
                    </div>
                </form>
            </div>
        </div>
    </template>
</Master>
</template>

<script>
export default {
name: "edit",
    props:['user'],
    data(){
        return{
           form:{
               name:this.user.name,
               role_name:this.user.role_id,
               email:this.user.email,
               password:this.user.password,
           }

        }
    }
}
</script>

<style scoped>

</style>
