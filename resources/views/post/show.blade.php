@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-4xl">{{ $post->title }}</h2>
    @if ($post->photo)
        <div class="mt-4">
            <img src="{{ Storage::url($post->photo) }}" alt="cover photo">
        </div>
    @endif
    <div class="mt-8">
        {{ $post->content }}
        <div class="h-96 mt-8">Scroll down for comments...</div>
        <div class="h-96"></div>
        <div class="h-96"></div>
    </div>

    <hr>

    <livewire:comments-section :post="$post" />
</div>
@endsection
