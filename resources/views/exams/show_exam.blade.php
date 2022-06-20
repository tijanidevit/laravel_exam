@extends('components.layout')
@section('title')
    {{$exam->exam_title}}
@endsection

@section('page_title')
    View Exam - {{$exam->exam_title}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>{{$exam->exam_title}}</h5>
            </div>
            <div class="card-text">
                <div class="row" id="examsArea">
                        <div class="col-md-4">
                            <div class="card">
                            
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-bold">{{$exam->exam_title}}</p>
                                        <p>{{$exam->questions->count()}} questions</p>
                                    </div>
                                    <a href="{{route('exams.show', $exam->id)}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')

@endsection