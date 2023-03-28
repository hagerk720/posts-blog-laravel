<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase

{
    use RefreshDatabase;
    use DatabaseMigrations;


    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function test_user_can_create_post(){

    }
    public function test_read_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/posts');

        if ($response->getStatusCode() == 302) {
            $response = $this->followRedirects($response);
        }
        $response->assertStatus(200);
        $response->assertSee($post['title']);

    }
}
