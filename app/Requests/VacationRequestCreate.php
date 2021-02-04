<?php


namespace App\Requests;


use Illuminate\Foundation\Http\FormRequest;

class VacationRequestCreate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'startDate' => 'required|date_format:m/d/Y',
            'endDate' => 'required|date_format:m/d/Y|after:start_date',
        ];
    }
}