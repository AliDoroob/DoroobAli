@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl;">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>قائمة الشركاء</h1>
    <a href="{{ route('admin.partners.create',['section_id' => $section ->id]) }}" class="btn btn-success float-right">إضافة شريك</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>
                        @if ($partner->image)
                            <img src="{{ asset('images/' . $partner->image) }}" alt="{{ $partner->name }}" style="max-width: 100px; max-height: 100px;">
                        @else
                        <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $news->name }}" style="max-width: 100px; max-height: 100px;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الشريك؟')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
