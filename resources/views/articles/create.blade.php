@extends('layout.master')

@section('title')
    Создание статьи
@endsection

@section('content')

    @include('layout.errors')

    <form method="post" action="/articles">
        @csrf
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Название статьи</label>
            <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Введите название статьи" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label for="inputCode" class="form-label">Символьный код статьи</label>
            <input type="text" name="code" class="form-control" id="inputCode" placeholder="Введите символьный код статьи" value="{{old('code')}}">
        </div>
        <div class="mb-3">
            <label for="inputPreview" class="form-label">Краткое описание статьи</label>
            <input type="text" name="preview_text" class="form-control" id="inputPreview" placeholder="Введите краткое описание статьи" value="{{old('preview_text')}}">
        </div>
        <div class="mb-3">
            <label for="inputDetail" class="form-label">Описание статьи</label>
            <textarea name="detail_text" class="form-control" id="inputDetail" placeholder="Введите описание статьи">{{old('detail_text')}}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : ''}}>
            <label class="form-check-label" for="is_published">Опубликовано</label>
        </div>
        <button type="submit" class="btn btn-primary">Создать статью</button>
    </form>


@endsection
