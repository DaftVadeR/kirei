<?php
namespace App\Http\Controllers;

use App\Repositories\ImagePostRepository;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class ImagePostController extends Controller
{
    private $imagePostRepository;

    public function __construct()
    {
        $this->imagePostRepository = new ImagePostRepository();
    }

    public function index(Request $request)
    {
        $posts = $this->imagePostRepository->getPaginatedPosts();

        return view('image_posts.index', compact($posts));
    }

    public function create(Repository $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $id = $request->get('id');

        $post = $this->imagePostRepository->getImagePost($id);

        return view('image_posts.index', compact($post));
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}
