<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $photo;
    public $successMessage;
    public $tempUrl;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function updatedPhoto()
    {
        try {
            $this->tempUrl = $this->photo->temporaryUrl();
        } catch (\Exception $e) {
            $this->tempUrl = ''; // placeholder image
        }

        $this->validate();
    }

    public function submitForm()
    {
        $this->validate();

        $imageToShow = $this->post->photo ?? null;

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToShow,
        ]);

        $this->successMessage = 'Post was updated successfully!';
        // session()->flash('success_message', 'Post was updated successfully!');
    }


    public function render()
    {
        return view('livewire.post-edit');
    }
}
