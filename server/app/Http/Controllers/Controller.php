<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    /**
     * Controller response
     *
     * @param
     * Sample arguments
     * $data = [
     *     'error' => false,
     *     'statusCode' => 200,
     *     'data' => [
     *         'id' => 1
     *         'title' => 'Sample Title',
     *         ...
     *     ],
     *     'message' => 'Success'
     * ]
     */
    protected function response($data)
    {
        $statusCode = $data['statusCode'];
        return response()->json($data, $statusCode);
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
