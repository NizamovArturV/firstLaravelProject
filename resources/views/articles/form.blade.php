@php
    use App\Models\Article;
    $article = $article ?? new Article();
@endphp
<div class="mb-3">
    <label for="inputTitle" class="form-label">Название статьи</label>
    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Введите название статьи"
           value="{{old('title', $article->title)}}">
</div>
<div class="mb-3">
    <label for="inputCode" class="form-label">Символьный код статьи</label>
    <input type="text" name="code" class="form-control" id="inputCode" placeholder="Введите символьный код статьи"
           value="{{old('code', $article->code)}}">
</div>
<div class="mb-3">
    <label for="inputPreview" class="form-label">Краткое описание статьи</label>
    <input type="text" name="preview_text" class="form-control" id="inputPreview" placeholder="Введите краткое описание статьи"
           value="{{old('preview_text', $article->preview_text)}}">
</div>
<div class="mb-3">
    <label for="inputDetail" class="form-label">Описание статьи</label>
    <textarea name="detail_text" class="form-control" id="inputDetail" placeholder="Введите описание статьи">{{old('detail_text', $article->detail_text)}}</textarea>
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
        {{ (bool)old('is_published', $article->is_published) === true ? 'checked' : ''}}>
    <label class="form-check-label" for="is_published">Опубликовано</label>
</div>
<div class="mb-3 form-group">
    <label for="article_tag_select" class="form-label">Теги</label>
    <select multiple id="article_tag_select" class="form-control" name="tags[]">
        @foreach($tagsCloud as $tag)
            <option {{$article->tags->contains($tag) ? 'selected' : ''}} value="{{$tag->name}}">{{$tag->name}}</option>
        @endforeach
    </select>
</div>
@section('script')
    <script>
        $('#article_tag_select').select2({
            placeholder: 'Выберите тег',
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
@endsection
