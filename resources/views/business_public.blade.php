@extends('layout')

@section('content')
<style>
    /* Custom CSS for the card */
    .custom-card {
        border: none;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .custom-card img {
        border-radius: 15px 15px 0 0;
        object-fit: cover;
        height: 200px;
    }

    .custom-card .card-body {
        flex-grow: 1;
    }

    .custom-card h6.card-title a {
        text-decoration: none;
        color: #333;
        font-size: 1.5rem;
    }

    .custom-card p.card-text {
        font-size: 1rem;
        color: #666;
    }

    .custom-card .btn-primary {
        font-size: 1rem;
        border-radius: 5px;
    }

    .custom-card .btn-primary i {
        margin-left: 5px;
    }
</style>

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

<div class="container" style="margin-top: 20px;">
    <div class="row">
        @foreach ($businessPublic as $business)
        <div class="col-md-3 mb-4">
            <div class="custom-card"  >
                <img src="{{ asset('images/' . $business->image) }}" class="card-img-top" alt="{{ $business->name }}">
                <div class="card-body text-right">
                    <h6 class="card-title">
                        <a href="{{ route('businessesown', ['id' => $business->id]) }}" style="text-decoration: none; color: #333;">{{ $business->name }}</a>
                    </h6>
                    <p class="card-text">{{ $business->description }}</p>
                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
