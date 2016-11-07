<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TopicRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /** @var TopicRepositoryInterface */
    protected $topic;
    
    public function __construct(TopicRepositoryInterface $topic)
    {
        $this->topic = $topic;
    }
    
    public function getIndex()
    {
        $topics = $this->topic->getNewTopics(10);
        return view('home', ['topics' => $topics]);
    }
}
