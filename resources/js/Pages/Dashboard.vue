<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div     class="justify-center my-8 select-none flex">
                    <div v-if="$page.props.role === 'subscriber'" class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300">
                        <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-blue-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
                        </div>
                        <div class="alert-content ml-4">
                            <div class="alert-title font-semibold text-lg text-blue-800">
                                Welcome
                            </div>
                            <div class="alert-description text-sm text-blue-600">
                              Please contact an admin to activate your account !!
                            </div>
                        </div>
                    </div>


                    <div v-else>
                        <inertia-link :href="route('stock.index')"
                            class="py-3 px-6 md:mx-12 shadow-md no-underline rounded-full bg-blue-900 text-white font-sans font-semibold text-sm border-blue btn-primary hover:text-white hover:bg-blue-500 focus:outline-none active:shadow-none mr-2">
                            Stock
                        </inertia-link>
                        <a
                            class="py-3 px-6 md:mx-12  shadow-md no-underline rounded-full bg-green-900 text-white font-sans font-semibold text-sm border-greeen btn-primary hover:text-white hover:bg-green-500 focus:outline-none active:shadow-none mr-2">
                            HR
                        </a>
                        <a
                            class="py-3 px-6 md:mx-12  shadow-md no-underline rounded-full bg-red-900 text-white font-sans font-semibold text-sm border-red btn-primary hover:text-white hover:bg-red-500 focus:outline-none active:shadow-none">
                            Danger
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'

export default {
    components: {
        AppLayout,
        Welcome,
    }
}
</script>
