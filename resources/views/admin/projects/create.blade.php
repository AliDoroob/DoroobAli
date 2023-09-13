@extends('admin.layout')

@section('content')

    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
        <h1>إنشاء مشروع جديد</h1>
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section_id" value="{{ $section->id }}">
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea style="height: 100px" class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">إنشاء المشروع</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
