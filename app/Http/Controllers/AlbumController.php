<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Mostrar todos los álbumes.
     */
    public function paginate()
    {
        $albums = Album::with(['user', 'pictures'])->paginate(5);
        return response()->json($albums);
    }

    public function index()
    {
        $albums = Album::with(['user', 'pictures'])->get();
        return response()->json($albums);
    }

    /**
     * Guardar un nuevo álbum con imagen.
     */
        public function store(StoreAlbumRequest $request)
        {
            // Obtener el ID del usuario autenticado
            $userId = auth()->id();

            // Validación (ajusta tu StoreAlbumRequest)
            $validated = $request->validated();

            // Subir imagen
            $path = $request->file('image')->store('albums', 'public');

            // Crear el álbum
            $album = Album::create([
                'title' => $validated['title'],
                'image_rute' => $path,
                'description_album' => $validated['description_album'] ?? '',
                'user_id' => $userId // Asignación automática
            ]);


            return response()->json($album, 201);
        }

    /**
     * Mostrar un álbum.
     */
    public function show(Album $album)
    {
        $album->load(['user', 'pictures']);
        return response()->json($album);
    }

    public function getPicturesByAlbumId($id)
    {
        $pictures = Picture::where('album_id', $id)->get();
    return response()->json($pictures);
    }

    /**
     * Actualizar un álbum (con posible nueva imagen).
     */
    public function update(Request $request, Album $album)
{
    \Log::info('Entrando al método update del álbum');
    \Log::info('Datos recibidos:', $request->all());

    $validator = Validator::make($request->all(), [
        'title' => 'sometimes|string|max:255',
        'description_album' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        'remove_image' => 'nullable|in:true,false',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Datos inválidos',
            'errors' => $validator->errors()
        ], 422);
    }

    // Campos editables
    $fillableFields = ['title', 'description_album'];
    foreach ($fillableFields as $field) {
        if ($request->has($field)) {
            $album->{$field} = $request->{$field};
        }
    }

    // Eliminar imagen si se solicitó
    if ($request->input('remove_image') === 'true') {
        if ($album->image_rute && Storage::disk('public')->exists($album->image_rute)) {
            Storage::disk('public')->delete($album->image_rute);
        }
        $album->image_rute = null;
    }

    // Subida de nueva imagen si existe
    if ($request->hasFile('image')) {
        // Eliminar anterior si existe
        if ($album->image_rute && Storage::disk('public')->exists($album->image_rute)) {
            Storage::disk('public')->delete($album->image_rute);
        }

        // Guardar nueva imagen
        $path = $request->file('image')->store('uploads/albums', 'public');
        $album->image_rute = $path;
        \Log::info('Nueva imagen subida:', ['ruta' => $path]);
    }

    $album->save();

    \Log::info('Álbum actualizado:', $album->toArray());

    return response()->json([
        'message' => 'Álbum actualizado exitosamente',
        'data' => $album
    ]);
}


    /**
     * Eliminar un álbum (y su imagen).
     */
    public function destroy(Album $album)
    {
         $album->pictures()->update(['album_id' => null]);

        if ($album->image_rute && Storage::disk('public')->exists($album->image_rute)) {
            Storage::disk('public')->delete($album->image_rute);
        }

        $album->delete();

        return response()->json([
            'message' => 'Álbum eliminado correctamente'
        ]);
    }
}
