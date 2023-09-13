@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl;margin-left:20%;">
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<h1>الأعمال</h1>
@if (isset($section))
<a href="{{ route('admin.businesses.create', ['section_id' => $section->id]) }}" class="btn btn-success float-right">إضافة عمل جديد</a>
@endif
<table class="table" >
       <thead>
           <tr>
               <th>الاسم</th>
               <th>الوصف</th>
               <th>الصورة</th>
               <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
@foreach ($businesses as $business)
<tr>
<td>{{ $business->name }}</td>
<td>{{ $business->description }}</td>
<td>
@if ($business->image)
<img src="{{ asset('images/' .$business->image) }}" alt="{{ $business->name }}" style="max-width: 100px; max-height: 100px;">
@else
لا توجد صورة
@endif
</td>
<td>
<a href="{{ route('admin.businesses.edit', $business->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
<form action="{{ route('admin.businesses.destroy', $business->id) }}" method="POST" style="display: inline-block;">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا العمل؟')"><i class="fas fa-trash"></i></button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection