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
                        {{ __('تفاصيل القسم') }}
                    </div>
                    <div class="card-body">
                        <h2>{{ $section->name }}</h2>
                        <p>{{ $section->description }}</p>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
                                <a href="{{ route('admin.section.services.index', $section->id) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-cogs"></i> الخدمات</h5>
                                            <form action="{{ route('update_section_service_visibility', $section->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="visibility" value="{{ $section->services->isEmpty() || $section->services->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">     
                                                @foreach ($section->services as $service)
                                                    <input type="hidden" name="service_ids[]" value="{{ $service->id }}">
                                                @endforeach
                                                @if ($section->services->isNotEmpty())
                                                    <button type="submit" class="btn {{ $section->services->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                                                        {{ $section->services->first()->is_visible === 'is_visible' ? 'إخفاء' : 'إظهار' }} الخدمات في هذا القسم
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                            
                            <div class="col-md-3 mb-4">
                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 5)
                                <a href="{{ route('admin.section.news.index', ['section_id' => $section->id]) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-newspaper"></i> الأخبار</h5>
                                            <form action="{{ route('update_section_news_visibility', $section->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="visibility" value="{{ $section->news->isNotEmpty() && $section->news->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">
                                                
                                                @foreach ($section->news as $newsItem)
                                                    <input type="hidden" name="news_ids[]" value="{{ $newsItem->id }}">
                                                @endforeach
                                                
                                                @if ($section->news->isNotEmpty())
                                                    <button type="submit" class="btn {{ $section->news->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                                                        {{ $section->news->first()->is_visible === 'is_visible' ? 'إخفاء' : 'إظهار' }} الأخبار في هذا القسم
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                            
                            <div class="col-md-3 mb-4">
                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 9)
                                <a href="{{ route('admin.section.businesses.index', $section->id) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-building"></i> معرض الأعمال</h5>
                                            <form action="{{ route('update_section_businesses_visibility', $section->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="visibility" value="{{ $section->businesses->isNotEmpty() && $section->businesses->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">    
                                                @foreach ($section->businesses as $business)
                                                    <input type="hidden" name="business_ids[]" value="{{ $business->id }}">
                                                @endforeach
                                                
                                                @if ($section->businesses->isNotEmpty())
                                                    <button type="submit" class="btn {{ $section->businesses->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                                                        {{ $section->businesses->first()->is_visible === 'is_visible' ? 'إخفاء' : 'إظهار' }} الأخبار في هذا القسم
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                            
                            <!-- Projects Section -->
                            <div class="col-md-3 mb-4">
                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 6)
                                <a href="{{ route('admin.section.projects.index', ['section_id' => $section->id]) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-project-diagram"></i> المشاريع</h5>
                                            <!-- Form to update visibility -->
                                            <form action="{{ route('update_section_projects_visibility', $section->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="visibility" value="{{ $section->projects->isEmpty() || $section->projects->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">
                                                
                                                @foreach ($section->projects as $project)
                                                    <input type="hidden" name="project_ids[]" value="{{ $project->id }}">
                                                @endforeach
                                                
                                                <button type="submit" class="btn {{ !empty($section->projects->first()) && $section->projects->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                                                    @if (!empty($section->projects->first()) && $section->projects->first()->is_visible === 'is_visible')
                                                        <i class="fas fa-eye"></i> في حالة ظهور
                                                    @else
                                                        <i class="fas fa-eye-slash"></i> في حالة اخفاء
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                   
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 7)
<div class="col-md-3 mb-4">
    <a href="{{ route('admin.section.partners.index', ['section_id' => $section->id]) }}" class="text-decoration-none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-users"></i> الشركاء</h5>
                <!-- Form to update visibility -->
                <form action="{{ route('update_section_partners_visibility', $section->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="visibility" value="{{ $section->partners->isEmpty() || $section->partners->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">
                    
                    @foreach ($section->partners as $partner)
                        <input type="hidden" name="partner_ids[]" value="{{ $partner->id }}">
                    @endforeach
                    
                    <button type="submit" class="btn {{ !empty($section->partners->first()) && $section->partners->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                        @if (!empty($section->partners->first()) && $section->partners->first()->is_visible === 'is_visible')
                            <i class="fas fa-eye"></i> في حالة ظهور
                        @else
                            <i class="fas fa-eye-slash"></i> في حالة اخفاء
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </a>
    @endif
</div>



<!-- Statistics Section -->
<div class="col-md-3 mb-4">
    @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 8)
    <a href="{{ route('admin.section.statistics.index', ['section_id' => $section->id]) }}" class="text-decoration-none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-chart-bar"></i> الإحصائيات</h5>
                <!-- Form to update visibility -->
                <form action="{{ route('update_section_statistics_visibility', $section->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="visibility" value="{{ $section->statistics->isEmpty() || $section->statistics->first()->is_visible === 'is_visible' ? 'not_visible' : 'is_visible' }}">
                    
                    @foreach ($section->statistics as $statistic)
                        <input type="hidden" name="statistic_ids[]" value="{{ $statistic->id }}">
                    @endforeach
                    
                    <button type="submit" class="btn {{ !empty($section->statistics->first()) && $section->statistics->first()->is_visible === 'is_visible' ? 'btn-primary' : 'btn-secondary' }} show-button">
                        @if (!empty($section->statistics->first()) && $section->statistics->first()->is_visible === 'is_visible')
                            <i class="fas fa-eye"></i> في حالة ظهور
                        @else
                            <i class="fas fa-eye-slash"></i> في حالة اخفاء
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </a>
    @endif
</div>








                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
