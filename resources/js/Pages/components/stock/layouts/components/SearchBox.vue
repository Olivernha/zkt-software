
<template>
    <div class="relative flex flex-wrap items-stretch">
          <span
              class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
          >
            <i class="fas fa-search"></i>
          </span>
        <input
            type="text"
            placeholder="Search here..."
            class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10"
            v-model="searchList"
        />
    </div>
</template>
<script>
export default {
    name: "SearchBox",
    emits:['search-list'],
    data(){
        return{
            searchList:''
        }
    },
    watch:{

        searchList(v){
            setTimeout(()=>{
                this.$emit('search-list',v);
            },500);

        }
    }

}
</script>
