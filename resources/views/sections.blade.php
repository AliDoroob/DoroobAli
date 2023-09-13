@extends('layout')

@section('content')
<style>
    .rtl-content {
   /* background: radial-gradient(closest-side, #5dbee7, rgba(0, 162, 255, 0.103)); */
   background: radial-gradient(circle at left, rgba(0, 162, 255, 0), #5dbee7bb 50%, rgba(0, 162, 255, 0) 20%),url({{asset("images/back10.jpg")}});
   background-repeat: no-repeat ,no-repeat;
   background-size: 90% auto,20% ,40% ;
   object-fit:cover;
   background-position-x: -70%,right,right ;
   background-position-y: -20%,bottom,top ;
   height: 800px;
   border-radius: 20%;
   padding-right: 15%;
    }
.section-title {
    font-size: 24px;
    color: #333;
}

.section-description {
    font-size: 18px;
    color: #777;
}

.overlay-image {
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.right-image {
    transform: rotate(-20deg) translateY(-15px);
}

.left-image {
    transform: rotate(20deg) translateY(-15px);
}

.center-image {
    transform: translateY(-15px);
}
    .image-container {
        position: relative;
    }

    .overlay-image {
        position: absolute;
        border-radius: 20px; /* Increased border radius */
        box-shadow: 30px 10px 25px rgba(0, 0, 0, 0.6); /* Increased shadow */
    }

    .right-image {
        right: 0;
    }

    .left-image {
        left: 0;
    }

    .center-image {
        transform: translateY(50%);
    }
    .card-content{
        padding-top: 50px
    }
    .vv{
        box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.6); /* Increased shadow */
    }
    .partners-section {
    position: relative;
    height: 300px; /* Adjust the height as needed */
}

.partners-section .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Overlay color and opacity */
    z-index: -1;
}

/* Add animation to the text */
.text-center {
    animation: slide-up 1s ease-in-out;
}

