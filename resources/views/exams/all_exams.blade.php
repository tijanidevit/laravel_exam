@extends('components.layout')
@section('title')
    All Exams
@endsection

@section('page_title')
    View All Exams
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>All Exams</h5>
            </div>
            <div class="card-text">
                <div class="row" id="examsArea">
                    @forelse ($exams as $exam)
                        <div class="col-md-4">
                            <div class="card">
                            
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-bold">{{$exam->exam_title}}</p>
                                        <p>{{$exam->questions->count()}} questions</p>
                                    </div>
                                    <a href="{{route('exams.show', $exam->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{route('exams.edit', $exam->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('exams.delete', $exam->id)}}" method="POST" class="btn">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No exam added yet! Add new exam <a href="{{route('exams.create')}}">here</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')

@endsection