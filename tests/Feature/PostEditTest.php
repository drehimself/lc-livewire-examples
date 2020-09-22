<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Http\Livewire\PostEdit;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostEditTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_edit_page_contains_post_edit_livewire_component()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        $this->get(route('post.edit', $post))
            ->assertSeeLivewire('post-edit');
    }

    /** @test */
    public function post_edit_page_form_works()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Livewire::test(PostEdit::class, [ 'post' => $post ])
            ->set('title', 'New Title')
            ->set('content', 'New content')
            ->call('submitForm')
            ->assertSee('Post was updated successfully');

        $post->refresh();

        $this->assertEquals('New Title', $post->title);
        $this->assertEquals('New content', $post->content);
    }

    /** @test */
    public function post_edit_page_upload_works_for_images()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Storage::fake('public');

        $file = UploadedFile::fake()->image('photo.jpg');

        Livewire::test(PostEdit::class, [ 'post' => $post ])
            ->set('title', 'New Title')
            ->set('content', 'New content')
            ->set('photo', $file)
            ->call('submitForm')
            ->assertSee('Post was updated successfully');

        $post->refresh();

        $this->assertNotNull($post->photo);
        Storage::disk('public')->assertExists($post->photo);
    }

    /** @test */
    public function post_edit_page_upload_does_not_work_for_non_images()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Storage::fake('public');

        $file = UploadedFile::fake()->create('document.pdf', 1000);

        Livewire::test(PostEdit::class, [ 'post' => $post ])
            ->set('title', 'New Title')
            ->set('content', 'New content')
            ->set('photo', $file)
            ->call('submitForm')
            ->assertSee('The photo must be an image')
            ->assertHasErrors(['photo' => 'image']);

        $post->refresh();

        $this->assertNull($post->photo);
        Storage::disk('public')->assertMissing($post->photo);
    }
}
