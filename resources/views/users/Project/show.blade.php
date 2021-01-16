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
                                            <button id="link1" type="button"  class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                            <button type="button"   class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                            <button type="button"  class="list-group-item list-group-item-action list-group-item-dark" data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="text-center">Project Info</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Execution Time</h6>
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
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Project Name')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        dsfds dffs
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Project Address')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        dsfds dffs
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Category')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        dsfds dffs
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Style')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        dsfds dffs
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="text-center">Directory</h5>
                                        <hr>
                                        <div class="row">
                                            @foreach($dirs as $dir)
                                                @if(is_dir($dir))
                                                <div class="col-md-3">
                                                    <a href="{{asset($dir)}}"><i class="fas fa-folder-open"></i> {{explode('\\',$dir)[2]}}</a>
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


    {{--<style>--}}
        {{--#popup {--}}
            {{--display: none;--}}
            {{--border: 1px black solid;--}}
            {{--width: 1000px; height: 500px;--}}
            {{--top:20px; left:20px;--}}
            {{--background-color: white;--}}
            {{--z-index: 10;--}}
            {{--padding: 2em;--}}
            {{--position: fixed;--}}
        {{--}--}}

        {{--.darken { background: rgba(0, 0, 0, 0.7); }--}}

        {{--#iframe { border: 0; height: inherit; width: inherit;}--}}

        {{--html, body, #page { height: 100%; }--}}
    {{--</style>--}}
    {{--<section id="breadcrumbs" class="breadcrumbs">--}}
        {{--<div class="container" style="font-family: 'Open Sans Semibold'">--}}
            {{--<div id="page">--}}
                {{--<a href="" id="a">Click me</a><br>--}}
                {{--Hello<br>--}}
                {{--Hello<br>--}}

                {{--<div id="popup">--}}
                    {{--External website:--}}
                    {{--<iframe id="iframe"></iframe>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <script>
        document.getElementById("link1").onclick = function(e) {
            e.preventDefault();
            document.getElementById('iframe').src = "https://getbootstrap.com/docs/4.0/components/modal/";

        }
    </script>
    @endsection