<?php

use Mockery as m;

class UserRepositoryTest extends TestCase
{
    public function testCreateUser()
    {
        $userAliasMock = m::mock('alias:App\DataAccess\Eloquent\User');
        
        $user = new stdClass();
        $user->name     = 'test';
        $user->email    = 'test@test.com';
        $user->password = bcrypt('test');
        
        $userAliasMock->shouldReceive('create')->andReturn($user);
        
        $repository = new \App\Repositories\UserRepository($userAliasMock);
        
        $result = $repository->create([
            'name'     => 'test',
            'email'    => 'test@test.com',
            'password' => 'test',
        ]);
        
        $this->assertTrue(\Hash::check('test', $result->password));
    }
}
