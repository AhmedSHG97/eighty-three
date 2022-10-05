<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() == "POST" && $this->path() == "api/compains") {
            return [
                "name" => "required|string|min:2",
                "from" => "required|date",
                "total" => "required|numeric|min:1",
                "daily_budget" => "required|numeric|min:1",
                "to" => "required|date|after:from",
                "images" => "required|array",
                "images.*" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ];
        }
        if ($this->method() == "PATCH" && str_contains($this->path(), "api/compains")) {
            return [
                "name" => "required|string|min:2",
                "from" => "required|date",
                "total" => "required|numeric|min:1",
                "daily_budget" => "required|numeric|min:1",
                "to" => "required|date|after:from",
                "images" => "nullable|array",
                "images.*" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ];
        }
        return [];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null
                ],
                400
            )
        );
    }
}
