@extends('layout')

@section('content')
<nav class="navbar navbar-expand-lg " style="height: 100px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" style="font-size: 1.1em; display: flex; align-items: center;">
            <li class="nav-item active">
                <a class="nav-link" href="#">الخدمات<span class="sr-only">(current)</span></a>
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
<div class="container" style="direction: rtl;" >
    <h1 class="text-right">الشركاء</h1>
    <div class="row">
        @foreach ($partners as $partner)
        <div class="col-md-3 mb-4">
            <div class="card">
                @if ($partner->image)
                <img src="{{ asset('images/' . $partner->image) }}" alt="{{ $partner->name }}" class="card-img-top" > 
                @else
                <div class="card-img-top text-center py-4">لا توجد صورة</div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
