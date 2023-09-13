@extends('admin.layout')
@section('content')

    <div class="container" style="direction: rtl">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('تعديل الخدمة') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('اسم الخدمة') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name', $service->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('الوصف') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required rows="8" style="width: 100%; height: 200px;border:0.5px dotted black">{{ old('description', $service->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gif">{{ __('صورة') }}</label>
                                <input id="gif" type="file" class="form-control-file @error('gif') is-invalid @enderror" name="gif">
                                @error('gif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if ($service->gif)
                                    <div class="image-container">
                                        <img src="{{ asset('images/' . $service->gif) }}" alt="{{ $service->description }}" style="max-width: 100px; max-height: 100px;">
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('تحديث') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
