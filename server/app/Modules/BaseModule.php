<?php
namespace App\Modules;

class BaseModule {
    /**
     * Success response
     * 
     * @param
     * Sample arguments
     * $status = 201;
     * $data = [
     *     'data' => [
     *         'id' => 1
     *         'title' => 'Sample Title',
     *         ...
     *     ]
     * ];
     * $message = 'Data saved successfully';
     */
    protected function success($status, $data = [], $message = 'success')
    {
        return [
            'error' => false,
            'statusCode' => $status,
            'data' => $data,
            'message' => $message
        ];
    }

    /**
     * Error response
     * 
     * @param
     * Sample arguments
     * $status = 404;
     * $data = [];
     * $message = 'Data Not Found';
     */
    protected function error($status, $data = [], $message = 'error')
    {
        $response = [
            'error' => true,
            'statusCode' => $status,
            'data' => $data,
            'message' => $message
        ];

        error_log(json_encode($response));

        return $response;
    }
}