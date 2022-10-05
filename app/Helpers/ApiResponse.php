<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

class ApiResponse
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ResponseFactory
     */
    protected $response;

    /**
     * @var array
     */
    protected $body;

    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * Set response data.
     *
     * @param $data
     * @return $this
     */
    public function setData($data = null): object
    {
        $this->body['data'] = $data;
        return $this;
    }

    public function setError($error): object
    {
        $this->body['status'] = false;
        $this->body['message'] = $error;
        return $this;
    }

    public function setSuccess($message): object
    {
        $this->body['status'] = true;
        $this->body['message'] = $message;
        return $this;
    }

    public function returnJSON(): JsonResponse
    {
        // $responsecode = 200;
        // if ($this->body['status'] == false) {
        //     $responsecode = 400;
        // }
        $responsecode = $this->body['status'] == false ? 400 : 200;
        return $this->response->json($this->body, $responsecode, [], JSON_NUMERIC_CHECK);
    }
}