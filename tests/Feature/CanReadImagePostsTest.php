<?php
namespace Tests\Feature;

use App\ImagePost;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CanReadImagePostsTest extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;

    /** @test */
    public function userCanSeeLatestImagePostOnHomePage()
    {
        $posts = factory(ImagePost::class, 20)->make();
        $this->get('/')->assertSee($posts[19]->title);
    }

    /** @test */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
