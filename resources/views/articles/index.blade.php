<!-- resouces/views/articles/index.blade.php -->
@extends('layout') 
@section('content')
    <h1>Articles {!! link_to('articles/create', 'Add new article', ['class' => 'btn btn-primary']) !!}</h1>
    <hr/>     


    @foreach($articles as $article)
        <article>
            <h3>
                <a href="{{ url('articles', $article->id) }}"> {{-- articles/id --}}
                    #{{$article->id}} - {{ $article->title }}
                </a>
            </h3>
            <div class="body">
                {{ $article->body }}
            </div>
            <hr>
        </article>
    @endforeach

    {{ $articles->links() }}

@endsection