<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use Exception;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function api_index()
    {
        try{
            $exams = Exam::all()->sortByDesc('id');
            return response([
                'status' => true,
                'data' => $exams,
                'message' => 'Exams fetched successfully',
            ],200);
        }
        catch(Exception $ex){
            return response([
                'status' => false,
                'message' => "Error fetching exam: $ex->getMessage()",
            ],500);
        }
    }

    public function api_limited_exams($limit)
    {
        try{
            $exams = Exam::all()->sortByDesc('id')->take($limit);
            return response([
                'status' => true,
                'data' => $exams,
                'message' => 'Limited exams fetched successfully',
            ],200);
        }
        catch(Exception $ex){
            return response([
                'status' => false,
                'message' => "Error fetching exam: $ex->getMessage()",
            ],500);
        }
    }

    public function index()
    {
        $exams = Exam::all()->sortByDesc('id');
        return view('exams.all_exams', compact('exams'));
    }

    public function create()
    {
        return view('exams.create_exam');
    }
    public function store(ExamRequest $request)
    {
        $data = $request->validated();
        try {
            Exam::create($data);
            return response([
                'status' => true,
                'message' => 'Exam created successfully',
            ],200);
        } catch (Exception $ex) {
            return response([
                'status' => false,
                'message' => $ex->getMessage(),
            ],500);
        }
    }

    
    public function show(Exam $exam)
    {
        $exam->load('questions.answers');
        return view('exams.show_exam', compact('exam'));
    }

    public function edit(Exam $exam)
    {
        return view('exams.edit_exam', compact('exam'));
    }

    public function update(ExamRequest $request, $exam)
    {
        try{
            $exam = Exam::find($exam);
            if (!$exam) {
                return response([
                    'status' => true,
                    'message' => 'Exam not found',
                ],200);
            }
            else{
                $exam->exam_title = $request->exam_title;
                $exam->save();
                return response([
                    'status' => true,
                    'message' => 'Exam updated successfully',
                ],200);
            }
        } catch (Exception $ex) {
            return response([
                'status' => false,
                'message' => $ex->getMessage(),
            ],500);
        }
    }

    public function destroy($exam)
    {
        try{
            $exam = Exam::find($exam);
            if (!$exam) {
                return response([
                    'status' => true,
                    'message' => 'Exam not found',
                ],200);
            }
            else{
                $exam->delete();
                return response([
                    'status' => true,
                    'message' => 'Exam deleted successfully',
                ],200);
            }
        } catch (Exception $ex) {
            return response([
                'status' => false,
                'message' => $ex->getMessage(),
            ],500);
        }
    }
}
