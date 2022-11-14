<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\FormExitInterview;
use App\Models\FormPDS;
use App\Models\Forms;
use App\Models\Forms\Eif\EifAnswers;
use App\Models\Forms\Pds\PdsAnswers;
use App\Models\Forms\Sas\SasAnswers;
use App\Models\FormSAS;
use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{

    public function getFormIndex() {
        // $userPDS = FormPDS::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        // $userSAS = FormSAS::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        // $userExitInterview = FormExitInterview::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        // $users = Alumni::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        // $pdsResult = true;

        // return view('user.forms.index', compact(['users', 'userPDS', 'userExitInterview', 'userSAS']));

        // return view('user.forms.index', compact('pdsResult'));

        $users = Alumni::where("alumni_id", "=", Auth::user()->alumni_id)->get();
        $forms = Forms::all();
        $pdsAnswer = PdsAnswers::where("alumni_id", "=", Auth::user()->alumni_id)->get();
        $eifAnswer = EifAnswers::where("alumni_id", "=", Auth::user()->alumni_id)->get();
        $sasAnswer = SasAnswers::where("alumni_id", "=", Auth::user()->alumni_id)->get();

        return view("user.forms.index",
        compact(
            [
                "users",
                "forms",
                "pdsAnswer",
                "eifAnswer",
                "sasAnswer",
            ]
        ));
    }

    public function getPDS() {
        $users = Alumni::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        return view('user.forms.formPDS', compact(['users']));
    }

    public function getExiteInterview() {
        $users = Alumni::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        return view('user.forms.formExitInterview', compact(['users']));
    }

    public function getSAS() {
        $users = Alumni::where('alumni_id', '=', Auth::user()->alumni_id)->get();
        return view('user.forms.formSAS', compact(['users']));
    }
}