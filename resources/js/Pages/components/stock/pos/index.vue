<template>
  <Master>
    <template #stat>
      <div class="flex items-center justify-between px-2 -mt-8">
        <p class="text-white text-2xl">POS Dashboard</p>
        <p class="text-white text-xs">
          <inertia-link class="lg:text-yellow-300" href="/dashboard"
            >Home
          </inertia-link>
          / POS
        </p>
      </div>
    </template>
    <template #default>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-2/5">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
          >
            <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-800">
                    Page visits
                  </h3>
                </div>
                <div
                  class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
                >
                  <button
                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button"
                  >
                    See all
                  </button>
                </div>
              </div>
            </div>
            <div class="block w-full overflow-x-auto">
              <!-- Projects table -->
              <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                  <tr>
                    <th
                      class="px-2 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                      Name
                    </th>
                    <th
                      class="px-2 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                      Qty
                    </th>
                    <th
                      class="px-2 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                      Unit
                    </th>
                    <th
                      class="px-2 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                      Total
                    </th>
                    <th
                      class="px-2 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                    >
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in cart" :key="item.id">
                    <th
                      class="border-t-0 px-2 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left"
                    >
                      {{ item.name }}
                    </th>
                    <td
                      class="border-t-0 px-2 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left"
                    >
                      {{ item.quantity }}
                    </td>
                    <td
                      class="border-t-0 px-2 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left"
                    >
                      {{ item.price }}
                    </td>
                    <td
                      class="border-t-0 px-2 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left"
                    >
                      {{ item.price * item.quantity }}
                    </td>
                    <td
                      class="flex flex-row border-t-0 justify-around px-2 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
                    >
                      <button
                        @click="increaseQuantity(item.id)"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"
                      >
                        +
                      </button>
                      <button
                        @click="decreaseQuantity(item.id)"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"
                      >
                        -
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="container mx-auto px-4">
                <div class="flex flex-wrap my-2">
                  <div
                    class="relative flex flex-col min-w-0 break-words border-2 bg-white w-full shadow-lg rounded-lg"
                  >
                    <div class="px-4 py-5 flex justify-between items-center">
                      <div class="text-gray-500">Total Quantity</div>
                      <p>{{ qty }}</p>
                    </div>
                    <div class="px-4 py-4 flex justify-between items-center">
                      <div class="text-gray-500">SubTotal</div>
                      <p>{{ subtotal }} Ks</p>
                    </div>
                    <div class="px-4 py-4 flex justify-between items-center">
                      <div class="text-gray-500">Tax</div>
                      <p>{{ tax }}%</p>
                    </div>
                    <div class="px-4 py-5 flex justify-between items-center">
                      <div class="text-gray-500">Total</div>
                      <p>{{ total }} $</p>
                    </div>
                  </div>
                </div>
                <div class="my-6 w-full">
                  <form @submit.prevent="order">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      >
                        Tax
                      </label>
                      <input
                        type="text"
                        v-model="tax"
                        class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                      />
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      >
                        Customer Name
                      </label>
                      <select
                        v-model="customer"
                        class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                      >
                        <option
                          :value="c.id"
                          v-for="c in $page.props.customers"
                          :key="c.id"
                        >
                          {{ c.name }}
                        </option>
                      </select>
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      >
                        Pay
                      </label>
                      <input
                        type="text"
                        v-model="pay"
                        class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                      />
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      >
                        Due
                      </label>
                      <input
                        type="text"
                        v-model="due"
                        class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                      />
                    </div>

                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      >
                        Pay By
                      </label>
                      <select
                        v-model="pay_by"
                        class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                      >
                        <option value="HandCash">Hand Cash</option>
                        <option value="Cheaque">Cheaque</option>
                        <option value="GiftCard">Gift Card</option>
                      </select>
                    </div>
                    <button
                      class="px-3 py-1 shadow my-2 rounded bg-green-400 hover:bg-green-600 text-white"
                    >
                      Submit
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="pl-2 w-full lg:w-3/5">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
          >
            <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
                <div class="relative w-full py-2 max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-800">
                    Products Sold
                  </h3>
                </div>
              </div>
              <div>
                <nav class="flex flex-col sm:flex-row flex-wrap">
                  <button
                    @click="reset"
                    :class="{
                      'border-b-2 text-blue-500  border-blue-500':
                        condition === '',
                    }"
                    class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none font-medium"
                  >
                    All Proudcts
                  </button>
                  <button
                    v-for="category in $page.props.categories"
                    :key="category.id"
                    @click="subproduct(category.id)"
                    :class="{
                      'border-b-2 text-blue-500 border-blue-500':
                        condition === category.id,
                    }"
                    class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none font-medium transition duration-500 ease-in-out"
                  >
                    {{ category.category_name }}
                  </button>
                </nav>
              </div>
            </div>
            <div class="w-full py-3 px-5">
              <input
                v-model="searchList"
                type="text"
                placeholder="Search Product"
                class="block text-gray-600 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded focus:outline-none focus:shadow-outline"
              />
            </div>
            <div class="flex flex-wrap bg-white w-full px-5 py-3">
              <div
                v-for="product in filterProduct"
                :key="product.id"
                class="w-1/3 flex flex-col border rounded border-gray-300 hover:border-gray-500"
              >
                <button @click.prevent="AddToCart(product)">
                  <img :src="product.image" class="w-full h-28" alt="" />
                  <div class="text-center my-2">
                    <p class="my-2">{{ product.product_name }}</p>
                    <span
                      class="h-6 text-xs text-white flex justify-center items-center rounded bg-red-500"
                      v-if="product.product_quantity < 1"
                      >Stock Out</span
                    >

                    <span
                      class="h-6 text-xs text-white flex justify-center items-center rounded bg-green-500"
                      v-else
                      >Available</span
                    >
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </Master>
</template>

