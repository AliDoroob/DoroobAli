@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('تعديل القسم') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.sections.update', $section->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $section->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('الوصف') }}</label>

                                <div class="col-md-6">
                                    <textarea style="height: 100px" id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description', $section->description) }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tiny_description" class="col-md-4 col-form-label text-md-right">{{ __('الوصف الصغير') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="tiny_description" type="text" class="form-control @error('tiny_description') is-invalid @enderror" name="tiny_description" value="{{ old('tiny_description', $section->tiny_description) }}" required autocomplete="tiny_description">
                            
                                    @error('tiny_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="gif" class="col-md-4 col-form-label text-md-right">{{ __('صورة GIF') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="gif" type="file" class="form-control-file @error('gif') is-invalid @enderror" name="gifs[]" multiple>
                                    
                                    @error('gifs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    <div class="image-container">
                                        @php
                                            $imageUrls = explode(',', $section->gif);
                                            $totalImages = count($imageUrls);
                                        @endphp
                                        @foreach ($imageUrls as $index => $imageUrl)
                                            <img src="{{ asset('images/' . trim($imageUrl)) }}" alt="{{ $section->name }}" style="max-width: 100px; max-height: 100px;">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tiny_image">صورة مصغرة</label>
                                <input type="file" name="tiny_image" class="form-control" accept="image/*">
                                @if ($section->tiny_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/'.$section->tiny_image) }}" alt="{{ $section->name }}" width="50">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تحديث القسم') }}
                                    </button>
                                    <a href="{{ route('admin.sections.index') }}" class="btn btn-secondary">
                                        {{ __('إلغاء') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
