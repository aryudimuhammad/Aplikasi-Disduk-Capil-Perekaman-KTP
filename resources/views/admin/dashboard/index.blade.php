@extends('layouts.main')
@section('title') Dashboard @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-scooter">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon"><i class="fa fa-comments-o text-white"></i></div>
                            <div class="media-body ml-3 border-left-xs border-white-2">
                                <h4 class="mb-0 ml-3 text-white">85.2%</h4>
                                <p class="mb-0 ml-3 extra-small-font text-white">Requests Answered</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-bloody">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon"><i class="fa fa-question-circle-o text-white"></i></div>
                            <div class="media-body ml-3 border-left-xs border-white-2">
                                <h4 class="mb-0 ml-3 text-white">87254</h4>
                                <p class="mb-0 ml-3 extra-small-font text-white">Total Requests</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-quepal">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon"><i class="fa fa-bar-chart text-white"></i></div>
                            <div class="media-body ml-3 border-left-xs border-white-2">
                                <h4 class="mb-0 ml-3 text-white">$9,856</h4>
                                <p class="mb-0 ml-3 extra-small-font text-white">Total Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-blooker">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon"><i class="fa fa-money text-white"></i></div>
                            <div class="media-body ml-3 border-left-xs border-white-2">
                                <h4 class="mb-0 ml-3 text-white">23.5%</h4>
                                <p class="mb-0 ml-3 extra-small-font text-white">Support Costs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div>
@endsection
@section('script')
<!-- Chart js -->
<script src="assets/plugins/Chart.js/Chart.min.js"></script>
<!--Peity Chart -->
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Index2 js -->
<script src="assets/js/dashboard-service-support.js"></script>
@endsection
