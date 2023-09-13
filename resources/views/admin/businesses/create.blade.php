@extends('admin.layout')

@section('content')

    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
        @endif
        <h1>انشاء معرض أعمال</h1>
        <form method="POST" action="{{ route('admin.businesses.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section_id" value="{{ $section->id }}">

            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required style="width: 100%; height: 200px;border:0.5px dotted black"></textarea>
            </div>
            <div class="form-group">
                <label for="image">صورة:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">انشاء صورة لمعرض الأعمال</button>
            <a href="{{ route('admin.businesses.index') }}" class="btn btn-secondary">الغاء</a>
        </form>
    </div>
@endsection