<script>
import AppControlInput from "@/Pages/components/stock/layouts/components/AppControlInput";
import Form from "@/Pages/components/stock/pos/components/form";

export default {
  name: "index",
  components: {
    Form,
    AppControlInput,
  },
  data() {
    return {
      category: "",
      products: this.$page.props.product,
      condition: "",
      searchList: "",
      tax: "",
      customer: "",
      pay: "",
      due: "",
      pay_by: "",
    };
  },
  computed: {
    total() {
      return (this.subtotal * this.tax) / 100 + this.subtotal || 0;
    },
    filterProduct() {
      return this.products.filter((data) => {
        return data.product_name
          .toLowerCase()
          .includes(this.searchList.toLowerCase());
      });
    },
    cart() {
      return this.$store.getters["stockCart/cart"];
    },
    qty() {
      let carts = this.$store.getters["stockCart/cart"];
      let sum = 0;
      for (let i = 0; i < carts.length; i++) {
        sum += parseFloat(carts[i].quantity);
      }
      return sum;
    },
    subtotal() {
      let carts = this.$store.getters["stockCart/cart"];
      let sum = 0;
      for (let i = 0; i < carts.length; i++) {
        sum += parseFloat(carts[i].quantity) * parseFloat(carts[i].price);
      }
      return sum;
    },
  },
  methods: {
    reset() {
      this.condition = "";
      this.products = this.$page.props.product;
    },
    subproduct(id) {
      this.condition = id;
      let pro = this.$page.props.product.filter((d) => {
        return d.category_id === id;
      });
      this.products = pro;
    },
    AddToCart(product) {
      this.$store.dispatch("stockCart/addProductToCart", {
        id: product.id,
        name: product.product_name,
        price: product.selling_price,
      });
    },
    increaseQuantity(id) {
      this.$store.commit("stockCart/incrementItemQuantity", {
        id: id,
      });
    },
    decreaseQuantity(id) {
      this.$store.commit("stockCart/decrementItemQuantity", {
        id: id,
      });
    },
    order() {
      var data = {
        qty: this.qty,
        subtotal: this.subtotal,
        customer_id: this.customer,
        payby: this.pay_by,
        pay: this.pay,
        due: this.due,
        tax: this.tax,
        total: this.total,
        cart: this.$store.getters["stockCart/cart"],
      };
      this.$store.commit("stock/dospinner");
      this.$inertia.post("/orderdone", data, {
        onSuccess: () => {
          this.$store.commit("stock/stopspinner");
          this.$store.commit("stockCart/clearCart");
        },
      });
    },
  },
};
</script>

<style scoped>
/* .nav-active {
    color: rgb(110, 112, 126);
    background-color: rgb(255, 255, 255);
    border-color: rgb(221, 223, 235) rgb(221, 223, 235) rgb(255, 255, 255)
} */

.nav-origin {
  border-top-left-radius: 0.35rem;
  border-top-right-radius: 0.35rem;
  border-width: 1px;
  border-style: solid;
}
</style>
