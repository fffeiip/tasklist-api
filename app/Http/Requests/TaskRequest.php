<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $validAtributesSortOptions = array_keys(Task::find(1)->getAttributes());
        $validOrderType = ['asc', 'desc'];
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'task_done_date' => 'nullable|date',
            'user_id' => 'nullable|exists:users,id',
            'orderBy' => ['nullable', 'in:' . implode(',', $validAtributesSortOptions)],            // 'orderBy' =>  ['nullable','in:' , implode(',', $validAtributesSortOptions)],
            'orderType' => ['nullable', 'in:' . implode(',', $validOrderType)]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], 400));
    }
}
