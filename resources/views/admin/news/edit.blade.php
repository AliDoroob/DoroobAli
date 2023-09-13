@extends('admin.layout')

@section('content')
    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
        @endif
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $news->name }}">
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" style="height: 200px;">{{ $news->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            @if ($news->image)
            <div class="form-group">
                <label>الصورة الحالية:</label>
                <img src="{{ asset('images/' . $news->image) }}" alt="{{ $news->name }}" style="max-width: 100px; max-height: 100px;">
            </div>
            @endif
            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
    </div>
@endsection
