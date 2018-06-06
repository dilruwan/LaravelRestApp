<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\NoticeModule;

class NoticeController extends Controller
{
    /**
     * Returns all notices
     */
    public function index()
    {
        $noticeModule = new NoticeModule();
        $response = $noticeModule->list();
        return $this->response($response);
    }
 
    /**
     * Returns requested notice by given id
     * 
     * @param integer $id Id of the requested notice
     */
    public function show($id)
    {
        $noticeModule = new NoticeModule();
        $response = $noticeModule->get($id);
        return $this->response($response);
    }
 
    /**
     * Delete requested notice by given id
     * 
     * @param integer $id Id of the requested notice
     */
    public function destroy($id)
    {
        $noticeModule = new NoticeModule();
        $response = $noticeModule->destroy($id);
        return $this->response($response);
    }
 
    /**
     * Create notice
     * 
     * Sample json input
     * {
     *     "data": {
     *         "title": "Sample notice title",
     *         "description": "Sample notice description"
     *     }
     * }
     */
    public function store(Request $request)
    {
        $data = $request->input('data');
        $noticeModule = new NoticeModule();
        $response = $noticeModule->create($data);
        return $this->response($response);
    }

    /**
     * Update notice
     * 
     * @param integer $id Id of the requested notice
     */
    public function update(Request $request, $id)
    {
        $data = $request->input('data');
        $noticeModule = new NoticeModule();
        $response = $noticeModule->update($id, $data);
        return $this->response($response);
    }
}