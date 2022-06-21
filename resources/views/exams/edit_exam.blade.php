@extends('components.layout') @section('title') Edit Exam @endsection
@section('page_title') Edit Exam @endsection @section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5>Edit exam - {{$exam->exam_title}}</h5>
        </div>
        <div class="card-text">
            <div class="" id="examsArea">
                <form id="updateExamForm" method="post">
                    <div id="result"></div>
                    <div class="form-group">
                        <label for="examTitle">Exam Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="examTitle"
                            required
                            name="exam_title"
                            value="{{old('exam_title') ?: $exam->exam_title}}"
                        />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('ajax')
<script>
    $(document).ready(function () {
        $("#updateExamForm").submit(function (e) {
            e.preventDefault();
            var output;
            $.ajax({
                url: '{{route("api.update_exams", $exam->id)}}',
                type: "patch",
                data: $(this).serialize(),
                accept: "application/json",
                cache: false,
                beforeSend: function () {
                    $("#spinner").show();
                    $("#result").hide();
                    $("#btnText").hide();
                },
                success: function (res) {
                    if (res.status) {
                        output = `<div class="alert alert-success"> ${res.message}</div>`;
                        $("#updateExamForm")[0].reset();
                        setTimeout(() => {
                            location.href = '{{route("exams.index")}}'
                        }, 2000);
                    } else {
                        output = `<div class="alert alert-warning"> ${res.message}</div>`;
                    }

                    $("#result").html(output);
                    $("#result").fadeIn();
                    $("#spinner").hide();
                    $("#btnText").show();
                },
                error: function (err) {
                    console.log(err);
                },
            });
        });
    });
</script>
@endsection
