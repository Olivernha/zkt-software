
const filterMixin=(d)=>{
    return{
        data(){
            return{
                searchList:''
            }

        },
        methods:{
            search(v){
                this.searchList=v;
            }
        }
       ,
        computed:{
           filterList(){
               return this.$page.props[d].data ? this.$page.props[d].data.filter(data=>{
                  return Object.values(data).toString().toLowerCase().includes(this.searchList.toLowerCase());
               }) : ''

           }
        }
    }


}
export default filterMixin;
