<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Link;

class LinkRepository implements LinkRepositoryInterface
{
    /** @var Link */
    protected $eloquent;
    
    public function __construct(Link $eloquent)
    {
        $this->eloquent = $eloquent;
    }
    
    public function getLink($id)
    {
        return $this->eloquent->where('id', $id)->where('status', 1)->firstOrFail();
    }
    
    public function create(array $params)
    {
        return $this->eloquent->create($params);
    }
}
