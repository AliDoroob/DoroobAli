@extends('admin.layout')

@section('content')

<div class="container" style="direction: rtl;">
    @if(session('success'))
    <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
<h1>تعديل العمل</h1>
<form method="POST" action="{{ route('admin.businesses.update', $business->id) }}" enctype="multipart/form-data">
@csrf
    @method('PUT')
                    <div class="form-group">
                   <label for="name">الاسم:</label>
                   <input type="text" class="form-control" id="name" name="name" value="{{ $business->name }}" required>
                   </div>
                   <div class="form-group">
                   <label for="description">الوصف:</label>
                   <textarea style="height: 100px" class="form-control" id="description" name="description" rows="4" required>{{ $business->description }}</textarea>
                   </div>
                   <div class="form-group">
                   <label for="image">الصورة:</label>
                   <input type="file" class="form-control-file" id="image" name="image">
                   </div>
                   @if ($business->image)
                   <div class="form-group">
                   <label>الصورة الحالية:</label>
                   <img src="{{ asset("images/".$business->image) }}" alt="{{ $business->name }}" style="max-width: 100px; max-height: 100px;">
                </div>
                   @endif
                   <button type="submit" class="btn btn-primary">تحديث العمل</button>
                   <a href="{{ route('admin.businesses.index') }}" class="btn btn-secondary">إلغاء</a>
                   </form>
                   </div>
      @endsection