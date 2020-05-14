<template>

<div class="col-md-12 mt-3">

    <h2 class="text-light">{{ title }}</h2>

    <table class="table table-dark table-cover">
        
        <thead>

            <tr>

                <th scope="col">#</th>

                <th scope="col">Nombre</th>

                <th scope="col">Email</th>
                
                <th scope="col">Fecha de Creación</th>

                <th scope="col">Fecha de ultimo Edición </th>

                <th scope="col">Acciones</th>

            </tr>

        </thead>

        <tbody>

            <tr v-for="(item, index) in users" 
                :key="index">

                <th scope="row">{{index + 1 }}</th>

                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.created_at }}</td>
                <td>{{ item.updated_at }}</td>
                <td>

                    <button class="btn btn-primary"
                        @click="viewUserEdit(item)">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-danger"
                        @click="deleteUser(item, index)">
                        <i class="fas fa-trash"></i>
                    </button>

                </td>

            </tr>


        </tbody>

    </table>

    <div class="modal modal-vue " tabindex="-1" role="dialog" v-if="modoEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button type="button" class="close" @click="modoEdit = false">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="">

                        <div class="row">

                            <div class="col-6">

                                <label for="">Nombre</label>

                                <input type="text" 
                                    class="form-control mb-2" 
                                    placeholder="Nombre del Usuario" 
                                    v-model="user.name">

                            </div>

                            <div class="col-6">

                                <label for="">Email</label>

                                <input type="text" 
                                    class="form-control mb-2" 
                                    placeholder="Email del Usuario" 
                                    v-model="user.email">
                            
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" 
                        class="btn btn-secondary" 
                        @click="modoEdit = false">
                        Cerrar
                    </button>

                    <button class="btn btn-success"
                        type="submit" 
                        @click="editUser(user)">
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>


</template>

<script>
    export default {
        data() {
            return {
                title: 'Lista de usuarios',
                users: [],
                user: {},
                modoEdit: false
            }
        },
        created() {
            axios.get('/users').then( res => {
                this.users = res.data;
            });
        },
        methods: {
            viewUserEdit(item){
                this.user = item;
                this.modoEdit = true;
            },
            editUser(item){

                this.modoEdit = false;

                const params = {name: item.name, email: item.email};

                axios.put(`/users/${item.id}`, params)
                    .then();


                let index = this.users.findIndex( user => user.id === item.id);

                if(index != -1) {
                    this.users[index] = this.user;    
                }

                this.user= {};
            },
            deleteUser(item, index){

                const confirmacion = confirm(`Eliminar el usuario: ${item.name}`);

                if(confirmacion){
                    axios.delete(`/users/${item.id}`)
                        .then( () => {
                            this.users.splice(index, 1);
                        });
                }
            }
        }
    }
</script>

<style>

.modal-vue {
    display: table;
    transition: opacity .3s ease;
    background-color: rgba(0, 0, 0, .5);
}

</style>