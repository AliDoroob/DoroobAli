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
