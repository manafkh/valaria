@extends('users.layouts.app')
@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container" style="font-family: 'Open Sans Semibold'">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{$user->username}}</h4>
                                        <p class="text-secondary mb-1">{{$user->email}}</p>
                                        <p class="text-muted font-size-sm">{{$user->address_1}}</p>
                                        <a href="{{route('profiles.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                           @yield('Questionnaire')
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->first_name}} {{$user->last_name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->email}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->address_1}},{{$user->city}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="text-center"><strong>Project Status</strong></h6>
                                        {{--@foreach($projects as $project)--}}
                                            {{--<a href="#"> <p class="text-center"><strong class="text-right">{{$project->project_name}}</strong> : <small class="text-left">{{$project->created_at}}</small></p></a>--}}
                                        {{--@endforeach--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="text-center"><strong>Questionnaire Status</strong></h6>
                                        @foreach($questionnaires as $questionnaire)
                                       <a href="{{route('questionnaires.show',$questionnaire->id)}}"><p class="text-center"><strong class="text-right">{{$questionnaire->project_name}}</strong> : <small class="text-left">{{$questionnaire->created_at->format('Y-m-d')}}</small></p></a>
                                            @endforeach
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