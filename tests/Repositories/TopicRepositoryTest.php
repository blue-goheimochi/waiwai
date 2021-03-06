<?php

use Mockery as m;

class TopicRepositoryTest extends TestCase
{
    public function testCreateTopic()
    {
        $topicAliasMock = m::mock('alias:App\DataAccess\Eloquent\Topic');
        
        $topic = new stdClass();
        $topic->topic_id = 1;
        $topic->user_id  = 1;
        $topic->title    = 'Test Title';
        $topic->body     = 'Test Body';
        $topic->status   = 1;
        
        $topicAliasMock->shouldReceive('create')->andReturn($topic);
        
        $repository = new \App\Repositories\TopicRepository($topicAliasMock);
        
        $result = $repository->create([
            'user_id' => 1,
            'title'   => 'Test Title',
            'body'    => 'Test Body',
        ]);
        
        $this->assertEquals(1, $result->user_id);
        $this->assertEquals('Test Title', $result->title);
        $this->assertEquals('Test Body', $result->body);
    }
}
