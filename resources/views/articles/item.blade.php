<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('articles.show', [$article])}}">{{$article->title}}</a></h2>
    @include('layout.tags', ['tags' => $article->tags])
    <p class="blog-post-meta">{{$article->created_at->toFormattedDateString()}}</p>

    {{$article->preview_text}}
</div>
