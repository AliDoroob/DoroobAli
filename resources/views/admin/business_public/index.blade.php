@extends('admin.layout')

@section('content')
<style>
    /* Adjust the appearance of RTL pagination links */
    .pagination {
        justify-content: center; /* Align the pagination links to the right */
        direction: rtl; /* Set the text direction to right-to-left */
    }
</style>
<div class="container" style="direction: rtl; margin-left: 20%;">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>الأعمال</h1>
    <a href="{{ route('admin.business_public.create') }}" class="btn btn-primary">إنشاء جديد</a>
    <br><br>
    <div class="mb-3 input-group" style="width: 50%;">
        <input type="text" id="search" class="form-control form-control-lg" style="font-size: 18px;" placeholder="ابحث عن عمل">
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
            @foreach($businessPublic as $business)
            <tr>
                <td>{{ $business->name }}</td>
                <td>{{ $business->description }}</td>
                <td>
                    @if ($business->image)
                    <img src="{{ asset('public/images/' . $business->image) }}" alt="صورة العمل" width="100">
                    @else
                    لا توجد صورة
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.business_public.edit', $business->id) }}"
                        class="btn btn-md btn-primary">تحرير</a>
                    <form action="{{ route('admin.business_public.destroy', $business->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-md btn-danger"
                            onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا العمل؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $businessPublic->links('pagination::bootstrap-4') }}
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
