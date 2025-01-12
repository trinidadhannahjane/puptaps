<?php

namespace App\Http\Livewire\Tracer;

use App\Models\Alumni;
use App\Models\Tracer\TracerAnswers;
use App\Models\Tracer\TracerCategories;
use App\Models\Tracer\TracerQuestions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnswerUnemployed extends Component
{
    public $answer;
    public $arrayAnswers = [];
    public $totalPage = 3;
    public $currentPage = 1;
    public $progressBar = 0;
    public $countNull = 1;
    public $temp = 0;
    public $no_board_exam;

    public function render() {
        $this->addNullAnswers();
        $users = Alumni::where("alumni_id", "=", Auth::user()->alumni_id)->get();
        $categories = TracerCategories::all();
        $questions = TracerQuestions::all();

        return view("livewire.tracer.answer-unemployed",
        compact([
            "users",
            "categories",
            "questions",
        ])
        );
    }

    public function addNullAnswers() {
        $categories = TracerCategories::all();
        $questions = TracerQuestions::all();

        foreach($categories as $category) {
            if($this->currentPage == $category->category_id) {
                if($this->countNull == $this->currentPage) {
                    $this->progressBar = $this->progressBar + 33;
                    foreach($questions as $question) {
                        if($question->category_id == $category->category_id) {
                            array_push($this->arrayAnswers, [
                                "answer" => "",
                            ]);
                        }
                    }
                    $this->countNull++;
                }
            }
        }
    }

    protected $rules = [
        "arrayAnswers.*.answer" => "required|string",
    ];

    protected $messages = [
        "arrayAnswers.*.answer.required" => "This is required.",
        "arrayAnswers.*.answer.string"   => "This is required.",
    ];

    public function mount() {
        $this->currentPage = 1;
    }

    public function previousPage() {
        $this->resetErrorBag();
        $this->currentPage--;
        if($this->currentPage < 1) {
            $this->currentPage = 1;
        }
    }

    public function nextPage() {
        $this->resetErrorBag();
        $this->addNullAnswers();
        $temp_null = $this->countNull - 1;
        if($temp_null == $this->currentPage) {
            if ($this->no_board_exam == "NO_BOARD_EXAM") {
                $this->arrayAnswers[0]['answer'] = 'N/A';
                $this->arrayAnswers[1]['answer'] = 'N/A';
                $this->arrayAnswers[2]['answer'] = 'N/A';
                $this->arrayAnswers[3]['answer'] = 'N/A';
            }
            $this->validate();
        }
        $this->currentPage++;
        if($this->currentPage > $this->totalPage) {
            $this->currentPage = $this->totalPage;
        }
    }

    public function sameCurrent() {
        $this->arrayAnswers[14]['answer'] = $this->arrayAnswers[5]['answer'];
        $this->arrayAnswers[15]['answer'] = $this->arrayAnswers[6]['answer'];
        $this->arrayAnswers[16]['answer'] = $this->arrayAnswers[7]['answer'];
        $this->arrayAnswers[17]['answer'] = $this->arrayAnswers[8]['answer'];
        $this->arrayAnswers[18]['answer'] = $this->arrayAnswers[11]['answer'];
        $this->arrayAnswers[19]['answer'] = $this->arrayAnswers[12]['answer'];
    }

    public function currentlyUnemployed() {
        $this->arrayAnswers[5]['answer'] = 'Unemployed';
        $this->arrayAnswers[6]['answer'] = 'Unemployed';
        $this->arrayAnswers[7]['answer'] = 'Unemployed';
        $this->arrayAnswers[8]['answer'] = 'Unemployed';
        $this->arrayAnswers[9]['answer'] = 'Unemployed';
        $this->arrayAnswers[10]['answer'] = 'Unemployed';
        $this->arrayAnswers[11]['answer'] = 'Unemployed';
        $this->arrayAnswers[12]['answer'] = 'Unemployed';
        $this->arrayAnswers[13]['answer'] = 'Unemployed';
        $this->arrayAnswers[14]['answer'] = 'Unemployed';
        $this->arrayAnswers[15]['answer'] = 'Unemployed';
        $this->arrayAnswers[16]['answer'] = 'Unemployed';
        $this->arrayAnswers[17]['answer'] = 'Unemployed';
        $this->arrayAnswers[18]['answer'] = 'Unemployed';
        $this->arrayAnswers[19]['answer'] = 'Unemployed';

        $this->updateAnswer();
    }

    public function updateAnswer() {
        $this->validate();
        $getAnswers = TracerAnswers::where('alumni_id', '=', Auth::user()->alumni_id)->get();

        foreach ($getAnswers as $answers) {
            $update = TracerAnswers::where('answer_id', '=', $answers->answer_id)->update([
                'answer' => $this->arrayAnswers[$this->temp]['answer'],
            ]);
            $this->temp++;
        }
        $this->arrayAnswers = [];
        $this->countNull = 1;
        $this->temp = 0;

        return redirect(route("userTracer.getTracerIndex"));
    }
}
