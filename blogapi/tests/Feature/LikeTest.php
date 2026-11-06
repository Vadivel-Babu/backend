<?php

namespace Tests\Feature;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_like_the_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);

        $response = $this
            ->actingAs($user, '')
            ->post("/api/v1/like/{$post->id}");

        // 3. Assert: Verify database has the like
        $response->assertStatus(200);
        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }

    public function test_user_unlike_the_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
        // 2. Act: hit the single toggle route (adjust URL to match your web/api route)
        Like::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
        $response = $this
            ->actingAs($user)
            ->post("/api/v1/like/{$post->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }
}
