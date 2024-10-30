<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'request_id' => 'required|string|max:255',
            'data' => 'required|array',
            'data.*.name_org' => 'required|string|max:255',
            'data.*.name' => 'required|regex:/^[a-zA-Zа-яА-Я]+$/u|string|max:255',
            'data.*.surname' => 'required|regex:/^[a-zA-Zа-яА-Я]+$/u|string|max:255',
            'data.*.middle_name' => 'nullable|regex:/^[a-zA-Zа-яА-Я]+$/u|string|max:255',

            'data.*.work_date' => 'required|date',

            'data.*.work_position' => 'required|regex:/^[a-zA-Zа-яА-Я0-9\s]+$/u|string|max:255',
            'data.*.work_department' => 'required|regex:/^[a-zA-Zа-яА-Я0-9\s]+$/u|string|max:255',

            'data.*.place_requirement' => 'required|regex:/^[a-zA-Zа-яА-Я0-9\s]+$/u|string|max:255',
            'data.*.full_name_hr' => 'required|regex:/^[a-zA-Zа-яА-Я0-9\s.]+$/u|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'request_id.required' => 'Обязательное поле :attribute',
            'request_id.max' => ':attribute не может быть более 255 символов',

            'data.required' => 'Обязательное поле :attribute',
            'data.array' => ':attribute должно быть массивом',

            'data.*.name_org.required' => 'Обязательное поле :Attribute',
            'data.*.name_org.max' => ':Attribute не может быть более 255 символов',

            'data.*.name.required' => 'Обязательное поле :Attribute',
            'data.*.name.max' => ':Attribute не может быть более 255 символов',
            'data.*.name.regex' => 'Только буквы в :Attribute',

            'data.*.surname.required' => 'Обязательное поле :Attribute',
            'data.*.surname.max' => ':Attribute не может быть более 255 символов',
            'data.*.surname.regex' => 'Только буквы в :Attribute',

            'data.*.work_date.required' => 'Обязательное поле :Attribute',
            'data.*.work_date.date' => 'Должен быть формат даты :Attribute',

            'data.*.work_position.required' => 'Обязательное поле :Attribute',
            'data.*.work_position.max' => ':Attribute не может быть более 255 символов',
            'data.*.work_position.regex' => 'Только буквы и цифры в :Attribute',

            'data.*.work_department.required' => 'Обязательное поле :Attribute',
            'data.*.work_department.max' => ':Attribute не может быть более 255 символов',
            'data.*.work_department.regex' => 'Только буквы и цифры в :Attribute',

            'data.*.place_requirement.required' => 'Обязательное поле :Attribute',
            'data.*.place_requirement.max' => ':Attribute не может быть более 255 символов',
            'data.*.place_requirement.regex' => 'Только буквы и цифры в :Attribute',

            'data.*.full_name_hr.required' => 'Обязательное поле :Attribute',
            'data.*.full_name_hr.max' => ':Attribute не может быть более 255 символов',
            'data.*.full_name_hr.regex' => 'Только буквы и точка в :Attribute'
        ];
    }
}
