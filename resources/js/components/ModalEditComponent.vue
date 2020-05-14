<template>

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

                    <div class="col-6">

                        <label for="">Contraseña</label>


                        <input type="password" 
                            class="form-control mb-2" 
                            placeholder="Contraseña"
                            v-model="user.password">

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
                @click="editarNota(user)">
                Guardar Cambios
            </button>
        </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
