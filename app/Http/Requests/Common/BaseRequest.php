<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        return $this->all() + $this -> route() -> parameters();
    }

}
