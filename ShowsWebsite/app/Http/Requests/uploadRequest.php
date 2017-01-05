<?php
namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class uploadRequest extends FormRequest
{
    //check authorisation
    public function authorize()
    {
        if(Auth::check())
        {
            return true;
        }

        return false;
    }

    //check the rules
    public function rules()
    {
        return [
            "name" => "required",
            "description" => "required",
            "path" => "required|file"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Gelieve een naam in te geven.",
            "description.required" => "Gelieve een beschrijving in te geven.",
            "path.required" => "Gelieve een file te uploaden",
            "path.file" => "Gelieve een file te uploaden"
        ];
    }
}