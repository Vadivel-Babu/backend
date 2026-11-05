<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    /** A basic feature test example. */
    use RefreshDatabase;

    public function test_user_can_see_all_blog_posts()
    {
        $user = User::factory()->create();
        // 2. RUN FACTORY HERE: It safely inserts 1 fake post into the temporary DB
        $post = Post::factory()->create([]);

        // 3. ACT: Visit the API link
        $response = $this
            ->actingAs($user, 'sanctum')
            ->getJson('/api/v1/posts');

        // 4. ASSERT: Check if the API successfully displays the post
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_user_can_see_a_single_specific_post()
    {
        // 1. ARRANGE: Create a user and a specific post in the database
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'author_id' => $user->id,
        ]);

        // 2. ACT: Visit the specific URL for this post using its real ID ($post->id)
        $response = $this
            ->actingAs($user, 'sanctum')
            ->getJson("/api/v1/posts/{$post->id}");  // Notice how we pass the ID here!

        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    /**
     * @test
     */
    public function test_user_can_update_their_own_post()
    {
        // 1. ARRANGE: Create a user and an existing post in the database
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'author_id' => $user->id,
            'title' => 'Old Title That Needs Changing'
        ]);

        // This is the fresh data we want to update the post with
        $updatedData = [
            'title' => 'Brand New Updated Title',
            'content' => 'Updated content text.',
            'category_id' => $post->category_id  // Keep the same category or make a new one
        ];

        // 2. ACT: Send a PUT request with our new data to the specific post's URL
        $response = $this
            ->actingAs($user, 'sanctum')
            ->putJson("/api/v1/posts/{$post->id}", $updatedData);

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(200);

        // Check if the response actually displays our new title
        $response->assertSee('post updated successfully');

        // Check the actual database to make sure it permanently saved the change!
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Brand New Updated Title'
        ]);
    }

    public function test_user_can_create_post()
    {
        // 1. ARRANGE: Create a user and an existing post in the database
        $user = User::factory()->create();
        $category = \App\Models\Category::factory()->create();

        // Prepare the payload data that your API expects
        $newPostData = [
            'author_id' => $user->id,
            'title' => 'My Brand New Written Post',
            'content' => 'This is the body content of my brand new post.',
            'category_id' => $category->id,
        ];

        // 2. ACT: Send a PUT request with our new data to the specific post's URL
        $response = $this
            ->actingAs($user, 'sanctum')
            ->postJson('/api/v1/posts', $newPostData);

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(200);

        // Check if the response actually displays our new title
        $response->assertSee('post created successfully');
    }

    public function test_user_can_delete_post()
    {
        // 1. ARRANGE: Create a user and an existing post in the database
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'author_id' => $user->id,
        ]);

        $response = $this
            ->actingAs($user, 'sanctum')
            ->deleteJson("/api/v1/posts/{$post->id}");

        // 3. ASSERT:
        // Check if the API confirms the update (usually returns 200 OK or 202 Accepted)
        $response->assertStatus(204);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id
        ]);

        // Check if the response actually displays our new title
        // $response->assertSee('post created successfully');
    }
}
