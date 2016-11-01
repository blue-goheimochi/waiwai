<?php

namespace App\Repositories;

interface CommentRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getComment($id);
    
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);
}
