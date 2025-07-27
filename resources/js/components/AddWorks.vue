<template>
    <div class="tab-actor">
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong> AÑADIR ALBUM</strong></button></div>
         <div  class="tabla-actor">
            <table class="table">
                <thead >
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Dia de la creacion</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="album in albumes" :key="album.id">
                        <td>{{ album.title }}</td>
                       <td><img :src="album.image_rute" alt="Imagen del álbum" style="height: 60px; object-fit: cover;"></td>
                        <td>{{ album.description_album }}</td>
                        <td>{{ album.date_creation }}</td>

                        <th> <button @click="editAlbum(album)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click=eliminarAlbum(album) style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </th>
                    </tr>
            </tbody>
        </table>

    </div>
</div>
    <!-- Modal para borrar-->
    <div class="modal" tabindex="-1"  id="deleteModalAlbum">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar album nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ album.title || '' }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click=deleteAlbum(album.id_album)>Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="Album">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear album nuevo</h5>
            <h5 v-else class="modal-title">Modificar Album</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="actorNombre" class="form-label">Titulo </label>
                                <input type="text" name="title" class="form-control" id="actorNombre" required
                                    placeholder="Introducir title" v-model="album.title">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="actorApellido" class="form-label">Descripcion</label>
                                <input type="text" name="description_album" class="form-control" id="actorApellido"
                                    required v-model="album.description_album">
                            </div>

                            <div class="mb-3">
                                <label for="actorImagen" class="form-label">Imagen</label>
                                <input type="file" name="image_rute" class="form-control" id="actorImagen"
                                    required @change="subirImagen">
                            </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertAlbum()">Crear</button>
            <button v-else type="button" class="btn btn-secondary" @click="updateAlbum()">Editar</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>
</template>
<script>
import api from '../bootstrap.js';

export default {
    data() {
        return{
            albumes: [],
            myModal : {},
            album: {},
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectAlbum();

    },
        methods: {
            showForm() {
                this.insert = true;
                this.album = {};
                this.myModal = new bootstrap.Modal(document.getElementById('Album'));
                this.myModal.show();
            },
            updateAlbum() {
                const me = this;
                let formData = new FormData();
                formData.append('title', me.album.title);
                formData.append('description_album', me.album.description_album);

                if (me.album.image_rute instanceof File) {
                    formData.append('image_rute', me.album.image_rute);
                }

                api.put('album/' + me.album.id_album, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(() => {
                    me.selectAlbum();
                    me.myModal.hide();
                })
                .catch(error => {
                    me.isError = true;
                    me.messageError = error.response.data.message;
                });
                },
            subirImagen(event){
                const me = this;
                me.album.image_rute = event.target.files[0];
            },
            insertAlbum(){
                const me = this;

                let formData = new FormData();

                formData.append('title', me.album.title);
                formData.append('image_rute', me.album.image_rute);
                formData.append('description_album', me.album.description_album);

                api.post('album', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                    })
                .then(response => {
                    me.selectAlbum();
                    me.myModal.hide();
                })

                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });

            },selectAlbum(){
                const me = this;
                api.get('album/')
                .then(response => {
                    me.albumes = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editAlbum(album) {
                this.insert = false;
                this.album = album;
                this.myModal = new bootstrap.Modal('#album');
                this.myModal.show();
            },
            eliminarAlbum(album) {
                this.isError = false;
                this.album = album;
                this.myModal = new bootstrap.Modal('#deleteModalAlbum');
                this.myModal.show();
            },
        deleteAlbum(id){
            const me = this;
            api.delete("album/" + id)
            .then(response => {
                me.selectAlbum()
                me.myModal.hide()
        })
        .catch(error => {
            this.isError = true;
            me.messageError = error.response.data.message;
        });
        }
    },

    mounted() {}

}
    </script>

<style>
.tab-actor {
    margin-top: 100px;
    margin-bottom: 20px;
    background-color: #ffffff;
    box-shadow: #EAD2AC 0px 0px 10px;
    border-radius: 20px;
    padding: 10px;
    display: flex;
    color: #ffffff;
    width: 100rem;
    margin-left: 10rem;
}
.editarBoton{
    border: none;
    background: none;
    cursor: pointer;
    color: #2EBFA5;
}
    .anadirBoton{
        margin-left: 10rem;
        border: none;
        background: none;
        cursor: pointer;
        color: #2EBFA5;
    }
</style>