@keyframes slide-up {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

.btn-creative {
        background-color: #17a2b8;
        color: #fff;
        padding: 15px 30px;
        border: none;
        border-radius: 30px;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-creative:hover {
        background-color: #138496;
        transform: scale(1.05);
    }
    .gradient-bg {
        background: linear-gradient(to left, #1e5799, #2989d8);
    }
    .animated {
        opacity: 0;
        animation-fill-mode: forwards;
    }

    .fadeInDown {
        animation: fadeInDown 1s ease forwards;
    }

    .fadeInUp {
        animation: fadeInUp 1s ease forwards;
    }

    @keyframes fadeInDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .img-container {
        position: relative;
        overflow: hidden;
    }

    .img-container img {
        transition: transform 0.3s;
    }

    .img-container:hover img {
        transform: scale(1.1);
    }
    /* Custom CSS */
.section-title {
    font-size: 36px;
    margin-top: 50px;
    margin-bottom: 30px;
    color: #333;
    font-weight: bold;
}


.service-card {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.service-card:hover {
    transform: translateY(-10px);
}

@media (max-width: 768px) {
    .service-card {
        margin-bottom: 30px;
    }
}
.partner-row {
    display: flex;
    flex-wrap: wrap;
    transition: transform 20s linear infinite;
    overflow: hidden; /* Hide overflowing content */
    height: 400px; /* Adjust the container height as needed */
}

.image-overlay {
    position: relative;
    width: 100%;
    padding-bottom: 100%; /* Maintain aspect ratio (square) */
    background-size: cover;
    background-position: center;
    animation: loopImages 18s linear infinite; /* Use the linear timing function */
    overflow: hidden; /* Add this to hide content that overflows the square */
}

/* Example for an image inside .image-overlay */
.image-overlay img {
    width: 100%; /* Ensure the image fills the square container */
    height: auto; /* Maintain aspect ratio of the image */
    position: absolute;
    top: 0;
    left: 0;
}

@keyframes loopImages {
    0% {
        transform: translateY(100%);
    }
    100% {
        transform: translateY(-370%);
    }
}

   
.custom-image-container {
    width: 150px;
    transition: all 0.3s ease-in-out;
    border-radius: 15px; /* Add border radius */
}

.image-transition-container {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .image-transition-item {
        margin-right: 10px;
        width: 150px;
        overflow: hidden;
        transition: width 0.8s ease-out;
    }

    .custom-image-container {
        position: relative;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        transition: background-image 0.5s ease-in-out;
    }

    .image-transition-item img {
        opacity: 0;
        max-height: 450px;
        object-fit: cover;
        transition: opacity 0.5s ease-in-out;
    }

   
    .image-transition-item.active{
        width: 900px;
    }
    .image-transition-item:hover {
        width: 900px;
    }
    
    .image-transition-item.active.min-width {
    width: 150px;
}
.description-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    color: white;
    padding: 15px;
    opacity: 0;
    transform: translateY(100%);
    transition: opacity 0.3s, transform 0.3s;
}

.image-transition-item:hover .description-overlay {
    opacity: 1;
    transform: translateY(-30%);
}
.news-section {
    padding: 20px;
}

.news-item {
    background-color: white;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s, box-shadow 0.2s;
}

.news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

.news-item h2 {
    color: #333;
    margin-bottom: 10px;
}

.news-item p {
    color: #777;
}
.carousel-image {
    position: relative;
    width: 100%;
    height: 350px;
    background-size: cover;
    background-position: center;
}

.carousel-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 20px;
    color: white;
    width: 100%;
    box-sizing: border-box;
    transition: opacity 0.3s;
}

.carousel-caption h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.carousel-caption p {
    font-size: 16px;
    margin-bottom: 0;
}

.carousel-inner:hover .carousel-caption {
    opacity: 1;
}

.project-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .project-card-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .project-card-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .project-card h5 {
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 15px;
            font-size: 18px;
            color: #fff;
        }

        .project-card-text {
            color: #333;
        }

        .btn-outline-custom {
            border-color: #3498db;
            color: #3498db;
        }

        .btn-outline-custom:hover {
            background-color: #3498db;
            color: #fff;
        }
        .carousel-indicators {
    bottom: 0; /* Align indicators to the bottom */
    display: flex;
    justify-content: center; /* Center the dots horizontally */
    margin-bottom: 10px; /* Add some space from the carousel */
}

.carousel-indicators li {
    background-color: #ccc; /* Default dot color */
    border-radius: 50%; /* Make dots circular */
    width: 12px;
    height: 12px;
    margin: 0 5px; /* Space between dots */
    cursor: pointer;
}

.carousel-indicators .active {
    background-color: #007bff; /* Active dot color */
}


.ppa:hover {
    background: rgba(0, 174, 255, 0.829);
    border-radius: 60px;
}
.fact-item{
    border-radius: 60px;
    background: rgba(0, 183, 255, 0.322);
    
}
.wawa:hover {
    animation-name: headShake; /* Animation name from animate.css */
    animation-duration: 4s;    /* Adjust the animation duration as needed */
    animation-iteration-count: 1; /* Run the animation infinitely on hover */
}
.image-hover {
    transition: transform 0.3s;
}

.image-hover:hover {
    transform: scale(1.1);
}



.centered-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}







</style>
{{-- @foreach ($sections as $section) --}}

<div class="rtl-content">
    <nav class="navbar navbar-expand-lg" style="height: 100px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="font-size: 1.1em; display: flex; align-items: center;">
                <li class="nav-item active">
                    <a class="nav-link" href="#service">الخدمات <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news" style="color: #00b7ff">أخبار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#business" style="color: #0077ff">معرض الأعمال</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projects" style="color: #00b7ff">مشاريعنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#partner" style="color: #0077ff">شركاءنا</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" id="section">
        <div class="row ">
            <div class="col-md-7">
                <div class="card-content ">
                    <h5 class="card-title text-right section-title">{{ $section->name }}</h5>
                    <p class="card-text text-right section-description" style="width:70%;">{{ $section->description }}</p>
                </div>
            </div>            
            <div class="col-md-5 mb-4 d-flex align-items-center justify-content-center">
                <div class="image-container">
                    @if ($section->gif)
                    @php
                        $imageUrls = explode(',', $section->gif);
                        $totalImages = count($imageUrls);
                    @endphp
                    @foreach ($imageUrls as $index => $imageUrl)
                        <img src="{{ asset('images/' . trim($imageUrl)) }}" class="overlay-image {{ $index === 0 ? 'right-image' : ($index === $totalImages - 1 ? 'left-image' : 'center-image') }}" alt="{{ $section->name }}" style="width: {{ 150 + $index * 50 }}px; height: {{ 150 + $index * 50 }}px; margin-right: {{ $index * 20 }}px;" style="object-fit: cover;">
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @endforeach --}}
<br><br>
<section class="start-section arabic" id="statistics">
    <div class="">
        <div class="row">
            @php
                $visibleStatistics = $statistics->where('is_visible', 'is_visible');
            @endphp
            @if ($visibleStatistics->count() > 0)
                <div class="container">
                    <div class="row">
                        @foreach ($visibleStatistics as $statistic)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ppa">
                            <div class="fact-item text-center h-100 p-5">
                                <a href="/images/{{ $statistic->image }}" class="image-link">
                                    <svg width="70" height="76" viewBox="0 0 99 76" class="pp">
                                        <image href="/images/{{ $statistic->image }}" width="100%" height="100%" />
                                    </svg>
                                </a>
                                <br><br>
                                <b class="text-color-blue"><sup>+</sup><b class="fw-bold">{{ $statistic->number }}</b></b>
                                <br>
                                <b class="text-color-dark-green">{{ $statistic->name }}</b>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<div class="full-width-background" id="service">
    <div class="row">
        <div class="col-md-12">
            @php
                $visibleServices = $services->where('is_visible', 'is_visible');
            @endphp
            @if ($visibleServices->count() > 0)
                <div class="container text-center mt-5">
                    <h1 class="display-4">خدمات الإنتاج</h1>
                </div>
                <hr class="my-4">
                <div class="container">
                    <div class="row">
                        @foreach ($visibleServices as $service)
                        <div class="col-xl-4 mb-4 d-flex justify-content-center align-items-center">
                            <div class="solution-card text-center" id="card{{ $loop->index }}">
                                <div class="solution-card-inner">
                                    <div class="solution-card-header">
                                        @if ($service->gif)
                                        <img src="{{ asset('images/' . $service->gif) }}" class="card-img-top rounded image-hover" alt="{{ $service->name }}" style="width: 90px; height: 90px;object-fit:cover;">
                                        @endif
                                        <br><br>
                                        <h4 class="text-color-blue">{{ $service->name }}</h4>
                                    </div>
                                    <div class="solution-card-content">
                                        <p class="text-color-blue">{{ $service->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            @endif
        </div>
    </div>
</div>


    <br><br>
    @php
    $visibleNews = $news->where('is_visible', 'is_visible');                  
@endphp
@if ($visibleNews->count() > 0)   
    <div class="full-width-background" style="background: url('{{ asset('images/back1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: 130%;">
        <div class="container text-center" >
            <h1>الأخبار</h1>
        </div>
        <div class="container" id="news">
        <div class="row">
            <div class="col-md-6"  >
                    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" style="border-radius: 15px;">
                        <div class="carousel-inner" style="height: 60%; " >
                            @foreach ($visibleNews as $index => $new)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} mt-2" >
                                    <div class="carousel-image" style="background-image: linear-gradient(to top ,rgba(34, 166, 199, 0.476), rgba(255, 255, 255, 0.171)), url('{{ asset('images/' . $new->image) }}'); height: 415px; background-size: cover;border-radius: 10px;"></div>
                                    <div class="carousel-caption"  >
                                        <h2 style="padding-left: 20%;">  
                                   <a href="{{ route('newsown', ['id' => $new->id]) }}" style="text-decoration: none;color:white">{{ $new->name }}</a>
                                        </h2>
                                        <p style="padding-left: 20%;" >{{ $new->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
            </div>
       <div class="col-md-6">
    <div class="container mt-5 news-section" style="height: 60%;">
        <div class="row">
            @foreach ($visibleNews->sortByDesc('updated_at')->take(3) as $new)
                <div class="col-md-12 news-item text-right wawa" style="border-radius: 10px;">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/' . $new->image) }}" style="width: 57px; height: 57px; object-fit: cover; margin-right: 15px; border-radius: 10px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div>
                            <h5> <a href="{{ route('newsown', ['id' => $new->id]) }}" style="text-decoration: none; color: #333;">{{ $new->name }}</a></h5> 
                            <p>{{ $new->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
        </div>
    
    </div>
    <br><br>
    <div class="text-center">
        <a href="{{ route('news', ['section_id' => $section->id]) }}" class="btn btn-light btn-outline-primary">عرض المزيد</a>
    </div>
    </div>
    @endif
<br><br>
@php
$visibleBusinesses = $busnisses->where('is_visible', 'is_visible');
$businessCount = $visibleBusinesses->count();
@endphp
@if ($businessCount > 0)
<div class="full-width-background">
    <div class="container" id="business">
        <div class="row">
            <div class="col-md-12">
                <div class="container text-center">
                    <h1>معرض أعمال الانتاج</h1>
                </div>
                <div class="image-transition-container">
                    @foreach ($visibleBusinesses as $index => $business)
                    <div class="image-transition-item {{ $index === ($businessCount/2) ? 'active' : '' }}">
                        <div class="custom-image-container" style="background-image: url('{{ asset('images/' . $business->image) }}');">     
                            <img src="{{ asset('images/' . $business->image) }}" alt="{{ $business->name }}">
                            <div class="centered-icon">
                                <div class="play-icon">
                                    <a href="#" data-toggle="modal" data-target="#youtubeModal{{$index}}">
                                        <i class="fa fa-play-circle fa-4x" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="description-overlay">
                                <div class="description-content" style="color: white; text-align: right;">
                                    <h2 style="color: white; text-align: right;">{{ $business->name }}</h2>
                                    <p style="text-align: right;">{{ $business->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="youtubeModal{{$index}}" tabindex="-1" role="dialog" aria-labelledby="youtubeModalLabel{{$index}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="youtubeModalLabel{{$index}}">YouTube Video</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe width="100%" height="600" src="https://www.youtube.com/embed/{{ $business->youtube_link }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
              
                </div>
              
            </div>
        
        </div>
    
    </div>
</div>
<br>
<div class="text-center">
    <a href="{{ route('businesses', ['section_id' => $section->id]) }}" class="btn btn-light btn-outline-primary">عرض المزيد</a>
</div>
@endif


<br><br>



@php
$visibleProjects = $projects->where('is_visible', 'is_visible');
@endphp
@if ($visibleProjects->count() > 0)
<div class="full-width-background" style="background-image: url('{{ asset('images/back1.jpg') }}'); background-size: 30% auto; background-repeat: no-repeat; background-position-x: -25%; height: 500px;">
    <div class="container" id="projects">
    <div class="row">
     
            <div class="container text-center mt-5">
                <h1 class="display-4">مشاريعنا في الإنتاج</h1>
            </div>
            <hr class="my-4">
            <div class="container">
                <div class="row">
                    @foreach ($visibleProjects as $project)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="solution-card text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="circle-image">
                                        <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}" class="rounded-circle" width="100" height="100" style="object-fit:cover;">
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <h5 class="text-color-light">{{ $project->name }}</h5>
                                </div>
                                <br>
                                <p class="text-color-blue project-card-text fw-bold text-right">
                                    {{ $project->description }} 
                                </p>    
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
</div>
<br><br>

@php
$visiblePartners = $partners->where('is_visible', 'is_visible');
@endphp
@if ($visiblePartners->count() > 0)    
<div class="full-width-background" style="background:url('{{ asset('images/back0.jpg') }}')">
    <div class="container" id="partner">
    <div class="row partner-row">  
            <div class="container mt-3 text-center" style="position: relative; z-index: 1;">
                <h1 class="display-4">شركاؤنا</h1>
                <a href="{{ route('partners') }}" class="btn btn-light mt-3  btn-outline-primary" >الشركاء</a></div>
            <div class="container" style="position: relative; z-index: 0; opacity:0.7;">
                <div class="row">
                    @foreach ($visiblePartners as $partner)
                        <div class="col-md-3 mb-3">
                            <div class="image-overlay" style="background-image: none; width: 100%; height: 100%; ">
                                <img src="{{ asset('images/' . $partner->image) }}" alt="{{ $partner->name }}" style="width: 100%; height: 100%;object-fit:cover;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
        var activeItem = $(".image-transition-item.active");

        $(".image-transition-item").on("mouseenter", function () {
            // Set width to 900px for the hovered item
            $(this).css("width", "1300px");
            
            // Set width to 150px for all other items except the active item and the hovered item
            $(".image-transition-item").not(this).css("width", "150px");
        }).on("mouseleave", function () {
            // Reset width to 900px for all items
            $(".image-transition-item").css("width", "150px");
            
            // Set width to 150px for the active item
            activeItem.css("width", "1300px");
        });
           // Smooth scroll to the anchor links
           $('a.nav-link').on('click', function(event) {
            if (this.hash !== '') {
                event.preventDefault();
                const hash = this.hash;
                $('html, body').animate(
                    {
                        scrollTop: $(hash).offset().top
                    },
                    800 // Adjust the scroll duration as needed
                );
            }
        });
    });
    
</script>
<script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>

@endsection
