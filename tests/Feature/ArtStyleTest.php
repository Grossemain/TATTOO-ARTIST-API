<?php

namespace Tests\Feature;

use App\Models\ArtStyle;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class ArtStyleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Autres initialisations si nécessaire
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function list_art_styles()
    {
        // Assure-toi que les seeders ont bien été exécutés
        $this->artisan('db:seed');

        // Fait une requête GET à l'endpoint index
        $response = $this->getJson('/api/artstyles');

        // Récupère les ArtStyles de la base de données
        $artStyles = ArtStyle::all();

        // Vérifie que la réponse est correcte
        $response->assertStatus(200)
                 ->assertJsonCount($artStyles->count());

        foreach ($artStyles as $artStyle) {
            $response->assertJsonFragment(['artstyle_id' => $artStyle->artstyle_id]);
        }
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function create_an_artstyle()
    {
        Storage::fake('public');

        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => 2,
            'pseudo_user' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => bcrypt('password')
        ]);


        $data = [
            'name' => 'Test Art Style',
            'description' => 'Test Description',
            'img_style' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($user)->postJson('/api/artstyles', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Test Art Style']);

        $this->assertDatabaseHas('art_styles', ['name' => 'Test Art Style']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function show_an_artstyle()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => 2,
            'pseudo_user' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => bcrypt('password')
        ]);

        $artStyle = ArtStyle::create([
            'name' => 'Test Art Style',
            'description' => 'Test Description',
            'img_style' => 'test.jpg'
        ]);

        $response = $this->actingAs($user)->getJson('/api/artstyles/' . $artStyle->artstyle_id );

        $response->assertStatus(200)
                 ->assertJsonFragment(['artstyle_id' => $artStyle->artstyle_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function update_an_artstyle()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => 2,
            'pseudo_user' => 'Test User4',
            'email' => 'test4@example.com',
            'password' => bcrypt('password')
        ]);

        $artStyle = ArtStyle::create([
            'name' => 'Test Art Style',
            'description' => 'Test Description',
            'img_style' => 'test.jpg'
        ]);

        $data = [
            'name' => 'Updated Art Style',
            'description' => 'Updated Description'
        ];

        $response = $this->actingAs($user)->putJson('/api/artstyles/' . $artStyle->artstyle_id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('art_styles', ['name' => 'Updated Art Style']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function delete_an_artstyle()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => 2,
            'pseudo_user' => 'Test5 User',
            'email' => 'test5@example.com',
            'password' => bcrypt('password')
        ]);

        $artStyle = ArtStyle::create([
            'name' => 'Test Art Style',
            'description' => 'Test Description',
            'img_style' => 'test.jpg'
        ]);

        $response = $this->actingAs($user)->deleteJson('/api/artstyles/' . $artStyle->artstyle_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('art_styles', ['artstyle_id' => $artStyle->artstyle_id]);
    }
}
