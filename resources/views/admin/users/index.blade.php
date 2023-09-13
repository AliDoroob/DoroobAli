@extends('admin.layout')

@section('content')
<div class="container" style="direction: rtl;">
    @if(session('success'))
    <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
@endif
    <h2>قائمة المستخدمين</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-success"> <h3>إنشاء مستخدم جديد</h3> </a>
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الدور</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><h3>{{ $user->name }}</h3></td>
                <td><h3>{{ $user->email }}</h3></td>
                <td><h3>{{ $user->role->name }}</h3></td> <!-- Display role name -->
                <td>
               <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">تعديل</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المستخدم؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
