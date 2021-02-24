<?php


namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Questionaire;
use App\Models\Question;
use App\Models\Answer;
use App\Models\webmatrial;
use App\Models\timer;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{ 
    
    //
    public function sendMail(Request $request,$post_id)
    {
        echo "i am here";
 
        $details=[
            'title'=>'Mail is from P_L_W Website',
            'body'=>'Congratulation  .you have passed in the course'
        ];
        $course_name=$post_id;
        Mail::to($request->email)->send(new TestMail($details,$course_name));
        return view('welcome')->with("Email Sent please check");
    }
}
