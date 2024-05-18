<?php

namespace App\Repositories\Picture;

use App\Models\Album;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AudioRepository.
 *
 * @package namespace App\Repositories\Audio;
 */
interface PictureRepository extends BaseRepository
{
    public function photoupload(Album $album,Request $request);
}
