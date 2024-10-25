<?php

namespace Tests\Feature;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PictureTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Other initialization code
    }

    /** @test */
    public function index_pictures()
    {
        $user = User::factory()->create();
        $picture = Picture::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->getJson('/api/pictures');

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $picture->id]);
    }

    /** @test */
    public function create_a_picture()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $data = [
            'picture_name' => 'Test Picture',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'alt' => 'Test Alt Text'
        ];

        $response = $this->actingAs($user)->postJson('/api/pictures', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['picture_name' => 'Test Picture']);

        $this->assertDatabaseHas('pictures', ['picture_name' => 'Test Picture']);
    }

    /** @test */
    public function show_a_picture()
    {
        $user = User::factory()->create();
        $picture = Picture::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->getJson('/api/pictures/' . $picture->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $picture->id]);
    }

    /** @test */
    public function update_a_picture()
    {
        $user = User::factory()->create();
        $picture = Picture::factory()->create(['user_id' => $user->id]);
        $data = [
            'picture_name' => 'Updated Picture Name',
            'alt' => 'Updated Alt Text'
        ];

        $response = $this->actingAs($user)->putJson('/api/pictures/' . $picture->id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('pictures', ['picture_name' => 'Updated Picture Name']);
    }

    /** @test */
    public function delete_a_picture()
    {
        $user = User::factory()->create();
        $picture = Picture::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->deleteJson('/api/pictures/' . $picture->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('pictures', ['id' => $picture->id]);
    }
}
