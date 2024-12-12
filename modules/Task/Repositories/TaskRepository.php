<?php

namespace Modules\Task\Repositories;

use Modules\Task\Models\Task;

class TaskRepository
{

    public function create($task):null|Task
    {


        try {
            $task = Task::query()->create($task);

        }catch (\Exception $exception){

            return null;
        }


        if (!$task->exists)
            return null;
        return $task;
    }

    public function update($task,$id):bool
    {

        try {
            $result = Task::query()->where('id',$id)->update($task);
        }catch (\Exception $exception){
            return false;
        }


        if ($result)
            return true;
        return false;
    }

    public function delete($id):bool
    {

        try {
            $result = Task::query()->where('id',$id)->delete();
        }catch (\Exception $exception){
            return false;
        }


        if ($result)
            return true;
        return false;
    }

    public function getTasksWithUser()
    {
        return Task::query()->with('user')->get();
    }

    public function findBydId($id)
    {
        return Task::query()->find($id);
    }
}
