<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Compain;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use App\Http\Requests\CompainRequest;
use App\Http\Resources\CompainResource;

class CompainController extends Controller
{
    private $apiResponse;
    public function __construct(ApiResponse $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->apiResponse
            ->setSuccess("compains data has been loaded successfully")->setData(CompainResource::collection(Compain::all()))->returnJSON();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompainRequest $request)
    {
        $images = [];
        foreach ($request->images as $image) {
            $image_name = time(). uniqid() . "." . $image->extension();
            $image->move(public_path('uploads'), $image_name);
            $images[] = "uploads/" . $image_name;
        }
        $compain = compain::create(array_merge(["images" => $images], $request->except("images")));
        return $this->apiResponse
            ->setSuccess("compain data has been added successfully")
            ->setData(new CompainResource($compain))
            ->returnJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compain  $compain
     * @return \Illuminate\Http\Response
     */
    public function show(Compain $compain)
    {
        return $this->apiResponse
            ->setSuccess("compain data has been loaded successfully")
            ->setData(new CompainResource($compain))
            ->returnJSON();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compain  $compain
     * @return \Illuminate\Http\Response
     */
    public function update(CompainRequest $request, Compain $compain)
    {
        if ($request->has("images")) {
            $images = [];
            foreach ($request->images as $image) {
                $image_name = time(). uniqid() . "." . $image->extension();
                $image->move(public_path('uploads'), $image_name);
                $images[] = "uploads/" . $image_name;
            }
            $compain->update(array_merge(["images" => $images], $request->except("images")));
        }
        $compain->update($request->except("images"));
        return $this->apiResponse
            ->setSuccess("compain data has been updated successfully")
            ->setData(new CompainResource($compain))
            ->returnJSON();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compain  $compain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compain $compain)
    {
        $compain->delete();
        return $this->apiResponse
            ->setSuccess("compain data has been deleted successfully")
            ->setData(new CompainResource($compain))
            ->returnJSON();
    }
}
