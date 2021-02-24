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
use App\Mail\TestMail;

use App\Models\questionaires_all;
use App\Models\question_all;
use App\Models\answer_all;
use App\Models\timer_all;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class StudentController extends Controller
{
    //


    public function python1st ($id)
      {
          $student=Student::findOrFail($id);
          $question=new Questionaire();
          return view ('question',['student'=>$student,'question'=>$question]);
      }  
    
      public function pythonhome($post_id)
      {
          $questionaire=Questionaire::where('language',$post_id)->get();
          return view('python1stpage',['questionaire'=>$questionaire]);

        //   return view ('python(intro)doc',['questionaire'=>$questionaire,'student'=>$student]);
      }
      public function python_video ($post_id)
      {
          
        $questionaire=Questionaire::where('id',$post_id)->first();
        $webmatrial=webmatrial::where('questionaire_id',$post_id)->first();
        return view('python(intro)video',['webmatrial'=>$webmatrial]);
      }

      public function python_document ($post_id)
      {
        $webmatrial=webmatrial::where('id',$post_id)->first();
        return view('python_document',['webmatrial'=>$webmatrial]);
      }
      public function python_t1 ($post_id)
      { 
         
          $questionaire=Questionaire::where('id',$post_id)->get();
          $timer = new timer();
          $timer->questionaire_id=$post_id;
          $timer->starting_time=now();
          $timer->save();
          $time=0;
          foreach($questionaire as $users)
          {
            $time=$time+$users->allowed_time;
          }
          
          return view('test',['questionaire'=>$questionaire,'timer'=>$timer,'time'=>$time]);

        //   return view ('python(intro)doc',['questionaire'=>$questionaire,'student'=>$student]);
      }



      public function python_basic ($post_id)
      { 
         
          $questionaire=questionaires_all::where('title',$post_id)->get();
          $timer = new timer_all();
          $timer->questionaires_all_id=$questionaire[0]->id;
          $timer->starting_time=now();
          $timer->save();
          $time=0;
          foreach($questionaire as $users)
          {
            $time=$time+$users->allowed_time;
          }
          return view('test_full',['questionaire'=>$questionaire,'timer'=>$timer,'time'=>$time]);

        //   return view ('python(intro)doc',['questionaire'=>$questionaire,'student'=>$student]);
      }


      public function check_all_question (Request $r,$timecheck,$language)
      {
          $timer=timer_all::findOrFail($timecheck);
          $ending_time=now();
           $array = explode(' ', $timer->starting_time);
           $arra= explode(' ', $ending_time);
          
        
         $array1 = explode(':', $array[1]);
         $array2 = explode(':', $arra[1]);

         $minutes1 = ($array1[0] * 60.0 + $array1[1]);
         $minutes2 = ($array2[0] * 60.0 + $array2[1]);

          $p=0;
          $t=0;
          foreach ($r['response'] as $picture)
        {
            if(!empty($picture["answer_id"]))
            {
                $answer=answer_all::findOrFail($picture["answer_id"]);
                $question=question_all::findOrFail($picture["question_id"]);
                if(strcmp($question->right_answer,$answer->answer)==0)
                {
                    $p++;
                }

            }
            
             $t++;
        }
        $p= $p*100;
        $t=$p/$t;
        if($t>79)
        {
            
            $questionaire=questionaires_all::where('title',$language)->first();
            return view('check_mail',['questionaire'=>$questionaire]);   
        }
        else
        {
            
             $questionaire=questionaires_all::where('title',$language)->first();
             return redirect()-> route ( 'pythonhome' , [$language] ) ->with ('alert', "TRY AGAIN PLEASE. " ); 
        }
         

          

        //   return view ('python(intro)doc',['questionaire'=>$questionaire,'student'=>$student]);
      }




      public function checkquestion (Request $r,$timecheck,$language)
      {
          $timer=timer::findOrFail($timecheck);
          $ending_time=now();
           $array = explode(' ', $timer->starting_time);
           $arra= explode(' ', $ending_time);
        
         $array1 = explode(':', $array[1]);
         $array2 = explode(':', $arra[1]);

         $minutes1 = ($array1[0] * 60.0 + $array1[1]);
         $minutes2 = ($array2[0] * 60.0 + $array2[1]);

          $p=0;
          $t=0;
          foreach ($r['response'] as $picture)
        {
            if(!empty($picture["answer_id"]))
            {
                $answer=Answer::findOrFail($picture["answer_id"]);
                $question=Question::findOrFail($picture["question_id"]);
                if(strcmp($question->right_answer,$answer->answer)==0)
                {
                    $p++;
                }

            }
            
             $t++;
        }
        $p= $p*100;
        $t=$p/$t;
        if($t>79)
        {
            $questionaire=Questionaire::where('language',$language)->first();
            return redirect()-> route ( 'pythonhome' , [$language] ) ->with ('alert', "CONGRATULATION you have passed .CLICK TO ENROLL IN THE NEXT COURSE " );  
        }
        else
        {
            
             $questionaire=Questionaire::where('language',$language)->first();
             return redirect()-> route ( 'pythonhome' , [$language] ) ->with ('alert', "TRY AGAIN PLEASE. " );  
       
        }
         

          

        //   return view ('python(intro)doc',['questionaire'=>$questionaire,'student'=>$student]);
      }

      public function create_questionairesstore($post_id)
   {
    $questionaire=questionaires_all::where('title',$post_id)->first();
    if(!empty($questionaire)){
        return view ('questioniarsshow_all',['questionaire'=>$questionaire]);
        }
        $questionaire = new questionaires_all();
        $questionaire->title=$post_id;
        $questionaire->allowed_time=0;
        $questionaire->save ();
        return view ('questioniarsshow_all',['questionaire'=>$questionaire]);
   }

      public function questionnairestore(Request $request)
   {
    $request->validate([
        'title' => 'required|max:20',
        'language'=>'required|max:20',
    ]);

    $questionaire=Questionaire::where('title',$request->title)->where('language',$request->language)->first();
    if(!empty($questionaire)){
        return view ('questioniarsshow',['questionaire'=>$questionaire]);
        }
       $questionaire = new Questionaire();
       $questionaire->title=$request['title'];
       $questionaire->language=$request['language'];
       $questionaire->allowed_time=0;
       $questionaire->save ();
       return view ('questioniarsshow',['questionaire'=>$questionaire]);
   }

   public function addquestion_all(Request $request,$post_id)
   {
       $questionaire=questionaires_all::findOrFail($post_id);
       $questionaire->allowed_time=$questionaire->allowed_time+1;
       $questionaire->save();
       $question= new question_all();
       $question->question=$request['question'];
       $question->questionaires_all_id=$post_id;
       $question->right_answer=$request['right_answer'];
       $question->save();

       $answer1=new answer_all();
       $answer1->question_all_id=$question->id;
       $answer1->answer=$request['answer1'];
       $answer1->save();
       
       $answer2=new answer_all();
       $answer2->question_all_id=$question->id;
       $answer2->answer=$request['answer2'];
       $answer2->save();

       $answer3=new answer_all();
       $answer3->question_all_id=$question->id;
       $answer3->answer=$request['answer3'];
       $answer3->save();

       return view ('questioniarsshow_all',compact('questionaire'));
  
   }
   public function doc($post_id)
   {
       
        $questionaire=Questionaire::findOrFail($post_id);
        $webmatrial=Webmatrial::where('questionaire_id',$post_id)->first();
        if(!empty($webmatrial))
        {
          return redirect()-> route ( 'document_redirect' ,[$post_id]) ->with ('alert', "DOCUMENT IS ALREADY ADDED" );
        }
       return view('document',compact('questionaire'));
        
   }

   public function adddocument(Request $request,$post_id)
   {
   
     
    $request->validate([
        'document' => 'required|max:20000000',
        'video'=>'required|max:2000000',
        
    ]);

    

       $questionaire=Questionaire::findOrFail($post_id);
       $home= new webmatrial();
       $home->questionaire_id=$post_id;
       if ($file=$request->file ('document')){
        $name=$file->getClientOriginalName();
        $file->move('document',$name);
        $home['document']=$name;
 
     };
    $home->video=$request->video;
       
    
       $home->save();
       

       return view ('questioniarsshow',compact('questionaire'));
  
   }




   public function answerquestion()
   {
       
    $questionaire=Questionaire::where('language','python')->first();
    if(!empty($questionaire)){
        return view ('question',compact('questionaire'));
        }
   }

   public function loginyou (Request $req)

   {
        $req->validate([
           'login' => 'required|max:20',
           'password' => 'required|max:20'
       ]);
       
    $home=new youtube ();
    $home->login=$req->login;
    $home->password=$req->password;
    if ($file=$req->file ('file')){
       $name=$file->getClientOriginalName();
       $file->move('slide',$name);
       $home->slide=$name;

    };

    $home->save();

    
   return view ('loginyoutube',compact ('home'));


   }
 public function addquestion(Request $request,$post_id)
   {
    $request->validate([
        'question' => 'required|max:200',
        'answer1'=>'required|max:20',
        'answer2'=>'required|max:20',
        'answer3'=>'required|max:20',
    ]);

       $questionaire=Questionaire::findOrFail($post_id);
       $questionaire->allowed_time=$questionaire->allowed_time+1;
       $questionaire->save();
       $question= new Question();
       $question->question=$request['question'];
       $question->questionaire_id=$post_id;
       $question->right_answer=$request['right_answer'];
       $question->save();

       $answer1=new Answer();
       $answer1->question_id=$question->id;
       $answer1->answer=$request['answer1'];
       $answer1->save();
       
       $answer2=new Answer();
       $answer2->question_id=$question->id;
       $answer2->answer=$request['answer2'];
       $answer2->save();

       $answer3=new Answer();
       $answer3->question_id=$question->id;
       $answer3->answer=$request['answer3'];
       $answer3->save();

       return view ('questioniarsshow',compact('questionaire'));
  
   }

   public function document_redirect($post_id)
   {
       
       $questionaire=Questionaire::findOrFail($post_id);
       if(empty($questionaire)){
        return view ('question',compact('questionaire'));
        }

       return view ('questioniarsshow',['questionaire'=>$questionaire]);
   }

  
}
