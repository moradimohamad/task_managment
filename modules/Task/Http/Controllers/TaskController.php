<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskRequest;
use Modules\Task\Http\Response\TaskResponse;
use Modules\Task\Repositories\TaskRepository;

class TaskController extends Controller
{


    public function index()
    {
        $tasks= resolve(TaskRepository::class)->getTasksWithUser();

        TaskResponse::getTasksResponse($tasks);
    }

    public function show($id)
    {
        $task=resolve(TaskRepository::class)->findBydId($id);
        TaskResponse::singleTaskResponse($task);

    }
    public function store(StoreTaskRequest $request)
    {


        $task = resolve(TaskRepository::class)->create(array_merge($request->validated(),['user_id'=>auth()->id()]));


        if (is_null($task))
            TaskResponse::failedTaskStoreResponse();

        TaskResponse::successTaskStoreResponse($task);

    }

    public function update(UpdateTaskRequest $request,$id)
    {
        $result =resolve(TaskRepository::class)->update($request->validated(),$id);

        $result ? TaskResponse::successResponse():TaskResponse::failedResponse();
    }

    public function destroy($id)
    {
        $result =resolve(TaskRepository::class)->delete($id);

        $result ? TaskResponse::successResponse():TaskResponse::failedResponse();
    }
}
