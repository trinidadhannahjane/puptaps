<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\CareerApplicant;
use App\Models\Careers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    //
    public function getCareerIndex(Request $request) {
        $users              = Alumni::where('alumni_id', '=', Auth::user()
                              ->alumni_id)->get();
        $alumni             = Alumni::all();
        $admin              = Admin::all();
        $applicants         = CareerApplicant::where('alumni_id', '=', Auth::user()
                              ->alumni_id)->get();
        $posts              = Alumni::all();
        $title              = "Careers";
        $data['query']      = $request->get('query');
        $data['careers']    = Careers::where('approval', '=', 1)
                              ->where('category', 'like', '%' . $data['query'] . '%')
                              ->paginate(15)
                              ->withQueryString();
        //$message = "Thank you for posting. Kindly wait for the admins to approve your post.";

        return view('user.career.index',
        compact(
            [
                'users',
                'applicants',
                'posts',
                'alumni',
                'admin',
                'title',
            ]
        ), $data);
    }

    public function addTextCareer(Request $request) {
        $this->validate($request,[
            'job_name'      => 'required',
            'company'       => 'required',
            'salary'        => 'required',
            'description'   => 'required',
            'category'      => 'required',
            'email'         => 'required',
            'number'        => 'required',
        ]);

        $career = new Careers();
        $career->alumni_id  = Auth::user()->alumni_id;
        $career->job_name       = $request->input('job_name');
        $career->company        = $request->input('company');
        $career->salary         = $request->input('salary');
        $career->description    = $request->input('description');
        $career->category       = $request->input('category');
        $career->email          = $request->input('email');
        $career->number         = $request->input('number');
        $career->approval   = 0;

        $career->save();

        if($career->save()) {
            return back()
                   ->with(
                        'success',
                        'Thank you for posting. Kindly wait for the admin to Approve your Job Posting.'
                    );
        }
        else {
            return back()
                   ->with(
                        'fail',
                        'There is an Error Occured'
                    );
        }
    }

    public function addImageCareer(Request $request) {
        $request->validate([
            'job_ad_image'  => 'required|mimes:jpg,jpeg,png',
            'category'      => 'required',
        ]);

        $career = new Careers();
        $career->alumni_id  = Auth::user()->alumni_id;
        $career->approval   = 0;
        $career->category   = $request->input('category');

        if($request->hasFile('job_ad_image')) {

            $file       = $request->file('job_ad_image');
            $extension  = $file->getClientOriginalExtension();
            date_default_timezone_set('Asia/Manila');
            $fileName   = date('m_d_Y [H-i-s]') . '.' . $extension;
            $file->move('Uploads/Career/', $fileName);

            $career->job_ad_image = $fileName;

        }

        $career->save();

        if($career->save()) {
            return back()
                   ->with(
                        'success',
                        'Thank you for posting. Kindly wait for the admin to Approve your Job Posting.'
                    );
        }
        else {
            return back()
                   ->with(
                        'fail',
                        'There is an Error Occured'
                    );
        }
    }

    public function applyCareer(Request $request) {
        $applicant = new CareerApplicant();

        $applicant->alumni_id = $request->alumni_id;
        $applicant->course_id = $request->course_id;

        $applicant->save();

        return back()->with('success', 'Thank you for applying. Hope you get the Job!!!');
    }
}
