<?php
namespace Tests\System;

use Illuminate\Database\Eloquent\Collection;
use App\ImagePost;
use App\Repositories\ImagePostRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImagePostRepositoryTest extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;

    public function testGetImagePost_withExistingItem_returnsObject()
    {
        $postToCheck = $this->insertTestPostsAndReturnChosenOne(20);

        $repo = new ImagePostRepository();
        $result = $repo->getImagePost($postToCheck->id);

        $this->assertInstanceOf(ImagePost::class, $result);
        $this->assertEquals($result->id, $postToCheck->id);
    }

    public function testGetImagePostMandatory_withNoExistingItem_throwsException()
    {
        $this->insertTestPosts(20);

        $repo = new ImagePostRepository();

        $this->expectException(ModelNotFoundException::class);
        $repo->getImagePost(9999);
    }

    /**
     * @return ImagePost|static|null
     */
    private function insertTestPostsAndReturnChosenOne($count)
    {
        $posts = $this->insertTestPosts($count);

        $selected = rand(0, $count - 1);
        return $posts[$selected];
    }

    /**
     * @return Collection
     */
    private function insertTestPosts($numPosts)
    {
        return factory(ImagePost::class, $numPosts)->create();
    }
}