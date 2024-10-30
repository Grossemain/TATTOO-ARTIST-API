<?php

namespace Tests\Feature;

use App\Models\TattooShop;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class TattooShopTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Autres initialisations si nécessaire
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function list_tattooshops()
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

        $tattooShop = TattooShop::create([
            'name' => 'Test Tattoo Shop',
            'adresse' => '123 Test Address',
            'city' => 'Test City',
            'departement' => 'Test Department',
            'meta_description' => 'Test Description',
            'img_tattooshop' => 'test.jpg',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/tattooshops');

        $response->assertStatus(200)
                 ->assertJsonFragment(['tattooshop_id' => $tattooShop->tattooshop_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function create_a_tattooshop()
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
            'name' => 'Test Tattoo Shop',
            'adresse' => '123 Test Address',
            'city' => 'Test City',
            'departement' => 'Test Department',
            'meta_description' => 'Test Description',
            'img_tattooshop' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($user)->postJson('/api/tattooshops', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Test Tattoo Shop']);

        $this->assertDatabaseHas('tattoo_shops', ['name' => 'Test Tattoo Shop']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function show_a_tattooshop()
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

        $tattooShop = TattooShop::create([
            'name' => 'Test Tattoo Shop',
            'adresse' => '123 Test Address',
            'city' => 'Test City',
            'departement' => 'Test Department',
            'meta_description' => 'Test Description',
            'img_tattooshop' => 'test.jpg',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/tattooshops/' . $tattooShop->tattooshop_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['tattooshop_id' => $tattooShop->tattooshop_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function update_a_tattooshop()
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

        $tattooShop = TattooShop::create([
            'name' => 'Test Tattoo Shop',
            'adresse' => '123 Test Address',
            'city' => 'Test City',
            'departement' => 'Test Department',
            'meta_description' => 'Test Description',
            'img_tattooshop' => 'test.jpg',
            'user_id' => $user->user_id
        ]);

        $data = [
            'name' => 'Updated Tattoo Shop',
            'adresse' => '456 Updated Address',
            'city' => 'Updated City',
            'departement' => 'Updated Department',
            'meta_description' => 'Updated Description'
        ];

        $response = $this->actingAs($user)->putJson('/api/tattooshops/' . $tattooShop->tattooshop_id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('tattoo_shops', ['name' => 'Updated Tattoo Shop']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_a_tattooshop()
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

        $tattooShop = TattooShop::create([
            'name' => 'Test Tattoo Shop',
            'adresse' => '123 Test Address',
            'city' => 'Test City',
            'departement' => 'Test Department',
            'meta_description' => 'Test Description',
            'img_tattooshop' => 'test.jpg',
            'user_id' => $user->user_id
        ]);

        $response = $this->actingAs($user)->deleteJson('/api/tattooshops/' . $tattooShop->tattooshop_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('tattoo_shops', ['tattooshop_id' => $tattooShop->tattooshop_id]);
    }
}
