<?php
namespace App\Services;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerService {
    public function getAll() {
        $answers = Answer::all();
        return $answers;
    }

    public function getOne($id) {
        $answers = Answer::where("question_id", $id)->get();
        foreach($answers as $answer) {
            $answer->user = User::find($answer->user_id)->login;
        }
        return $answers;
    }

    public function create(Request $request) {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required',
            'user_id' => 'required',
            'date' => 'required'
        ]);
        $answer = Answer::create($request->all());
        return $answer;
    }

    public function update(Request $request, $id) {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required',
            'user_id' => 'required',
            'date' => 'required'
        ]);

        $answer = Answer::find($id);
        $answer->update($request->all());
        return $answer;
    }

    public function delete($id) {
        $answer = Answer::find($id);
        $answer->delete();
        return $answer;
    }

}
