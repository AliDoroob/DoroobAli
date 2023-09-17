@extends('layout')


@section('content')
    <style>
.login-form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.img-container {
    text-align: center;
    margin-bottom: 20px;
}
.container {
    padding: 16px;
}

.container label {
    font-weight: bold;
}

.container input[type="email"],
.container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-btn:hover {
    background-color: #0056b3;
}

.remember-me {
    display: block;
    margin-top: 10px;
}

.cancel-btn {
    background-color: grey;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cancel-btn:hover {
    background-color: #d32f2f;
}
    </style>
<nav class="navbar navbar-expand-lg" style="height: 100px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" style="font-size: 1.1em; display: flex; align-items: center;">
            <li class="nav-item active">
                <a class="nav-link" href="#">الخدمات <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #00b7ff">أخبار</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #0077ff">معرض الأعمال</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #00b7ff">مشاريعنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #0077ff">شركاءنا</a>
            </li>
        </ul>  
    </div>
</nav>
    <div class="container" style="direction: rtl">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
        @if(session('error'))
        <div class="alert alert-danger"><h3>{{ session('error') }}</h3></div>@endif
    <form action="{{route('login.submit')}}" method="post" class="login-form">
        @csrf
                <div class="container">
            <label for="email"><b>البريد الإلكتروني</b></label>
            <input type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
    
            <label for="psw"><b>كلمة المرور</b></label>
            <input type="password" placeholder="أدخل كلمة المرور" name="password" required>
    
            <button type="submit" class="login-btn float-right">تسجيل الدخول</button>
            <label class="remember-me">
                <input type="checkbox" checked="checked" name="remember">
                تذكرني
            </label>
        </div>
    
        <div class="container">
            <button type="button" class="cancel-btn">إلغاء</button>
        </div>
    </form>
</div>
    <br><br>
@endsection

