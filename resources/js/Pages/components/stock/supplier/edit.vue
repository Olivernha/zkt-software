<template>
  <Master>
    <template #default>
      <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0"
      >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
          <div class="text-center flex justify-between">
            <h6 class="text-gray-800 text-xl font-bold">Add Supplier</h6>
          </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
          <!-- <p v-if="errors" v-for="e in errors" :key="e">{{ e }}</p> -->
          <form
            class="mt-4"
            @submit.prevent="supplierUpdate"
            enctype="multipart/form-data"
          >
            <div class="flex flex-wrap">
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Username
                  </label>
                  <input
                    type="text"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    placeholder="Enter Your Full Name"
                    v-model="form.name"
                  />
                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Email
                  </label>
                  <input
                    type="email"
                    v-model="form.email"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    placeholder="Enter Your Email"
                  />
                  <p
                    v-if="errors.email"
                    class="p-2 text-red text-xs text-red-500 italic"
                  >
                    {{ errors.email }}
                  </p>
                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Address
                  </label>
                  <input
                    type="text"
                    v-model="form.address"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    placeholder="Enter Your Address"
                  />
                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Company & Shop
                  </label>
                  <input
                    type="text"
                    v-model="form.company"
                    :class="{ 'border-2 border-red-500 ': errors.company }"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    placeholder="Enter Your Company Name"
                  />
                  <p
                    v-if="!form.company"
                    class="p-2 text-red text-xs text-red-500 italic"
                  >
                    {{ errors.company }}
                  </p>
                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Phone
                  </label>
                  <input
                    type="number"
                    v-model="form.phone"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    placeholder="Enter Your Phone Number"
                  />
                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Photo
                  </label>
                  <div class="flex items-center justify-between">
                    <input
                      @change="onFileSelected"
                      type="file"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="flex justify-center">
              <button
                class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-6 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                type="submit"
              >
                Submit
              </button>
            </div>
            <hr class="mt-6 border-b-1 border-gray-400" />
          </form>
        </div>
      </div>
    </template>
  </Master>
</template>

<script>

export default {
  name: "edit",

  props: ["supplier"],
  data() {
    return {
      form: {
        name: this.supplier.name,
        email: this.supplier.email,
        phone: this.supplier.phone,
        company: this.supplier.company,
        address: this.supplier.address,
        photo: this.supplier.photo,
        newphoto: "",
      },
      errors: {
        company: "",
        email: "",
      },
    };
  },
  methods: {
    onFileSelected(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = (event) => {
        this.form.newphoto = event.target.result;
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
    },
    supplierUpdate() {
      this.errors.company = "";
      this.errors.email = "";
      if (!this.form.company) {
        this.errors.company = "Company is required";
      } else if (this.form.email && !this.form.email.includes(".com")) {
        this.errors.email = "Email is invalid";
      } else {
        this.$inertia
          .put(`/supplier/${this.supplier.id}`, this.form)
          .then(() => {
            Toast.fire({
              icon: "success",
              title: "Updated successfully",
            });
          });
      }
    },
  },
};
</script>

<style scoped>
</style>
