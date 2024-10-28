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

    #[\PHPUnit\Framework\Attributes\Test]
    public function list_pictures()
    {
        $user = User::create([
            'pseudo_user' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);

        $picture = Picture::create([
            'picture_name' => 'Test Picture',
            'image' => 'test.jpg',
            'alt' => 'Test Alt Text',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/pictures');

        $response->assertStatus(200)
                 ->assertJsonFragment(['picture_id' => $picture->picture_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function create_a_picture()
    {
        Storage::fake('public');

        $user = User::create([
            'pseudo_user' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => bcrypt('password')
        ]);

        $data = [
            'picture_name' => 'Test2 Picture',
            'image' => UploadedFile::fake()->image('test2.jpg'),
            'alt' => 'Test Alt Text2',
            'user_id' => $user->user_id
        ];

        $response = $this->actingAs($user)->postJson('/api/pictures', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['picture_name' => 'Test2 Picture']);

        $this->assertDatabaseHas('pictures', ['picture_name' => 'Test2 Picture']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function show_a_picture()
    {
        $user = User::create([
            'pseudo_user' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => bcrypt('password')
        ]);

        $picture = Picture::create([
            'picture_name' => 'Test3 Picture',
            'image' => 'test3.jpg',
            'alt' => 'Test Alt Text3',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/pictures/' . $picture->picture_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['picture_id' => $picture->picture_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function update_a_picture()
    {
        $user = User::create([
            'pseudo_user' => 'Test User4',
            'email' => 'test4@example.com',
            'password' => bcrypt('password')
        ]);

        $picture = Picture::create([
            'picture_name' => 'Test Picture4',
            'image' => 'test4.jpg',
            'alt' => 'Test Alt Text4',
            'user_id' => $user->user_id
        ]);

        $data = [
            'picture_name' => 'Updated Picture Name',
            'alt' => 'Updated Alt Text'
        ];

        $response = $this->actingAs($user)->putJson('/api/pictures/' . $picture->picture_id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('pictures', ['picture_name' => 'Updated Picture Name']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function delete_a_picture()
    {
        $user = User::create([
            'pseudo_user' => 'Test5 User',
            'email' => 'test5@example.com',
            'password' => bcrypt('password')
        ]);

        $picture = Picture::create([
            'picture_name' => 'Test5 Picture',
            'image' => 'test5.jpg',
            'alt' => 'Test Alt Text5',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->deleteJson('/api/pictures/' . $picture->picture_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('pictures', ['picture_id' => $picture->picture_id]);
    }
}
