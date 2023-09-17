@extends('layout') {{-- Use your layout file as needed --}}

@section('content')
<nav class="navbar navbar-expand-lg" style="height: 100px;">
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
<div class="" style="margin-right: 9%;width:60%;height:1000px;" >
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body text-right">
                    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{ $business->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                    <p class="text-dark">
                        <i class="fas fa-clock"></i>
                         {{ $business->datetime }}
                    </p>
                  <h4>{{ $business->name }}</h4>
                    <p class="text-dark">{{ $business->description }}</p>
                  <div style=""> 
                    {!! $business->content !!}
                </div>  
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
