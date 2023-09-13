@extends('admin.layout') 

@section('content')
<style>
    /* Adjust the appearance of RTL pagination links */
    .pagination {
        justify-content: center; /* Align the pagination links to the right */
        direction: rtl; /* Set the text direction to right-to-left */
    }
</style>
<div class="container" style="direction: rtl;margin-left:20%;">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1> الأخبار</h1>
    <a href="{{ route('admin.news_public.create') }}" class="btn btn-primary">إنشاء جديد</a>
    <br><br>
    <div class="mb-3 input-group" style="width: 50%;">
        <input type="text" id="search" class="form-control form-control-lg" style="font-size: 18px;" placeholder="ابحث عن خبر">
        <div class="input-group-append">
            <span class="input-group-text" style="font-size: 35px; padding: 0.5rem;"><i class="fas fa-search"></i></span>
        </div>
    </div>    
    <table class="table">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publicNews as $news)
                <tr>
                    <td>{{ $news->name }}</td>
                    <td>{{ $news->description }}</td>
                    <td>
                        @if ($news->image)
                            <img src="{{ asset('public/images/' . $news->image) }}" alt="صورة الخبر" width="100">
                        @else
                            لا توجد صورة
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news_public.edit', $news->id) }}" class="btn btn-sm btn-primary">تحرير</a>
                        <form action="{{ route('admin.news_public.destroy', $news->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المقال؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $publicNews->links('pagination::bootstrap-4') }}
</div>
<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
@endsection
