<?php
namespace App\Repositories;

use App\ImagePost;

class ImagePostRepository
{
    /**
     * @param int $id
     * @return ImagePost|static|null
     */
    public static function getImagePost($id, $mandatory = true)
    {
        $query = ImagePost::where('id', '=', $id);

        if($mandatory) {
            return $query->firstOrFail();
        } else {
            return $query->first();
        }
    }

    /**
     * @param int $perPage
     */
    public function getPaginatedPosts($perPage = 9)
    {
        return ImagePost::orderBy('created_at', 'desc')->paginate($perPage);
    }
}