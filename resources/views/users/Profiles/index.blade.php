@extends('users.layouts.app')
@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <h4>{{$user->username}}</h4>
                                        <p class="text-secondary mb-1">{{$user->email}}</p>
                                        <p class="text-muted font-size-sm">{{$user->address_1}}</p>
                                        <a href="{{route('profiles.edit',$user->id)}}" class="btn btn-primary">{{__('Edit')}}</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Full Name')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->first_name}} {{$user->last_name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Email')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->email}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Phone')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Address')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->address_1}},{{$user->city}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="text-center"><strong>{{__('Projects')}}</strong></h6>
                                        {{--@foreach($projects as $project)--}}
                                            {{--<a href="#"> <p class="text-center"><strong class="text-right">{{$project->project_name}}</strong> : <small class="text-left">{{$project->created_at}}</small></p></a>--}}
                                        {{--@endforeach--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection