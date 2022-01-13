<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Data['Comment'] = Comment::latest()->get();
        return view('home',$Data);
    }

    public function comment(){
        $Comment = new Comment();
        $Comment->comment = request('comment');
        $Comment->email = auth()->user()->email;
        $Comment->save();
        return back();
    }

  
}
