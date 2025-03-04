<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQuestionnaireRequest;
use App\Http\Requests\ProcessQuestionnaireRequest;
use OpenAI;

class QuestionnaireController extends Controller
{
    private $openai;

    public function __construct()
    {
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function create(GenerateQuestionnaireRequest $generateQuestionnaireRequest)
    {
        $role = $generateQuestionnaireRequest->input('role');
        $seniority = $generateQuestionnaireRequest->input('seniority');

        $prompt = view('prompts.questionnaire-prompt', compact('role', 'seniority'))->render();
        $systemPrompt = view('prompts.system-prompt')->render();

        $response = $this->openai->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $questions = json_decode($response->toArray()['choices'][0]['message']['content'], true);

        session(['questionnaire' => [
            'questions' => $questions,
            'role' => $role,
            'seniority' => $seniority,
        ]]);

        return redirect()->route('show-questions');
    }

    public function show()
    {
        $response = session('questionnaire');
        return view('questionnaire', [
            'role' => $response['role'],
            'seniority' => $response['seniority'],
            'questions' => $response['questions'],
        ]);
    }

    public function process(ProcessQuestionnaireRequest $request)
    {
        $role = $request->input('role');
        $seniority = $request->input('seniority');
        $answers = $request->input('answers'); // Array de respostas ["pergunta" => nota]

        $prompt = view('prompts.process-questionnaire-prompt', [
            'role' => $role,
            'seniority' => $seniority,
            'answers' => $answers,
        ])->render();

        $systemPrompt = view('prompts.process-questionary-system-prompt')->render();

        $response = $this->openai->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $plan = json_decode($response->toArray()['choices'][0]['message']['content'], true);

        session(['action-plan' => [
            'plan' => $plan,
        ]]);

        return redirect()->route('show-plan');
    }

    public function showPlan()
    {
        $response = session('action-plan');

        return view('action-plan', [
            'plan' => $response['plan'],
        ]);
    }
}
