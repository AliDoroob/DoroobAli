@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl">
    <h1>الإحصائيات</h1>
    <a href="{{ route('admin.statistics.create', ['section_id' => $section->id]) }}" class="btn btn-success float-right">إضافة إحصائية</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الصورة</th>
                <th>العدد</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
            <tr>
                <td>{{ $statistic->name }}</td>
                <td>
                    @if ($statistic->image)
                    <img src="{{ asset('images/' .$statistic->image) }}" alt="{{ $statistic->name }}" style="max-width: 100px; max-height: 100px;">
                    @else
                    <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $statistic->name }}" style="max-width: 100px; max-height: 100px;">
                    @endif
                </td>
                <td>{{ $statistic->number }}</td>
                <td>
                    <a href="{{ route('admin.statistics.edit', $statistic->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.statistics.destroy', $statistic->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذه الإحصائية؟')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
