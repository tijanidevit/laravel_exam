@extends('components.layout')
@section('title')
    New Exam
@endsection

@section('page_title')
    New Exam
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>Add new exam</h5>
            </div>
            <div class="card-text">
                <div class="" id="examsArea">
                    <form id="addExamForm" method="post">
                        <div id="result"></div>
                        <div class="form-group">
                            <label for="examTitle">Exam Title</label>
                            <input type="text" class="form-control" id="examTitle" required name="exam_title">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')
    <script>
        $(document).ready(function(){
            $('#addExamForm').submit(function(e){
                e.preventDefault();
                var output;
                $.ajax({
                    url:'{{route("api.store_exams")}}',
                    type: 'post',
                    data : $(this).serialize(),
                    accept: "application/json",
                    cache: false,
                    beforeSend: function() {
                        $('#spinner').show();
                        $('#result').hide();
                        $('#btnText').hide();
                    },
                    success: function(res){
                        if (res.status) {
                            output = `<div class="alert alert-success"> ${res.message}</div>`;
                            $('#addExamForm')[0].reset();
                        }
                        else{
                            output = `<div class="alert alert-warning"> ${res.message}</div>`;
                        }

                        $('#result').html(output);
                        $('#result').fadeIn();
                        $('#spinner').hide();
                        $('#btnText').show();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            })
        })
    </script>
@endsection