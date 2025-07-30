<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePictureRequest;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::with('album')->get();
        return response()->json($pictures);
    }

        public function paginate()
    {
        $pictures = Picture::with('album')->paginate(10);
        return response()->json($pictures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {

            $validated = $request->validated();

            $picture = new Picture;
            $picture->title = $request->input('title');
            $picture->description_picture = $request->input('description_picture') ?? '';
            $picture->album_id = $request->input('album_id');
            $picture->ruta_picture = $request->file('image')->store('pictures', 'public');
            $picture->save();

            return response()->json($picture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        $album->load('album');
        return response()->json($picture);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StorePictureRequest $request, Picture $picture)
    {
                $validated = $request->validated();

                $picture->title = $request->input('title', $picture->title);

               if (array_key_exists('description_picture', $validated)) {
    $picture->description_picture = $validated['description_picture'];
}

                $picture->album_id = $request->input('album_id', $picture->album_id);

                if ($request->hasFile('image')) {

                    $picture->ruta_picture = $request->file('image')->store('pictures', 'public');

                }
                $picture->save();

                return response()->json($picture, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
       if($picture->ruta_picture && Storage::disk('public')->exists($picture->ruta_picture)) {
            Storage::disk('public')->delete($picture->ruta_picture);
        }
        $picture->delete();
        return response()->json(['message' => 'Picture deleted successfully'], 200);
    }
}
