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
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            @foreach ($publicNews as $newsItem)
            <div class="col-md-3 mb-4">
                <div class="card" style="border: none; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px; display: flex; flex-direction: column; height: 100%;">
                    <img src="{{ asset('images/' . $newsItem->image) }}" class="card-img-top" alt="{{ $newsItem->name }}" style="border-radius: 15px 15px 0 0; object-fit: cover; height: 200px;">
                    <div class="card-body" style="flex-grow: 1;">
                        <h6 class="card-title" style="font-size: 1.5rem;">
                            <a href="{{ route('newsown', ['id' => $newsItem->id]) }}" style="text-decoration: none; color: #333;">{{ $newsItem->name }}</a>
                        </h6>
                        <p class="card-text" style="font-size: 1rem; color: #666;">{{ $newsItem->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
