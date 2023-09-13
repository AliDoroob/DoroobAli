@extends('admin.layout')
@section('content')
    <style>
        .container {
            direction: rtl;
        }

        .alert {
            margin-top: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .image-cell {
            text-align: center;
            vertical-align: middle;
        }

        .table-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        .no-image {
            color: #888;
        }

        .action-cell {
            text-align: center;
            vertical-align: middle;
        }

        .inline-form {
            display: inline-block;
            margin-left: 5px;
        }
    </style>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('قائمة الخدمات') }}</h4>
                        <a href="{{ route('admin.services.create', ['section_id' => $section->id]) }}" class="btn btn-success float-right">إضافة خدمة</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>                                     
                                           <th scope="col">الاسم</th>
                                        <th scope="col">الوصف</th>
                                        <th scope="col">صورة</th>
                                        <th scope="col">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td class="image-cell">
                                                @if ($service->gif)
                                                    <img src="{{ asset('images/' . $service->gif) }}" alt="{{ $service->description }}" class="table-image">
                                                @else
                                                <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $news->name }}" style="max-width: 100px; max-height: 100px;">
                                                @endif
                                            </td>
  
                                            <td class="action-cell">
                                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> تعديل</a>
                                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذه الخدمة؟')"><i class="fas fa-trash"></i> حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
