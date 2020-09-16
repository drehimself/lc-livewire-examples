<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class CommentsSection extends Component
{
    public $post;
    public $comment;
    public $successMessage;

    protected $rules = [
        'comment' => 'required|min:4',
        'post' => 'required',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function postComment()
    {
        $this->validate();

        sleep(1);
        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'Guest',
            'content' => $this->comment,
        ]);

        $this->comment = '';

        $this->post = Post::find($this->post->id);

        $this->successMessage =  'Comment was posted!';
    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
