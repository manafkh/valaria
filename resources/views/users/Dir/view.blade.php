@extends('users.layouts.app')
@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            @php
                $temp = explode('\\',$name);
            @endphp
            <div class="card">
                <h5 class="card-header">{{end($temp)}}</h5>
                    <br>
                    @if(end($temp)== "Received")
                    <form class="form-inline justify-content-center" action="{{route('upload.file',$name)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{--@method('PUT')--}}
                        <div class="form-group mb-10">
                            <input type="file" name="file[]" multiple>
                            <input type="hidden" name="path" value="{{$name}} ">
                        </div>
                        <button type="submit"  style="background: #0c0c0c; color:#e9e9e9;"  class="btn mb-2"><li class="fa fa-upload"></li></button>
                    </form>
                    <hr>
                        @endif
                <div class="card-body">
                    <div class="row">
                            @foreach($folders as $subfolder)
                                @php
                                    $temp = explode('\\',$subfolder);
                                @endphp
                            <div class="col-md-3 {{isArabic()?"text-right":""}}">
                                <a style="color: #000;" href="{{route('down',$subfolder)}}"><i class="fal fa-file"></i> {{strlen(end($temp)) >18 ?substr(end($temp),0,18).".." : end($temp)}}</a>
                            </div>
                            @endforeach
                    </div>
                </div>
                <a class="btn" style="background: #0c0c0c; color:#e9e9e9" href="{{ url()->previous() }}"><li class="fa fa-arrow-left"></li> </a>
            </div>

        </div>
    </section>
@endsection
