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
                <div id="result"></div>
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
                                    <button type="button" onclick="deleteExam('{{route('api.delete_exams', $exam->id)}}')" class="btn btn-danger">Delete</a>
                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="ml-3">No exam added yet! Add new exam <a href="{{route('exams.create')}}">here</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')
<script>
        function deleteExam(url) {
            var output;
            $.ajax({
                url: url,
                type: "delete",
                accept: "application/json",
                cache: false,
                beforeSend: function () {
                    $("#result").hide();
                },
                success: function (res) {
                    if (res.status) {
                        output = `<div class="alert alert-success"> ${res.message}</div>`;
                        setTimeout(() => {
                            location.href = '{{route("exams.index")}}'
                        }, 2000);
                    } else {
                        output = `<div class="alert alert-warning"> ${res.message}</div>`;
                    }

                    $("#result").html(output);
                    $("#result").fadeIn();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        };
</script>
@endsection