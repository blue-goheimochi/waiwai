<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    /** @var Comment */
    protected $eloquent;
    
    public function __construct(Comment $eloquent)
    {
        $this->eloquent = $eloquent;
    }
    
    public function getComment($id)
    {
        return $this->eloquent->where('id', $id)->where('status', 1)->firstOrFail();
    }
    
    public function create(array $params)
    {
        return $this->eloquent->create($params);
    }
}
