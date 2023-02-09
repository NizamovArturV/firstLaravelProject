@php
$tags = $tags ?? collect();

@endphp

@if($tags->isNotEmpty())

    <div>
        @foreach($tags as $tag)
            <a href="{{route('articles.tag', ['tag' => $tag->name])}}" class="badge badge-secondary">{{$tag->name}}</a>
        @endforeach
    </div>

@endif
