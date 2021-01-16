@extends('admin.dashboard')

@section('content')

    <div class="container px-5 mt-4">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="text-xl text-gray font-weight-bold">{{__('Update Contact')}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('contacts.update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>{{__('Phone')}}</label>
                        <input type="text" value="{{$contact->phone}}" class="form-control" name="phone">
                    </div>
                    <div class="form-group mt-2">
                        <label>{{__('Email')}}</label>
                        <input type="text" value="{{$contact->email}}" class="form-control " name="email">
                    </div>
                    <div class="form-group mt-2">
                        <label>{{__('Address')}}</label>
                        <input type="text" value="{{$contact->address}}" class="form-control " name="address">
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label>Facebook</label>
                            <input type="text" value="{{$contact->facebook}}"  class="form-control" name="facebook">
                        </div>
                        <div class="col">
                            <label>Instagram</label>
                            <input type="text" value="{{$contact->instagram}}"  class="form-control" name="instagram">
                        </div>
                        <div class="col">
                            <label> twitter</label>
                            <input type="text" value="{{$contact->twitter}}"  class="form-control" name="twitter">
                        </div>
                        <div class="col">
                            <label>Linked In</label>
                            <input type="text" value="{{$contact->linked_in}}"  class="form-control" name="linked_in">
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" value="Update" class="btn btn-primary my-4 rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection