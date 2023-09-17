@extends('admin.layout')

@section('content')

    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
        <h1>تعديل المشروع</h1>
        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required style="width: 100%; height: 200px; border:0.5px dotted black">{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="content">المقال</label>
                <textarea name="content" class="form-control" id="content" style="height: 150px;">{{ old('content', $project->content) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            @if ($project->image)
            <div class="form-group">
                <label>الصورة الحالية:</label>
                <img src="{{ asset('images/'.$project->image) }}" alt="{{ $project->name }}" style="max-width: 100px; max-height: 100px;">
            </div>
        @endif
            <div class="form-group">
                <label for="project_link">رابط المشروع</label>
                <input type="text" name="project_link" id="project_link" value="{{ $project->project_link }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">تحديث المشروع</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#content',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });
        });
    </script>
@endsection
