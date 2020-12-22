@extends('users.Profiles.index')
@section('Questionnaire')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center"><strong>{{$questionnaire->project_name}}</strong></h5>
            <p class="card-text"><strong class="text-center">Category : </strong>{{$questionnaire->category->name}}</p>
            <p class="card-text"><strong class="text-center">Description : </strong><small>{{$questionnaire->project_description}}</small></p>
            <hr>
            @if($questionnaire->references)
                <p class="text-center">References</p>
                @foreach($questionnaire->references as $reference)
                    <tr>
                        <a href="{{$reference->link}}">{{$reference->link}}</a>
                    </tr>
                    @endforeach
            @else
                <p class="text-center">no reference</p>
            @endif
            <hr>

            @if($questionnaire->files)
                <p class="text-center">files</p>
                @foreach($questionnaire->files as $file)
                    <tr>
                        <a class="text-center row" href="{{asset('upload/'. $file->file)}}">{{$file->file}}</a>
                    </tr>
                @endforeach
            @else
                <p class="text-center">No file</p>
            @endif

            <hr>
            <a href="#" class="btn btn-primary pull-left"><span class="icofont-edit"></span> Edit</a>
            <a href="#" class="btn btn-danger pull-right"><span class="icofont-delete"></span> Delete</a>

        </div>
    </div>
    @endsection