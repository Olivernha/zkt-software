import {Inertia} from '@inertiajs/inertia'

export default {
    namespaced: true,
    state() {
        return {
            spinner:false,
        }
    },
    getters: {
        getspinner(state){
            return state.spinner;
        }
    },
    mutations: {
        dospinner(state){
            state.spinner = true;
        },
        stopspinner(state){
          state.spinner= false;
        },
        addAlert() {
            Toast.fire({
                icon: "success",
                title: "Created successfully",
            });
        },
        deleteAlert() {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        },
        updateAlert(){
            Toast.fire({
                icon: "success",
                title: "Updated successfully",
            });
        }

    },
    actions: {
        add(context, payload) {
            context.commit('dospinner');
            const data = payload.data;
            const type = payload.type;
            Inertia.post(`/${type}`, data).then(() => {
                context.commit('stopspinner');
                context.commit('addAlert');
            });
        },
        delete(context, payload) {
            const id = payload.id;
            const type = payload.type;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.value) {
                    Inertia.delete(`/${type}/` + id).then(() => {
                        context.commit('deleteAlert');
                    });
                }
            });
        },
        update(context, payload) {
            context.commit('dospinner');
            const data = payload.data;
            const id = payload.id;
            const type = payload.type;
            Inertia
                .put(`/${type}/${id}`,data)
                .then(() => {
                    context.commit('stopspinner');
                    context.commit('updateAlert');
                });
        }
    }


}
