@extends('components.layout') @section('title')
{{$exam->exam_title}}
@endsection @section('page_title') View Exam - {{$exam->exam_title}}
@endsection @section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5>{{$exam->exam_title}}</h5>
        </div>
        <div class="card-text mt-3">
            <div class="d-flex justify-content-between">
                <h6>Questions</h6>
                <a href="{{ route('questions.create', $exam->id) }}"
                    >Add new question</a
                >
            </div>
            <div class="row" id="examsArea">
                @forelse($exam->questions as $question)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex justify-content-between">
                                    <p class="lead">
                                        {{$question->question}}
                                    </p>
                                    <p class="text-muted">
                                        {{$question->category->category}}
                                    </p>
                                </div>

                                <p class="font-weight-bold">Options</p>
                                <ol type="a">
                                    @forelse($question->answers as $i => $answer)
                                        <li @if($answer->is_correct) class="text-success" @endif >{{$answer->answer}}
                                        </li>
                                    @empty
                                    @endforelse
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="ml-3">No questions added yet</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection @section('ajax') @endsection
