<!-- resouces/views/articles/index.blade.php -->
@extends('layout') 
@section('content')
    <h1>Articles
    {{-- chỉ hiển thị nút Create ở list các bài viết khi user đang login --}}
    @if (Auth::check())
        {!! link_to('articles/create', 'Create', ['class' => 'btn btn-primary']) !!}
    @endif
    
    </h1>
    <hr/>     


    @foreach($articles as $article)
        <article>
            <h3>
                <a href="{{ url('articles', $article->id) }}"> {{-- articles/id --}}
                    #{{$article->id}} - {{ $article->title }}
                </a>
            </h3>
            <label>Publish at: {{ $article->published_at }}</label>
            <div class="body">
                {{ $article->body }}
            </div>
            <hr>
        </article>
    @endforeach

    {{ $articles->links() }}

@endsection