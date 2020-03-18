<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{
    function index()
    {

     $faqs = Faq::all();
     return view('faq.index', compact('faqs'));
    }

    function faq_insert(Request $request)
    {

     $request->validate([
       'faq_question' => 'required',
       'faq_answer'   => 'required',
     ],[
       'faq_question.required' => 'faq koi?',
     ]);

      Faq::insert([
        'faq_question' =>$request->faq_question,
        'faq_answer'  =>$request->faq_answer,
        'created_at'  => Carbon::now(),
      ]);
      // header('location:faq.index.php');
      return back();
    }
    function faq_delete($faq_id)
    {
     Faq::find($faq_id)->delete();
     return back();
    }
}
