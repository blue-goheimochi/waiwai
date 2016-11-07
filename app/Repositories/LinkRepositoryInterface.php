<?php

namespace App\Repositories;

interface LinkRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getLink($id);
    
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);
}
