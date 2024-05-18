<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseApiController;
use App\Http\Resources\CourseResourse;
use App\Models\Album;
use App\Repositories\Album\AlbumRepository;
use Illuminate\Support\Facades\Validator;


class AlbumController extends BaseApiController
{
    public function __construct(private AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function index()
    {
        $albums = Album::with('pictures')->get();
         return view('albums.index',[
            'albums' => $albums
        ]); 
    }



    public function addalbum(Request $request) {
        $request->validate(['name' => 'required']);
        $data = $this->albumRepository->create($request->all());
        return redirect()->route('albums.index');
    }



 
    public function destroy(Album $album){
         $this->albumRepository->delete($album);
         return redirect()->route('albums.index');
    }



}
