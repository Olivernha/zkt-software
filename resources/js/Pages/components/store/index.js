import { createStore} from "vuex";
import StockModule from './stock/index'
import StockCartModule from './stock/cart'
const store=createStore({
    modules:{
        stock:StockModule,
        stockCart:StockCartModule
    }
})
export default store;
