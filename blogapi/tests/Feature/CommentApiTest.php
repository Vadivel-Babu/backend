<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_create_comment_for_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
        $newCommentData = [
            'user_id' => $user->id,
            'comment' => 'This is the post comment of my brand new post.',
            'post_id' => $post->id,
        ];

        // 2. ACT: Send a PUT request with our new data to the specific post's URL
        $response = $this
            ->actingAs($user, 'sanctum')
            ->postJson("/api/v1/posts/{$post->id}/comments", $newCommentData);

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(201);

        // Check if the response actually displays our new title
        $response->assertSee('Comment created successfully');
    }

    public function test_user_update_comment_for_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
        $comment = Comment::factory()->create(['comment' => 'this is old comment']);
        $newCommentData = [
            'user_id' => $user->id,
            'comment' => 'This is new comment.',
            'post_id' => $post->id,
        ];

        // 2. ACT: Send a PUT request with our new data to the specific post's URL
        $response = $this
            ->actingAs($user, 'sanctum')
            ->putJson("/api/v1/posts/{$post->id}/comments/{$comment->id}", $newCommentData);

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(200);

        // Check if the response actually displays our new title
        $response->assertSee('comment updated successfully');
    }

    public function test_user_delete_comment_for_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $user->id]);
        $comment = Comment::factory()->create();

        // 2. ACT: Send a PUT request with our new data to the specific post's URL
        $response = $this
            ->actingAs($user, 'sanctum')
            ->deleteJson("/api/v1/posts/{$post->id}/comments/{$comment->id}");

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(204);
    }
}
