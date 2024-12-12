<?php

namespace Modules\Task\Http\Response;

use Illuminate\Http\Response;

class TaskResponse
{

    public static function failedTaskStoreResponse()
    {
        response()->json([
            'message'=>"Unable To Create Task"
        ],Response::HTTP_INTERNAL_SERVER_ERROR)->throwResponse();
    }

    public static function successTaskStoreResponse($task)
    {
        response()->json([
            'task'=>$task
        ],Response::HTTP_CREATED)->throwResponse();
    }

    public static function successResponse()
    {
        \response()->json([],Response::HTTP_NO_CONTENT);
    }
    public static function failedResponse()
    {
        \response()->json([],Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function getTasksResponse($tasks)
    {
        \response()->json([
            'tasks'=>$tasks
        ])->throwResponse();
    }

    public static function singleTaskResponse($task)
    {
        response()->json([
            'task'=>$task
        ])->throwResponse();
    }
}
