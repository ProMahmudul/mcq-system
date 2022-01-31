<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Quiz;
use App\Http\Resources\Quiz as QuizResource;

class QuizController extends BaseController
{

    public function index()
    {
        $blogs = Quiz::all();
        return $this->sendResponse(QuizResource::collection($blogs), 'Quiz fetched.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $quiz = Quiz::create($input);
        return response()->json(['quiz' => $quiz, 'msg' => 'Post created.'], 201);
    }


    public function show($id)
    {
        $quiz = Quiz::find($id);
        if (is_null($quiz)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new QuizResource($quiz), 'Post fetched.');
    }


    public function update(Request $request, Quiz $quiz)
    {
        return $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $quiz->title = $input['title'];
        $quiz->from_time = $input['from_time'];
        $quiz->to_time = $input['to_time'];
        $quiz->duration = $input['duration'];
        $quiz->save();

        return $this->sendResponse(new QuizResource($quiz), 'Quiz updated.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return $this->sendResponse([], 'Quez deleted.');
    }
}
