@extends('admin.layout')

@section('content')
    <div class="container" style="direction: rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('إنشاء قسم') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.sections.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <textarea style="height: 100px" id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

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
                                    <input id="tiny_description" type="text" class="form-control @error('tiny_description') is-invalid @enderror" name="tiny_description" value="{{ old('tiny_description') }}" required autocomplete="tiny_description">
                            
                                    @error('tiny_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="gifs" class="col-md-4 col-form-label text-md-right">{{ __('اختر 3 صور') }}</label>
                                <div class="col-md-6">
                                    <input id="gifs" type="file" class="form-control-file @error('gifs') is-invalid @enderror" name="gifs[]" multiple accept=".jpg, .jpeg, .png, .gif, .svg" required>
                                    @error('gifs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tiny_image">صورة مصغرة</label>
                                <input type="file" name="tiny_image" class="form-control" accept="image/*" onchange="displaySelectedImage(this)">
                            </div>
                            <img id="selectedImage" src="#" alt="Selected Image" style="display: none;hieght:100px;width:100px;">
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('إنشاء') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function displaySelectedImage(input) {
    var selectedImage = document.getElementById('selectedImage');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            selectedImage.src = e.target.result;
            selectedImage.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

    </script>
@endsection
