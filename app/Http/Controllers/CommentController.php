<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\Auth;

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
    
    public function postNew(CommentStoreRequest $request)
    {
        $inputs = $request->all();
        $user   = Auth::user();
        $topic  = $this->topic->getTopic( $inputs['topic_id']);
        
        $params = [
            'user_id'  => $user->id,
            'topic_id' => $topic->id,
            'body'     => $inputs['body'],
        ];
        return $this->comment->create($params);
    }
}
