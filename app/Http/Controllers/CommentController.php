<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    /** @var UserRepositoryInterface */
    protected $user;

    /** @var TopicRepositoryInterface */
    protected $topic;

    /** @var CommentRepositoryInterface */
    protected $comment;
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user, TopicRepositoryInterface $topic, CommentRepositoryInterface $comment)
    {
        $this->user    = $user;
        $this->topic   = $topic;
        $this->comment = $comment;
    }
    
    public function getNewComment($topic_id)
    {
        $topic = $this->topic->getTopic($topic_id);
        return view('comment.new', ['topic' => $topic]);
    }
    
    public function postNewComment(CommentStoreRequest $request)
    {
        $inputs = $request->all();
        
        return view('comment.confirm', compact('inputs'));
    }
    
    public function postStoreComment(CommentStoreRequest $request)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/comment/new/' . $request->get('topic_id'))->withInput($request->only(['body', 'topic_id']));
        }
        
        $inputs = $request->all();
        $user   = Auth::user();
        $topic  = $this->topic->getTopic( $inputs['topic_id']);
        
        $params = [
            'user_id'  => $user->id,
            'topic_id' => $topic->id,
            'body'     => $inputs['body'],
        ];
        $newComment = $this->comment->create($params);
        
        return Redirect::to('/comment/complete/' . $topic->id . '/' . $newComment->id);
    }
    
    public function getCompleteComment($topic_id, $comment_id)
    {
        return view('comment.complete', ['topic_id' => $topic_id, 'comment_id' => $comment_id]);
    }
}
