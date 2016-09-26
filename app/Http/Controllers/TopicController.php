<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function getTopicDetail($id)
    {
        $topic = Topic::where('id', $id)->where('status', 1)->firstOrFail();
        return view('topic.detail', ['topic' => $topic]);
    }
    
    public function getNewTopic()
    {
        return view('topic.new');
    }
    
    public function postNewTopic(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:200',
            'body'  => 'required|max:5000',
        ]);
        
        $inputs = $request->all();
        
        return view('topic.confirm', compact('inputs'));
    }
    
    public function postStoreTopic(Request $request)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/topic/new')->withInput($request->only(['title', 'body']));
        }
        
        $this->validate($request, [
            'title' => 'required|max:200',
            'body'  => 'required|max:5000',
        ]);
        
        $inputs = $request->all();
        $user = Auth::user();
        
        $topic = new Topic;
        $topic->user_id = $user->id;
        $topic->title   = $inputs['title'];
        $topic->body    = $inputs['body'];
        $topic->save();
        
        return Redirect::to('/topic/complete/' . $topic->id);
    }
    
    public function getCompleteTopic($id)
    {
        return view('topic.complete', ['id' => $id]);
    }
}
