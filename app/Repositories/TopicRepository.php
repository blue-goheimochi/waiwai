<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Topic;

class TopicRepository implements TopicRepositoryInterface
{
    /** @var Topic */
    protected $eloquent;
    
    public function __construct(Topic $eloquent)
    {
        $this->eloquent = $eloquent;
    }
    
    public function getTopic($id)
    {
        return $this->eloquent->where('id', $id)->where('status', 1)->firstOrFail();
    }
    
    public function getNewTopics($num = 5)
    {
        return $this->eloquent->where('status', 1)->orderBy('created_at', 'desc')->take($num)->get();
    }
    
    public function create(array $params)
    {
        return $this->eloquent->create($params);
    }
}
