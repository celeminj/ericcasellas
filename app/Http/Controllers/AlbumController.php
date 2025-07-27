<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Mostrar todos los álbumes.
     */
    public function index()
    {
        $albums = Album::with(['user', 'pictures'])->get();
        return response()->json($albums);
    }

    /**
     * Guardar un nuevo álbum con imagen.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'description_album' => 'nullable|string',
                'user_id' => 'required|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Datos inválidos',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Guardar la imagen en public/uploads/albums
            $path = $request->file('image')->store('uploads/albums', 'public');

            $album = new Album();
            $album->title = $request->input('title');
            $album->image_rute = $path;
            $album->description_album = $request->input('description_album', '');
            $album->user_id = $request->input('user_id');
            $album->save();

            return response()->json($album, 201);

        } catch (\Exception $e) {
            \Log::error('Error al crear álbum: '.$e->getMessage());

            return response()->json([
                'message' => 'Error inesperado al guardar el álbum.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Mostrar un álbum.
     */
    public function show(Album $album)
    {
        $album->load(['user', 'pictures']);
        return response()->json($album);
    }

    /**
     * Actualizar un álbum (con posible nueva imagen).
     */
    public function update(Request $request, Album $album)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description_album' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        // Si se sube una nueva imagen, reemplazarla
        if ($request->hasFile('image')) {
            // Borra la anterior si existe
            if ($album->image_rute && Storage::disk('public')->exists($album->image_rute)) {
                Storage::disk('public')->delete($album->image_rute);
            }

            $path = $request->file('image')->store('uploads/albums', 'public');
            $album->image_rute = $path;
        }

        $album->title = $request->title;
        $album->description_album = $request->description_album;
        $album->user_id = $request->user_id;
        $album->save();

        return response()->json($album);
    }

    /**
     * Eliminar un álbum (y su imagen).
     */
    public function destroy(Album $album)
    {
        // Eliminar la imagen física
        if ($album->image_rute && Storage::disk('public')->exists($album->image_rute)) {
            Storage::disk('public')->delete($album->image_rute);
        }

        $album->delete();

        return response()->json([
            'message' => 'Álbum eliminado correctamente'
        ]);
    }
}
