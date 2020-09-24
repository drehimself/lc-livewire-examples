<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\TagsComponent;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagsComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function main_page_contains_tags_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('tags-component');
    }

    /** @test */
    public function loads_existing_tags_correctly()
    {
        $tagA = Tag::create([ 'name' => 'one' ]);
        $tagB = Tag::create([ 'name' => 'two' ]);

        Livewire::test(TagsComponent::class)
            ->assertSet('tags', json_encode(['one', 'two']));
    }

    /** @test */
    public function adds_tags_correctly()
    {
        $tagA = Tag::create([ 'name' => 'one' ]);
        $tagB = Tag::create([ 'name' => 'two' ]);

        Livewire::test(TagsComponent::class)
            ->emit('tagAdded', 'three')
            ->assertEmitted('tagAddedFromBackend', 'three');

        $this->assertDatabaseHas('tags', [
            'name' => 'three',
        ]);
    }

    /** @test */
    public function removes_tags_correctly()
    {
        $tagA = Tag::create([ 'name' => 'one' ]);
        $tagB = Tag::create([ 'name' => 'two' ]);

        Livewire::test(TagsComponent::class)
            ->emit('tagRemoved', 'two');

        $this->assertDatabaseMissing('tags', [
            'name' => 'two',
        ]);
    }
}
