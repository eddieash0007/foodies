@extends('frontend.layouts.front')

@section('content')
<div class="grid portfoliogrid">
    @foreach ($posts as $post)
        <article class="hentry">
            <header class="entry-header">
                <div class="entry-thumbnail">
                    <a href="{{route('frontend.post.single', ['slug'=> $post->slug])}}"><img
                            src="{{asset($post->image)}}"
                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="{{$post->title}}" /></a>
                </div>
                <h2 class="entry-title"><a href="{{route('frontend.post.single', ['slug'=> $post->slug])}}" rel="bookmark">{{$post->title}}</a></h2>
                @foreach ($post->tags as $tag)               
                    <a class='portfoliotype' href='portfolio-category.html'>{{$tag->name}}</a>
                @endforeach
            </header>
        </article>
    @endforeach

</div>
@endsection
