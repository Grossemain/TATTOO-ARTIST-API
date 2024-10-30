<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Autres initialisations si nécessaire
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function list_articles()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);
        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'tattooshop_id' => 1
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'Test Content',
            'img' => 'test.jpg',
            'user_id' => $user->user_id,
            'tattooshop_id' => $user->tattooshop_id
        ]);
dd($article);
        $response = $this->actingAs($user)->getJson('/api/articles');

        $response->assertStatus(200)
                 ->assertJsonFragment(['article_id' => $article->article_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function create_an_article()
    {
        Storage::fake('public');

        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => bcrypt('password'),
            'tattooshop_id' => 1
        ]);

        $data = [
            'title' => 'Test Article',
            'content' => 'Test Content',
            'img' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($user)->postJson('/api/articles', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Test Article']);

        $this->assertDatabaseHas('articles', ['title' => 'Test Article']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function show_an_article()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => bcrypt('password'),
            'tattooshop_id' => 1
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'Test Content',
            'img' => 'test.jpg',
            'tattooshop_id' => $user->tattooshop_id
        ]);

        $response = $this->actingAs($user)->getJson('/api/articles/' . $article->article_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['article_id' => $article->article_id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function update_an_article()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test User4',
            'email' => 'test4@example.com',
            'password' => bcrypt('password'),
            'tattooshop_id' => 1
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'Test Content',
            'img' => 'test.jpg',
            'tattooshop_id' => $user->tattooshop_id
        ]);

        $data = [
            'title' => 'Updated Article',
            'content' => 'Updated Content'
        ];

        $response = $this->actingAs($user)->putJson('/api/articles/' . $article->article_id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Mise à jour avec succès']);

        $this->assertDatabaseHas('articles', ['title' => 'Updated Article']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_an_article()
    {
        $role = Role:: create([
            'name'=> 'user test',
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'pseudo_user' => 'Test5 User',
            'email' => 'test5@example.com',
            'password' => bcrypt('password'),
            'tattooshop_id' => 1
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'Test Content',
            'img' => 'test.jpg',
            'tattooshop_id' => $user->tattooshop_id
        ]);

        $response = $this->actingAs($user)->deleteJson('/api/articles/' . $article->article_id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'Supprimer avec succès']);

        $this->assertDatabaseMissing('articles', ['article_id' => $article->article_id]);
    }
}
