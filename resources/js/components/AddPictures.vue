<template>
    <div class="tab-picture">
    <div><button @click="showForm()" class="anadirBotonPicture"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong>AÑADIR FOTO</strong></button></div>
         <div  class="tabla-actor">
            <table class="table">
                <thead >
                <tr>
                    <th scope="col">Album</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Dia de la creacion</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="picture in pictures" :key="picture.id">
                       <td>
                        <span v-if="picture.album">{{ picture.album.title }}</span>
                        <span v-else>Sin álbum</span>
                        <div v-if="picture.album && picture.album.image_rute">
                            <img :src="getImageUrl(picture.album.image_rute)" :alt="picture.album.title" />
                        </div>
                        </td>
                        <td>{{ picture.title }}</td>
                         <td><img :src="getImageUrl(picture.ruta_picture)" :alt="picture.title"/></td>
                        <td>{{ picture.description_picture }}</td>
                        <td>{{ picture.date_creation }}</td>

                        <th> <button @click="editPicture(picture)" class="editarBotonPicture"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click=eliminarPicture(picture) style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </th>
                    </tr>
            </tbody>
        </table>
                <div class="pagination">
                    <button @click="selectPicture(pagination.current_page - 1)" :disabled="!pagination.prev_page_url"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
</svg></button>
                    <span>Página {{ pagination.current_page }} de {{ pagination.last_page }}</span>
                    <button @click="selectPicture(pagination.current_page + 1)" :disabled="!pagination.next_page_url"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></button>
            </div>
    </div>
