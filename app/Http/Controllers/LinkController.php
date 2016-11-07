<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\LinkRepositoryInterface;
use App\Http\Requests\LinkStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\CrawlerService;

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

    public function postNewLink(LinkStoreRequest $request, CrawlerService $crawler)
    {
        $inputs = $request->all();

        $crawler->getUrl($inputs['link']);
        $title = $crawler->getTitle();
        $description = $crawler->getDescription();

        return view('link.confirm', compact('inputs', 'title', 'description'));
    }

    public function postStoreLink(LinkStoreRequest $request, CrawlerService $crawler)
    {
        if( $request->get('action') === 'back' ) {
          return Redirect::to('/link/new')->withInput($request->only(['link', 'body']));
        }

        $inputs = $request->all();
        $user = Auth::user();

        $crawler->getUrl($inputs['link']);
        $title = $crawler->getTitle();
        $description = $crawler->getDescription();

        $params = [
            'user_id'     => $user->id,
            'link'        => $inputs['link'],
            'title'       => $title,
            'description' => $description,
        ];
        $newLink = $this->link->create($params);

        $params = [
            'user_id' => $user->id,
            'title'   => $title,
            'body'    => $inputs['body'],
            'link_id' => $newLink->id,
        ];
        $newTopic = $this->topic->create($params);

        return Redirect::to('/link/complete/' . $newTopic->id);
    }

    public function getCompleteLink($id)
    {
        return view('link.complete', ['id' => $id]);
    }
}
