<?php

namespace Modules\Task\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Modules\Task\Models\Task;
use Modules\User\Models\User;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_create_task(): void
    {

        $this->withoutExceptionHandling();
        $user=User::factory()->create();
        $this->actingAs($user);
        $data=[
            'title'=>"dumy title",
            'description'=>"some dummy descs",
            'priority'=>1
        ];
        $response = $this->postJson('/api/tasks/create',$data);

        $this->assertSame(['api','auth:api'],request()->route()->middleware());
        $this->assertDatabaseCount('tasks',1);
        $this->assertSame(Task::first()->user_id,$user->id);
        $response->assertStatus(Response::HTTP_CREATED);
    }


    public function test_unAuthenticated_user_can_not_create_task(): void
    {

        $data=[
            'title'=>"dumy title",
            'description'=>"some dummy descs",
            'priority'=>1
        ];
        $response = $this->postJson('/api/tasks/create',$data);

        $response->assertUnauthorized();
        $this->assertDatabaseCount('tasks',0);

    }

}
