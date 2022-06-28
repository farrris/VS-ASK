<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use App\Services\AnswerService;

class AnswerController extends Controller
{
    public function __construct(private AnswerService $answerService)
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->answerService->getAll();
        return json_encode($data, JSON_UNESCAPED_UNICODE);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->answerService->create($request);
        return json_encode($data, JSON_UNESCAPED_UNICODE);    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->answerService->getOne($id);
        return json_encode($data, JSON_UNESCAPED_UNICODE);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->answerService->update($request, $id);
        return json_encode($data, JSON_UNESCAPED_UNICODE);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->answerService->delete($id);
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function right($id)
    {
        $answer = Answer::find($id);
        $answer->type = 'right';
        $answer->save();

        $user = User::find($answer->user_id);
        $user->right_answers += 1;
        $user->save();
        return "OK";
    }
}
