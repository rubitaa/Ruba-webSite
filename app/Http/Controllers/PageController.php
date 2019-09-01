<?php

namespace App\Http\Controllers;

use App\Article;
use function Couchbase\defaultEncoder;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function  __construct()
    {
    //@$this ->middleware('CheckDay')->except('about');
    }

    public function  index()
    {
        $articles = Article::take(3)->orderBy('id','DESC')->get();
        return view('index',compact('articles'));
    }

    public function contact()

    {
        $options = ['General'=>'General massage','development'=>'website development'];
        $massage = __('Pleas fill in the form below');
        $user = auth()->user();

        return view('contact',compact('massage','user','options'));
    }

    public function storeContact(Request $request)
    {
        $request->validate(
            [
            'user_name'=>'required|max:10',
            'descrbtion'=>'required|min:40'
            ]);

        $request->session()->put('username',$request->user_name) ;

        return back();
    }
    public function about(Request $request)
    {
        $userName = $request->session()->get('username','ruby');

        return view('about',compact('userName'));
    }
}
