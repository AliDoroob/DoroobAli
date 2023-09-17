@extends('admin.layout')

@section('content')

    <div class="container" style="direction: rtl;">
        @if(session('success'))
        <div class="alert alert-primary"><h3>{{ session('success') }}</h3></div>
    @endif
        <h1>إنشاء مشروع جديد</h1>
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section_id" value="{{ $section->id }}">
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea style="height: 100px" class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="content">المقال</label>
                <textarea name="content" class="form-control" id="content" style="height: 150px;"></textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="project_link">Project Link:</label>
                <input type="text" name="project_link" id="project_link"  class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">إنشاء المشروع</button>
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
