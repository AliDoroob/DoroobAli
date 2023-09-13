@extends('admin.layout')
@section('content')
    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <h1>المشاريع</h1>
        <a href="{{ route('admin.projects.create', $section->id) }}" class="btn btn-success float-right" style="">إضافة مشروع</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            @if ($project->image)
                                <img src="{{ asset('images/' .$project->image) }}" alt="{{ $project->name }}" style="max-width: 100px; max-height: 100px;">
                            @else
                            <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $news->name }}" style="max-width: 100px; max-height: 100px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المشروع؟')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
