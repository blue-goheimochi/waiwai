<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\TopicStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{

    /** @var UserRepositoryInterface */
    protected $user;

    /** @var TopicRepositoryInterface */
    protected $topic;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user, TopicRepositoryInterface $topic)
    {
        $this->user  = $user;
        $this->topic = $topic;
    }
    
    public function getTopicDetail($id)
    {
        $topic = $this->topic->getTopic($id);
        return view('topic.detail', ['topic' => $topic]);
    }
    
    public function getNewTopic()
    {
        return view('topic.new');
    }
    
    public function postNewTopic(TopicStoreRequest $request)
    {
        $inputs = $request->all();
        
        return view('topic.confirm', compact('inputs'));
    }
    
    public function postStoreTopic(TopicStoreRequest $request)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/topic/new')->withInput($request->only(['title', 'body']));
        }
        
        $inputs = $request->all();
        $user = Auth::user();
        
        $params = [
            'user_id' => $user->id,
            'title'   => $inputs['title'],
            'body'    => $inputs['body'],
        ];
        $newTopic = $this->topic->create($params);
        
        return Redirect::to('/topic/complete/' . $newTopic->id);
    }
    
    public function getCompleteTopic($id)
    {
        return view('topic.complete', ['id' => $id]);
    }
}
