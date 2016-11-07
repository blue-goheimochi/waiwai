<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\LinkRepositoryInterface;
use App\Http\Requests\LinkStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{

    /** @var UserRepositoryInterface */
    protected $user;

    /** @var TopicRepositoryInterface */
    protected $topic;

    /** @var linkRepositoryInterface */
    protected $link;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user, TopicRepositoryInterface $topic, LinkRepositoryInterface $link)
    {
        $this->user  = $user;
        $this->topic = $topic;
        $this->link  = $link;
    }
    
    public function getNewLink()
    {
        return view('link.new');
    }
    
    public function postNewLink(LinkStoreRequest $request)
    {
        $inputs = $request->all();
        
        return view('link.confirm', compact('inputs'));
    }
    
    public function postStoreLink(LinkStoreRequest $request)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/link/new')->withInput($request->only(['link', 'body']));
        }
        
        $inputs = $request->all();
        $user = Auth::user();
        
        $params = [
            'user_id' => $user->id,
            'title'   => $inputs['title'],
            'body'    => $inputs['body'],
        ];
        $newTopic = $this->topic->create($params);
        
        return Redirect::to('/link/complete/' . $newTopic->id);
    }
    
    public function getCompleteTopic($id)
    {
        return view('link.complete', ['id' => $id]);
    }
}
