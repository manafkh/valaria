@extends('users.layouts.app')
@section('content')
    <style>
        .modal-dialog,
        .modal-content {
            /* 80% of window height */
            height: 90%;
        }
        .modal-body {
            /* 100% = dialog height, 120px = header + footer */
            max-height: calc(100% - 100px);
            overflow-y: scroll;
        }
    </style>

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column ">
                                    <div class="mt-3">
                                        <h5 class="text-center">Link-Pinterest.com</h5>
                                        <hr>
                                        <div class="list-group text-center">
                                            <button onclick="setURL('https://getbootstrap.com/docs/4.0/components/modal/')" type="button"  class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </button>
                                            <button onclick="setURL('https://getbootstrap.com')"   class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </button>
                                            <button onclick="setURL('URLHere')"  class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3" >
                            <div class="card-body">
                                <h5 class="text-center">{{__('Project Details')}}</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{__('Execution Time')}}</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress">
                                            <div
                                                    class="progress-bar"
                                                    role="progressbar"
                                                    style="width: 75%"
                                                    aria-valuenow="75"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{__('Project Name')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="float: {{isArabic()?"right":""}}">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{$project->name}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{__('Project Address')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="float: {{isArabic()?"right":""}}">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{$project->address}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{__('Category')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="float: {{isArabic()?"right":""}}">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{$project->category->name}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{__('Style')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="float: {{isArabic()?"right":""}}">
                                        <h6 class="mb-0" style="float: {{isArabic()?"right":""}}">{{$project->style->name}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="text-center">{{__('Directory')}}</h5>
                                        <hr>
                                        <div class="row">
                                            @foreach($dirs as $dir)
                                                @if(is_dir($dir))
                                                <div class="col-md-3" style="float: {{isArabic()?"right":""}};">
                                                    <a style="color: #000;" href="{{route('openDir',$dir)}}"><i class="fas fa-folder-open"></i> {{explode('\\',$dir)[2]}}</a>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div  class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("Reference")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframe" style="width:100%; height:100%;">

                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function setURL(url){
            document.getElementById('iframe').src = url;
        }
    </script>
    @endsection