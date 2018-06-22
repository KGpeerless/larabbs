<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use Helpers;

    public function errorResponse($statusCode, $message=null, $code=0)
    {
        throw new HttpException($statusCode, $message, null, [], $code);
    }

    public function checkAndGet($id, $message = '')
    {
        $table = $this->model->getTable();
        $config = config("status.{$table}");
        $info = $this->model->find($id);
        
        if (!$info || $info->status != $config['available']) {
            abort(404, $message ? $message : "This {$table} does not exist.");
        }
        return $info;
    }
}

