import { createStore} from "vuex";
import StockModule from './stock/index'
const store=createStore({
    modules:{
        stock:StockModule
    }
})
export default store;
