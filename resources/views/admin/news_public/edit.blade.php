@extends('admin.layout')

@section('content')
<style>
    /* Custom CSS for styling the form */
    .container {
        margin-top: 20px;
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
        width: 100%;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 20px;
    }

    select {
        height: 50px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-secondary {
        background-color: #ccc;
        color: #333;
    }

    .alert {
        margin-top: 20px;
    }
    .form-row {
        display: flex;
        justify-content: space-between;
    }

    .form-group {
        flex-basis: calc(50% - 10px); /* Adjust the width as needed */
    }
    /* Custom styles for the select elements */
.custom-select {
    height: 50px;
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: normal;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    background-color: #fff;
    background-clip: padding-box;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Style when the select is focused */
.custom-select:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Style for the dropdown arrow */
.custom-select::after {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}
 /* Style the selected options with a larger size */
/* Style for selected choices */
.select2-selection__choice {
    font-weight: bold;
    padding: 10px 20px; /* Set padding as needed */
    background-color: #b3b7bb;
    color: white;
    border-radius: 90px;
    margin-right: 5px; /* Adjust spacing as needed */
   height: 50px;
}

.select2-selection__choice__display{
    font-size: 20px;
}

</style>

<div class="container" style="direction: rtl;">
    @if(session('success'))
    <div class="alert alert-primary">{{ session('success') }}</div>
    @endif
    <h1>تحرير مقال الأخبار </h1>
    <form method="POST" action="{{ route('admin.news_public.update', $news->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="section_id">القسم:</label>
            <select name="section_id" class="form-control" id="section_id">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $section->id == $news->section_id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" >
            <label for="news_id">تصنيفات أخرى:</label>
            <select name="news_id[]" class="form-control js-example-basic-single" id="news_id" multiple>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ in_array($section->id, $news->news_id) ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_public"> حالة الأخبار </label>
            <select name="is_public" class="form-control custom-select" id="is_public">
                <option value="is_public" {{ $news->is_public === 'is_public' ? 'selected' : '' }}>عامة</option>
                <option value="not_public" {{ $news->is_public === 'not_public' ? 'selected' : '' }}>غير عامة</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">العنوان:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $news->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف:</label>
            <textarea name="description" class="form-control" id="description" required>{{ $news->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">المقال:</label>
            <textarea name="content" class="form-control" id="content" style="height: 150px;">{{ $news->content }}</textarea>
        </div>

        <div class="container" style="width: 100%; height: 200px;color:white;">
            <label for="">صورة الخبر</label>
            <input type="file" name="image" class="dropify" data-height="100" data-default-file="{{ asset('images/' . $news->image) }}" />
        </div>
        
      
        <div class="form-group">
            <label for="datetime">تاريخ ووقت النشر:</label>
            <input type="datetime-local" name="datetime" class="form-control" id="datetime" value="{{ \Carbon\Carbon::parse($news->datetime)->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('section_id');
        var newsSelectElement = document.getElementById('news_id');
        var inputElementSection = document.getElementById('selected_section'); // Input field for section_id
        var inputElementNews = document.getElementById('selected_news'); // Input field for news_id

        selectElement.addEventListener('change', updateSelectedSections);
        newsSelectElement.addEventListener('change', updateSelectedNews);

        function updateSelectedSections() {
            var selectedSections = [];
            var selectedOptions = Array.from(selectElement.selectedOptions);
            selectedSections = selectedSections.concat(selectedOptions.map(function(option) {
                return option.text;
            }));

            // Update the "selected_section" input field with selected sections
            $(inputElementSection).val(selectedSections).trigger('change');
        }

        function updateSelectedNews() {
            var selectedNews = [];
            var newsSelectElement = document.getElementById('news_id');
            var inputElementNews = document.getElementById('selected_news'); // Input field for selected news

            // Loop through selected options and add their text to the selectedNews array
            for (var i = 0; i < newsSelectElement.options.length; i++) {
                if (newsSelectElement.options[i].selected) {
                    selectedNews.push(newsSelectElement.options[i].text);
                }
            }

            // Set the value of the "selected_news" input field with the selected news
            inputElementNews.value = selectedNews.join(', '); // Join selected news with a comma and space
        }
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
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
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });

});
</script>
<script>


$('.dropify').dropify();
$('.js-example-basic-single').select2();


</script>
@endsection
