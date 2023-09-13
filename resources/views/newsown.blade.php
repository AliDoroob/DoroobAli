@extends('layout')

@section('content')
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




<div class="" style="margin-right: 9%; width: 40%; height: 900px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body text-right">
                    <img src="{{ asset('images/' . $news->image) }}" class="img-fluid mb-3" alt="{{ $news->title }}">
                    <p class="text-dark">
                        <i class="fas fa-clock"></i>
                        {{ $news->datetime }}
                    </p>
                    <h4>{{ $news->name }}</h4>
                    <p class="text-dark">{{ $news->description }}</p>
                    <div> 
                        {!! $news->content !!}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>












@endsection