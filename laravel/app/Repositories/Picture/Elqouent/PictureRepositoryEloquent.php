<?php

namespace App\Repositories\Picture\Elqouent;

use App\Entities\Lecture\Lecture;
use App\Models\Picture;
use Illuminate\Support\Facades\Cache;
use App\Repositories\EloquentBaseRepository;
use App\Repositories\Picture\PictureRepository;
use App\Models\Album;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;


/**
 * Class AudioRepositoryEloquent.
 *
 * @package namespace App\Repositories\Audio;
 */
class PictureRepositoryEloquent extends EloquentBaseRepository implements PictureRepository
{

    public function photoupload(Album $album, Request $request)
    {
       
        $data = $request->validate([
            'name' => 'required',
            'path' => 'required',
        ]);


        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->store('public/posts');
            $imagePath = str_replace('public', 'storage', $imagePath);
            $data['path'] = $imagePath;
        }


        $data['album_id'] = $album->id;
        return $this->model->create($data);
    }
}
