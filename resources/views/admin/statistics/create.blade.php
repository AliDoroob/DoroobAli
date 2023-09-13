@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl">
    @if(session('success'))
    <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
@endif
    <h1>إضافة إحصائية جديدة</h1>
    <form method="POST" action="{{ route('admin.statistics.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section_id" value="{{ $section->id }}">
       <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="number">العدد:</label>
            <input type="number" class="form-control" id="number" name="number" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">إضافة إحصائية</button>
        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
