@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl">
    <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>

    <h1>تعديل الإحصائية</h1>
    <form method="POST" action="{{ route('admin.statistics.update', $statistic->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $statistic->name) }}" required>
        </div>
        <div class="form-group">
            <label for="number">العدد:</label>
            <input type="number" class="form-control" id="number" name="number" value="{{ old('number', $statistic->number) }}" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        @if ($statistic->image)
        <div class="form-group">
            <label>الصورة الحالية:</label>
            <img src="{{ asset('images/' . $statistic->image) }}" alt="{{ $statistic->name }}" style="max-width: 100px; max-height: 100px;">
        </div>
        @endif
        <button type="submit" class="btn btn-primary">تحديث الإحصائية</button>
        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
