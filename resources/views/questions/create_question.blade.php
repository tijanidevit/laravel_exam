@extends('components.layout') @section('title') New Exam Question @endsection
@section('page_title') New Exam Question @endsection @section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5>Add new exam question - {{$exam->exam_title}}</h5>
        </div>
        <div class="card-text">
            <div class="" id="examsArea">
                <form id="addQuestionForm" method="post">
                    @csrf
                    <div id="result"></div>
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input
                            type="text"
                            class="form-control"
                            id="question"
                            required
                            name="question"
                        />
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select
                            type="text"
                            class="form-control"
                            id="category_id"
                            required
                            name="category_id"
                        >
                            @forelse($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->category}}
                            </option>
                            @empty @endforelse
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="option1">Option 1</label>
                        <input
                            type="text"
                            class="form-control"
                            id="option1"
                            required
                            name="option1"
                        />
                    </div>

                    <div class="form-group">
                        <label for="option2">Option 2</label>
                        <input
                            type="text"
                            class="form-control"
                            id="option2"
                            required
                            name="option2"
                        />
                    </div>

                    <div class="form-group">
                        <label for="option1">Option 3</label>
                        <input
                            type="text"
                            class="form-control"
                            id="option3"
                            required
                            name="option3"
                        />
                    </div>

                    <div class="form-group">
                        <label for="option1">Option 4</label>
                        <input
                            type="text"
                            class="form-control"
                            id="option4"
                            required
                            name="option4"
                        />
                    </div>


                    <div class="form-group">
                        <label for="">Select correct option</label>
                        <select name="correct_option" required class="form-control">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                        
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
        $("#addQuestionForm").submit(function (e) {
            e.preventDefault();
            var output;
            $.ajax({
                url: '{{route("api.store_questions", $exam->id)}}',
                type: "post",
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
                        $("#addQuestionForm")[0].reset();
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
