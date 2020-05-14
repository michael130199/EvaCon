<template>

<div class="container mt-3">

    <div class="row justify-content-center">

        <div class="col-md-6" v-if="modo==1">

            <div class="card">

                <h5 class="card-header">Lista de Usuarios</h5>

                <div class="card-body text-center">

                    <h5 class="card-title">Acceda al Panel de usuario y sus diferentes funcionalidades </h5>

                    <button class="btn btn-success" @click="modo=2">Mostrar Lista</button>

                </div>

            </div>

        </div>

        <div class="col-md-12 mt-3" v-if="modo==1">

            <table class="table table-dark table-cover">
                
                <thead>

                    <tr>

                        <th scope="col">#</th>

                        <th scope="col">Acción</th>

                        <th scope="col">Id Autor</th>
                        
                        <th scope="col">Fecha de Creación</th>

                    </tr>

                </thead>

                <tbody>

                    <tr v-for="(item, index) in traces" 
                        :key="index">

                        <th scope="row">{{index + 1 }}</th>

                        <td v-if="item.type == 0" >Crear Usuario</td>
                        <td v-if="item.type == 1" >Inició Sesión</td>
                        <td v-if="item.type == 2" >Cerró Sesión</td>
                        <td v-if="item.type == 3" >Editó sus datos</td>
                        <td v-if="item.type == 4" >Editó los datos del id ( {{ item.refe }} )</td>
                        <td v-if="item.type == 5" >Consultó Todo los Usuarios</td>
                        <td v-if="item.type == 6" >Consulto el usuario especifico ()</td>
                        <td v-if="item.type == 8" >Se eliminó!</td>
                        <td v-if="item.type == 9" >Elimino el usuario ({{ item.refe }})</td>

                        
                        <td> {{ item.user_id }} <button class="btn btn-primary" v-if="item.type != 8"><i class="fas fa-eye"></i></button></td>
                        <td>{{ item.created_at }}</td>

                    </tr>


                </tbody>

            </table>

        </div>

        <div class="col-md-3" v-if="modo==2">

            <div class="card">

                <button class="btn btn-secondary" @click="modo=1">Regresar</button>

            </div>
            
        </div>

        <list-user v-if="modo==2"></list-user>


    </div>

</div>

</template>

<script>

import ListUser from './ListUserComponent.vue';


export default {
    components: {
        ListUser
    },
    data() {
        return {
            titulo: 'Movimientos de la Pagina',
            traces: [],
            modo: 1
        }
    },
    created() {
        axios.get('/listTrace').then( res => {
            this.traces = res.data;
        });
    },
}
</script>
