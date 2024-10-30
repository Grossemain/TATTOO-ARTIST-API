<?php

namespace Tests\Feature;

use App\Models\FlashTattoo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class FlashTattooTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Other initialization code
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function list_flashtattoos()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);
        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);

        $flashTattoo = FlashTattoo::create([
            'title' => 'Test Flash Tattoo',
            'h1_title' => 'Test H1 Title',
            'content' => 'Test Content',
            'img_flashtattoo' => 'test.jpg',
            'disponibility' => 'true',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/flashtattoos');

        $response->assertStatus(200)
                 ->assertJsonFragment(['flashtattoo_id' => $flashTattoo->flashtattoo_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function create_a_flashtattoo()
    {
        Storage::fake('public');

        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => bcrypt('password')
        ]);

        $data = [
            'title' => 'Test Flash Tattoo',
            'h1_title' => 'Test H1 Title',
            'content' => 'Test Content',
            'disponibility' => 'true',
            'img_flashtattoo' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($user)->postJson('/api/flashtattoos', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Test Flash Tattoo']);

        $this->assertDatabaseHas('flashtattoos', ['title' => 'Test Flash Tattoo']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function show_a_flashtattoo()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => bcrypt('password')
        ]);

        $flashTattoo = FlashTattoo::create([
            'title' => 'Test Flash Tattoo',
            'h1_title' => 'Test H1 Title',
            'content' => 'Test Content',
            'img_flashtattoo' => 'test.jpg',
            'disponibility' => 'true',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/flashtattoos/' . $flashTattoo->flashtattoo_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['flashtattoo_id' => $flashTattoo->flashtattoo_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function update_a_flashtattoo()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test User4',
            'email' => 'test4@example.com',
            'password' => bcrypt('password')
        ]);

        $flashTattoo = FlashTattoo::create([
            'title' => 'Test Flash Tattoo',
            'h1_title' => 'Test H1 Title',
            'content' => 'Test Content',
            'img_flashtattoo' => 'test.jpg',
            'disponibility' => 'true',
            'user_id' => $user->user_id
        ]);

        $data = [
            'title' => 'Updated Flash Tattoo',
            'h1_title' => 'Updated H1 Title',
            'content' => 'Updated Content'
        ];

        $response = $this->actingAs($user)->putJson('/api/flashtattoos/' . $flashTattoo->flashtattoo_id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('flashtattoos', ['title' => 'Updated Flash Tattoo']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function delete_a_flashtattoo()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test5 User',
            'email' => 'test5@example.com',
            'password' => bcrypt('password')
        ]);

        $flashTattoo = FlashTattoo::create([
            'title' => 'Test Flash Tattoo',
            'h1_title' => 'Test H1 Title',
            'content' => 'Test Content',
            'img_flashtattoo' => 'test.jpg',
            'disponibility' => 'true',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->deleteJson('/api/flashtattoos/' . $flashTattoo->flashtattoo_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('flashtattoos', ['flashtattoo_id' => $flashTattoo->flashtattoo_id]);
    }
}
