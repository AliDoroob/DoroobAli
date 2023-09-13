@extends('admin.layout')

@section('content')

<div class="container" style="direction: rtl">
    @if(session('success'))
<div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
@endif
    <h1>تعديل الشريك</h1>
    <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $partner->name) }}" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        @if ($partner->image)
            <div class="form-group">
                <label>الصورة الحالية:</label>
                <img src="{{ asset('images/' . $partner->image) }}" alt="{{ $partner->name }}" style="max-width: 100px; max-height: 100px;">
            </div>
        @endif
        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
