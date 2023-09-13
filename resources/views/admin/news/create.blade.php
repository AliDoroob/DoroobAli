@extends('admin.layout')

@section('content')

    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
        @endif
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section_id" value="{{ $section->id }}">

          
            <div class="form-group">
                <label for="name">:الاسم:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea name="description" id="description" class="form-control" rows="3" style="height: 300px;"></textarea>
            </div>
            <div class="form-group">
                <label for="image">صورة</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
           
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
