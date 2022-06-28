<?php
namespace App\Services;

use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionService {
    public function getAll() {
        $questions = Question::all();
        foreach($questions as $question) {
            $question->answers = Answer::where('question_id', $question->id)->count();
            $question->user = User::find($question->user_id)->login;
        }
        return $questions;
    }

    public function getOne($id) {
        $question = Question::find($id);
        $question->user = User::find($question->user_id)->login;
        return $question;
    }

    public function create(Request $request) {
        $request->validate([
            'question' => 'required',
            'user_id' => 'required',
            'date' => 'required'
        ]);
        $question = Question::create($request->all());
        return $question;
    }

    public function update(Request $request, $id) {
        $request->validate([
            'question' => 'required',
            'user_id' => 'required',
            'date' => 'required'
        ]);

        $question = Question::find($id);
        $question->update($request->all());
        return $question;
    }

    public function delete($id) {
        $question = Question::find($id);
        $question->delete();
        return $question;
    }

}
