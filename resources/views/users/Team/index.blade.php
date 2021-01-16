@extends('admin.dashboard')
@section('content')
    <div class="container px-5 mt-4">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="text-xl text-gray font-weight-bold">{{__('Team')}}</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('Id')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Job')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr style="vertical-align: center">
                                    <td>{{$team->id}}</td>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->job}}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{route('teams.show',$team->id)}}"> <button class="btn btn-primary rounded mr-1" style="width: 4.5rem" >{{__('Show')}}</button> </a>
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


@endsection