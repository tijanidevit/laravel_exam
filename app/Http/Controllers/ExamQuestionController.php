<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamQuestionRequest;
use App\Models\Category;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{    
    public function create(Exam $exam)
    {
        $categories = Category::all()->sortBy('category');
        return view('questions.create_question', compact('categories', 'exam'));
    }

    public function store(ExamQuestionRequest $request, Exam $exam)
    {
        $data = $request->validated();
        try {
            $question_data =[
                'question' => $data['question'],
                'category_id' => $data['category_id'],
            ];
            $question = $exam->questions()->create($question_data);

            for ($i=1; $i <=4 ; $i++) { 
                $answer_data = [
                    'answer' => $data['option'.$i],
                ];
                if ('option'.$i == $data['correct_option']) {
                    $answer_data['is_correct'] = 1;
                }
                $question->answers()->create($answer_data);
            }
            return response([
                'status' => true,
                'message' => 'Exam question created successfully',
            ],200);
        } catch (Exception $ex) {
            return response([
                'status' => false,
                'message' => $ex->getMessage(),
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        //
    }
}
