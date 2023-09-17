@extends('admin.layout')
@section('content')
<div class="main-panel" >
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-building fa-3x"></i>
                                                    <h5 class="card-title mt-3">الأقسام</h5>
                                                    <p class="card-text"style="font-size: 40px">{{ \App\Models\Section::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-project-diagram fa-3x"></i>
                                                    <h5 class="card-title mt-3">المشاريع</h5>
                                                    <p class="card-text"style="font-size: 40px">{{ \App\Models\Project::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-cogs fa-3x"></i>
                                                    <h5 class="card-title mt-3">الخدمات</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\Service::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-user fa-3x"></i> <!-- Change the icon here -->
                                                    <h5 class="card-title mt-3">المستخدمين</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\User::count() }}</p>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-briefcase fa-3x"></i> <!-- Change the icon here to a business icon -->
                                                    <h5 class="card-title mt-3">الأعمال</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\Business::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-newspaper fa-3x"></i> <!-- Change the icon here to a newspaper icon -->
                                                    <h5 class="card-title mt-3">الأخبار</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\News::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-chart-pie fa-3x"></i> <!-- Change the icon here to a statistics icon -->
                                                    <h5 class="card-title mt-3">الإحصائيات</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\Statistic::count() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-handshake fa-3x"></i> <!-- Change the icon here to a handshake or partner icon -->
                                                    <h5 class="card-title mt-3">الشركاء</h5>
                                                    <p class="card-text" style="font-size: 40px">{{ \App\Models\Partner::count() }}</p>
                                                </div>
                                            </div>
                                        </div> 
                                                                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
