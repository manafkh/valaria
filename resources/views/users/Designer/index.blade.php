@extends('admin.dashboard')
@section('content')
    <div class="container px-5 mt-4">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="text-xl text-gray font-weight-bold">{{__('Designer Info')}}</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('Id')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Address')}}</th>
                                <th>{{__('Project Date')}}</th>
                                <th >{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($designers as $designer)
                                <tr style="vertical-align: center">
                                    <td>{{$designer->id}}</td>
                                    <td>{{$designer->title}}</td>
                                    <td>{{$designer->address}}</td>
                                    <td>{{$designer->project_date}}</td>

                                    <td class="d-flex justify-content-end">
                                        <a href="{{route('designers.edit',$designer->id)}}"> <button class="btn btn-primary rounded mr-1" style="width: 4.5rem" >{{__('Edit')}}</button> </a>
                                        <form action="{{route('designers.destroy',$designer->id)}}" method="POST">
                                            @CSRF
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded"style="width: 4.5rem" >{{__('Delete')}}</button>
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


@endsection