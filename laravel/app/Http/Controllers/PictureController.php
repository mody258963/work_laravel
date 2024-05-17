<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\LectureResourse;
use App\Http\Controllers\API\BaseApiController;
use App\Models\Album;
use App\Models\Picture;
use App\Repositories\Picture\PictureRepository;
use Illuminate\Support\Facades\Validator;
class PictureController extends BaseApiController
{

    public function __construct(private PictureRepository $pictureRepository)
    {
        $this->pictureRepository = $pictureRepository;
    }


    public function addPicture(Request $request, Album $album)
    {
        $request->validate(['name' => 'required']);
        $album->pictures()->$this->pictureRepository->create($request->all());;
        return redirect()->route('albums.index');

    }


    public function destroy(Picture $picture)
    {
        $this->pictureRepository->delete($picture);
        return redirect()->route('albums.index'); 
    }





}
