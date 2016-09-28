<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function getNewComment($topic_id)
    {
        $topic = Topic::where('id', $topic_id)->where('status', 1)->firstOrFail();
        return view('comment.new', ['topic' => $topic]);
    }
    
    public function postNewComment(Request $request)
    {
        $this->validate($request, [
            'body'     => 'required|max:5000',
            'topic_id' => 'required',
        ]);
        
        $inputs = $request->all();
        
        return view('comment.confirm', compact('inputs'));
    }
    
    public function postStoreComment(Request $request)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/comment/new/' . $request->get('topic_id'))->withInput($request->only(['body', 'topic_id']));
        }
        
        $this->validate($request, [
            'body'     => 'required|max:5000',
            'topic_id' => 'required',
        ]);
        
        $inputs = $request->all();
        $user   = Auth::user();
        $topic  = Topic::where('id', $inputs['topic_id'])->where('status', 1)->firstOrFail();
        
        $comment = new Comment;
        $comment->user_id  = $user->id;
        $comment->topic_id = $topic->id;
        $comment->body    = $inputs['body'];
        $comment->save();
        
        return Redirect::to('/comment/complete/' . $topic->id . '/' . $comment->id);
    }
    
    public function getCompleteComment($topic_id, $comment_id)
    {
        return view('comment.complete', ['topic_id' => $topic_id, 'comment_id' => $comment_id]);
    }
}
