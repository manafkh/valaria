@extends('admin.dashboard')
@section('content')
    <div class="container px-5 mt-4">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="text-xl text-gray font-weight-bold">{{__('Models Info')}}</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('Id')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                <tr style="vertical-align: center">
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->name}}</td>
                                    <td>{{$model->description}}</td>
                                    <td>{{$model->price}}</td>

                                    <td class="d-flex justify-content-end">
                                        <a href="{{route('model.edit',$model->id)}}"> <button class="btn btn-primary rounded mr-1" style="width: 4.5rem" >{{__('Edit')}}</button> </a>
                                        <form action="{{route('model.destroy',$model->id)}}" method="POST">
                                            @CSRF
                                            @method("DELETE")
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