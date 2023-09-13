@extends('admin.layout')

@section('content')
    <div class="container" style="direction: rtl;">
        @if(session('success'))
            <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('الأقسام') }}
                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <a href="{{ route('admin.sections.create') }}" class="btn btn-success float-right">إنشاء قسم</a>
                        @endif
                    </div>
                    <div class="card-body">
                        @foreach ($sections as $section)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <form action="{{ route('admin.sections.update_visibility') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section_id" value="{{ $section->id }}">
                                            <input type="hidden" name="visibility" value="{{ $section->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">
                                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                            <button type="submit" class="btn {{ $section->is_visible === 'is_visible' ? 'btn-success' : 'btn-secondary' }} btn-sm mr-2">
                                                <i class="fas {{ $section->is_visible === 'is_visible' ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                {{ $section->is_visible === 'is_visible' ? 'اخفاء' : 'اظهار' }}
                                            </button>
                                            @endif
                                        </form>
                                        @if(Auth::user()->role_id != 3)
                                        <a href="{{ route('admin.show_details', ['id' => $section->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-circle-right"></i> الذهاب إلى القسم
                                        </a> 
                                        @endif
                                    </div>
                                    <h5 class="card-title">{{ $section->name }}</h5>
                                    <p class="card-text">{{ $section->description }}</p>
                                    <p class="card-text">{{ $section->tiny_description }}</p>
                                    @if ($section->gif)
                                        <div class="image-container">
                                            @php
                                                $imageUrls = explode(',', $section->gif);
                                                $totalImages = count($imageUrls);
                                            @endphp
                                            @foreach ($imageUrls as $index => $imageUrl)
                                                <img src="{{ asset('images/' . trim($imageUrl)) }}" alt="{{ $section->name }}" class="img-thumbnail mx-1" style="max-width: 100px; max-height: 100px;">
                                            @endforeach
                                        </div>
                                    @else
                                    <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $news->name }}" style="max-width: 100px; max-height: 100px;">
                                    @endif
                                    
                                    <div class="mt-3">
                                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                        <a href="{{ route('admin.sections.edit', $section->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                                        <form action="{{ route('admin.sections.destroy', $section->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا القسم؟')">
                                                <i class="fas fa-trash"></i> حذف
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
