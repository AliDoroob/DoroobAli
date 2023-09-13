@extends('admin.layout')

@section('content')
<div class="container">
    <h2>تعديل المستخدم</h2>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور (اتركها فارغة للحفاظ على الحالية)</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="role_id">الدور</label>
            <select name="role_id" class="form-control" id="role_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
