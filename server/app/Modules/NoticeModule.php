<?php
namespace App\Modules;

use App\Notice;
use App\Http\Resources\Notice as NoticeResource;

class NoticeModule extends BaseModule
{
    /**
     * Returns all notices
     */
    public function list()
    {
        try {
            $notices = Notice::all();
            // $notices = Notice::paginate(10);
            // $notices = Notice::all()->sortByDesc("updated_at")->values();
            // $notices = Notice::paginate(10)->sortByDesc("updated_at")->values();

            $resources = NoticeResource::collection($notices);
            // Return a collection of notices
            return $this->success(200, $resources);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return $this->error(500, [], 'Error occurred while retrieving notices list');
        }
    }
 
    /**
     * Returns requested notice by given id
     * 
     * @param integer $id Id of the requested notice
     */
    public function get($id)
    {
        try {
            // Get the notice
            $notice = Notice::find($id);

            if (!$notice) {
                return $this->error(404, [], 'Notice Not Found');
            }
     
            // Return a single notice
            $resource = new NoticeResource($notice);
            return $this->success(200, $resource);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return $this->error(500, [], 'Error occurred while retrieving notice');
        }
    }
 
    /**
     * Delete requested notice by given id
     * 
     * @param integer $id Id of the requested notice
     */
    public function destroy($id)
    {
        try {
            // Get the notice
            $notice = Notice::find($id);

            if (!$notice) {
                return $this->error(404, [], 'Notice Not Found');
            }

            if ($notice->delete()) {
                return $this->success(200, [], 'Notice deleted sucessfully');
            }

            return $this->error(500, [], 'Error occurred while deleting notice');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return $this->error(500, [], 'Error occurred while deleting notice');
        }
    }
 
    /**
     * Create notice
     * 
     * @param $data array
     * [
     *     "title" => "Sample notice title",
     *     "description" => "Sample notice description"
     * ]
     */
    public function create($data)
    {
        try {
            $notice = new Notice;

            // TODO: Validation

            $notice->title = $data['title'];
            $notice->description = $data['description'];

            if ($notice->save()) {
                $resource = new NoticeResource($notice);
                return $this->success(200, $resource, 'Notice created sucessfully');
            }

            return $this->error(500, [], 'Error occurred while creating notice');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return $this->error(500, [], 'Error occurred while creating notice');
        }
    }

    /**
     * Update notice
     * 
     * @param integer $id Id of the requested notice
     * @param $data array
     * [
     *     "title" => "Updated notice title",
     *     "description" => "Updated notice description"
     * ]
     */
    public function update($id, $data)
    {
        try {
            // Get the notice
            $notice = Notice::find($id);

            if (!$notice) {
                return $this->error(404, [], 'Notice Not Found');
            }

            // TODO: Validation

            $notice->title = $data['title'];
            $notice->description = $data['description'];

            if ($notice->save()) {
                $resource = new NoticeResource($notice);
                return $this->success(200, $resource, 'Notice updated sucessfully');
            }
            
            return $this->error(500, [], 'Error occurred while updating notice');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return $this->error(500, [], 'Error occurred while updating notice');
        }
    }
}