</div>
    <!-- Modal para borrar-->
    <div class="modal " tabindex="-1" id="deleteModalPicture">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Borrar foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que quieres borrar la foto <strong>{{ picture.title || '' }}</strong>?</p>
                <p v-if="isError" class="alert alert-danger mt-3">{{ messageError }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" @click="deletePicture(picture.id_picture)">Borrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal fade" tabindex="-1" id="pictureModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 v-if="insert" class="modal-title">Crear foto nueva</h5>
                <h5 v-else class="modal-title">Modificar Foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pictureForm">
                    <div class="mb-3">
                        <label for="albumTitle" class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" id="albumTitle" required
                            placeholder="Introducir título" v-model="picture.title">
                    </div>
                    <div class="mb-3">
                        <label for="albumDescription" class="form-label">Descripción</label>
                        <input type="text" name="description_picture" class="form-control" id="albumDescription"
                            required v-model="picture.description_picture">
                    </div>
                    <div class="mb-3">
                        <label for="pictureImage" class="form-label">Imagen</label>
                        <input type="file" name="image" class="form-control" id="pictureImage"
                            @change="subirImagen" accept="image/jpeg,image/png,image/jpg,image/webp">
                    </div>
                    <div class="mb-3">
                        <label for="addAlbum" class="form-label">Añadir a album</label>
                       <select  id="addAlbum" class="form-control" v-model="picture.album_id" required>
                             <option v-for="album in albums" :key="album.id_album" :value="album.id_album">
                                {{ album.title }}
                            </option>
                            <img v-if="selectedAlbum" :src="selectedAlbum.image_rute" alt="Imagen álbum" style="width:100px; margin-top:10px;">
                            <option value="">Sin album</option>
                       </select>
                    </div>

                    <p v-if="isError" class="alert alert-danger mt-3">{{ messageError }}</p>
                </form>
            </div>
            <div class="modal-footer">
                <button v-if="insert" type="button" class="btn btn-success" @click="insertPicture()">Crear</button>
                <button v-else type="button" class="btn btn-warning" @click="updatePicture()">Editar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import api from '../bootstrap.js';
import { ref , computed} from 'vue';
export default {
    data() {
        return{
            pictures: [],
            myModal : {},
            picture: {},
            albums: [],
            messageError : "",
            isError : false,
            insert : false,
            originalPicture: {},
            isLoading: false, // Añadir estado de carga
            pagination: {
            current_page: 1,
            last_page: 1,
            next_page_url: null,
            prev_page_url: null
            }

        }
    },

    created() {
       this.selectPicture(this.pagination.current_page);

    },
       methods: {
        removeImage() {
    this.picture.ruta_picture = null;
    // Agrega un botón en tu modal para llamar a este método
    },
        getImageUrl(imagePath) {
      if (!imagePath) return '/placeholder.jpg';

      if (imagePath.startsWith('http')) return imagePath;

          const baseUrl = import.meta.env.VITE_BACKEND_URL.replace(/\/+$/, ''); // quita / final si hay
        return `${baseUrl}/storage/${imagePath}`;
    },
    showForm() {
        this.insert = true;
        this.picture = {};
        this.isError = false;
        this.messageError = "";
        this.myModal = new bootstrap.Modal(document.getElementById('pictureModal'),{
             backdrop: false
        });
        this.myModal.show();
    },

    editPicture(picture) {
        this.insert = false;
        this.picture = {...picture};
        this.originalPicture = {...picture}; // Guardar los datos originales para comparación
        this.isLoading = false; // Asegurarse de que no esté en estado de carga
        this.isError = false;
        this.messageError = "";
        this.myModal = new bootstrap.Modal(document.getElementById('pictureModal'),{
             backdrop: false
        });
        this.myModal.show();
    },

    eliminarPicture(picture) {
        this.picture = {...picture};
        this.isError = false;
        this.messageError = "";
        this.myModal = new bootstrap.Modal(document.getElementById('deleteModalPicture'),{
             backdrop: false
        });
        this.myModal.show();
    },

    subirImagen(event) {
        this.picture.ruta_picture = event.target.files[0];
    },

    async insertPicture() {
        this.isError = false;
        try {
            const formData = new FormData();
            formData.append('title', this.picture.title);
            formData.append('description_picture', this.picture.description_picture);
            formData.append('album_id', this.picture.album_id);
            if (this.picture.ruta_picture) {
                formData.append('image', this.picture.ruta_picture);
            }

            const response = await api.post('pictures', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            this.selectPicture();
            this.myModal.hide();
            this.showSuccessAlert('Foto creada correctamente');
        } catch (error) {
            this.handleError(error);
        }
    },

        async updatePicture() {
            this.isError = false;
            this.isLoading = true;

            try {
                const formData = new FormData();
                // Solo enviar campos modificados
                if (this.picture.title !== this.originalPicture.title) {
                    formData.append('title', this.picture.title);
                }

                if (this.picture.description_picture !== this.originalPicture.description_picture) {
                    formData.append('description_picture', this.picture.description_picture);
                }

                if (this.picture.album_id !== this.originalPicture.album_id) {
                    formData.append('album_id', this.picture.album_id);
                }

                // Manejo de imagen (nueva o eliminada)
                if (this.picture.ruta_picture instanceof File) {
                    formData.append('image', this.picture.ruta_picture);
                } else if (this.picture.ruta_picture === null && this.originalPicture.ruta_picture) {
                    // Caso donde se eliminó la imagen
                    formData.append('remove_image', 'true');
                }
                console.log('FormData:', formData);
                const response = await api.post(`picture/${this.picture.id_picture}?_method=PUT`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.myModal.hide();
                this.selectPicture(); // Refrescar la lista
                this.showSuccessAlert('Foto actualizada correctamente');

            } catch (error) {
                this.handleError(error);
            } finally {
                this.isLoading = false;
            }
    },
   selectPicture(page = 1) {
    this.isError = false;
    api.get(`/picture/paginate?page=${page}`)
        .then(response => {
            this.pictures = response.data.data; // solo los datos
            console.log('Datos de la API:', response.data);
            this.pagination = {
                current_page: response.data.current_page,
                last_page: response.data.last_page,
                next_page_url: response.data.next_page_url,
                prev_page_url: response.data.prev_page_url
            };
        })
        .catch(error => {
            this.handleError(error);
        });
}
,
    deletePicture(id) {
        this.isError = false;
        api.delete(`picture/${id}`)
            .then(response => {
                this.selectPicture();
                this.myModal.hide();
                this.showSuccessAlert('Foto eliminada correctamente');
            })
            .catch(error => {
                this.handleError(error);
            });
    },
    handleError(error) {
        this.isError = true;
        if (error.response) {
            if (error.response.data.errors) {
                this.messageError = Object.values(error.response.data.errors).join(' ');
            } else {
                this.messageError = error.response.data.message || 'Error desconocido';
            }
        } else {
            this.messageError = 'Error de conexión';
        }
    },

    showSuccessAlert(message) {
        // Implementa tu lógica para mostrar alertas de éxito
        console.log(message);
    }
    ,
    obtenerAlbums() {
        api.get('/album')
            .then(response => {
                this.albums = response.data;
            })
            .catch(error => {
                this.isError = true;
                this.messageError = 'Error al obtener los albums';
            });
    }
},
    mounted() {
        this.obtenerAlbums();
    }

}
    </script>
<style>
.pagination{
    display: flex;
    justify-content: center;
    margin-top: 20px;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
}
.pagination button {
    border: none;
     outline: none;
    box-shadow: none;
    padding: 10px 20px;
    margin: 0 5px;
    border-radius: 5px;
    cursor: pointer;
}
.pagination button:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}
.tab-picture {
    margin: 20px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

}
.anadirBotonPicture {
    display: flex;
    margin-top: 100px;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
.anadirBotonPicture:hover {
    background-color: #0056b3;
}
.tabla-actor {
    margin-top: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;

}
.table {
    width: 100%;
    border-collapse: collapse;
}
.table th, .table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #000000;

}
.table th {
    font-weight: bold;
    color: #333;
}
.table td {
    color: #000000;
}
.table tr:hover {
    background-color: #f1f1f1;
}
.table img {
    max-width: 100px;
    height: auto;
}
.table th {
    background-color: #f2f2f2;
}
.table img {
    max-width: 100px;
    height: auto;
}

.modal-header {
    background-color: #007bff;
    color: white;
}
.modal-footer {
    display: flex;
    justify-content: space-between;
}
.modal-footer .btn {
    margin: 5px;
}
.modal-body {
    padding: 20px;
}
.modal-body form {
    display: flex;
    flex-direction: column;
}
.modal-body form .form-label {
    margin-bottom: 10px;
}
.modal-body form .form-control {
    margin-bottom: 15px;
}
.modal-body form .alert {
    margin-top: 10px;
}
.modal-body form .btn {
    margin-top: 10px;
}
.modal-body form .btn-success {
    background-color: #28a745;
    color: white;
}
.modal-body form .btn-success:hover {
    background-color: #218838;
}
.modal-body form .btn-warning {
    background-color: #ffc107;
    color: black;
}
button.editarBotonPicture {
    background-color: #ffc107;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
}
button.editarBotonPicture:hover {
    background-color: #e0a800;
}
button.eliminarBoton {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
}
button.eliminarBoton:hover {
    background-color: #c82333;
}
</style>
