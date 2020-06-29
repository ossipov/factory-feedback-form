<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Factories\StoreDataFactory;

class FeedbackFormRequest extends FormRequest
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
     * Persists with form submission
     *
     * @throws \Exception
     */
    public function persist() {
        $data = $this->only(['name', 'email', 'feedback']);

        $file = StoreDataFactory::in(env('FEEDBACK_STORAGE_PROVIDER', 'File'));
        $result = $file::save($data);

        return response()->json($result);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required','email'],
            'feedback' => 'required'
        ];
    }
}
