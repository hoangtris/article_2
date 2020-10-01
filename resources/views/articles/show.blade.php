<!-- resouces/views/articles/show.blade.php -->
@extends('layout')
@section('content')
    <h1>{{ $article->title }}</h1>
    <label>Publish at: {{ $article->published_at }}</label>
    <hr/>
    <article>
        <div class="body">{{ $article->body }}</div>
    </article><br>

    {{-- Và lúc show bài viết cũng tương tự với nút Edit và Delete --}}
    @if (Auth::check())
        <br/>
        {!! link_to(route('articles.edit', [$article->id]), 'Edit', ['class' => 'btn btn-primary']) !!}
        <br/>
        <br/>
        {!! delete_form(['articles', $article->id]) !!}
    @endif

@endsection