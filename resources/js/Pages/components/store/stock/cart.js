export default {
    namespaced:true,
    state(){
        return{
            items:[]
        }
    },
    getters:{
        cart(state){
            return state.items;
        }
    },
    actions:{
        addProductToCart({ state, commit }, product){
                const cartItem = state.items.find(item => item.id === product.id)
                if (!cartItem) {
                    commit('pushProductToCart', {
                        id: product.id,
                        price: product.price ,
                        name: product.name
                    })
                } else {
                    commit('incrementItemQuantity', cartItem)
                }
                // remove 1 item from stock
            //    commit('products/decrementProductInventory', { id: product.id }, { root: true })
        }
    },
    mutations:{
        clearCart(state){
          state.items=[];
        },
        pushProductToCart (state, payload) {
            state.items.push({
               ...payload,
                quantity: 1
            })
        },
        incrementItemQuantity(state, { id }) {
            const cartItem = state.items.find(item => item.id === id)
            cartItem.quantity++;
        },
        decrementItemQuantity(state,{id}){
            const cartItem = state.items.find(item => item.id === id)
            cartItem.quantity--;
            if(cartItem.quantity === 0){
                const index=state.items.findIndex(item => item.id === id)
                state.items.splice(index,1);
            }
        }

    }
}
