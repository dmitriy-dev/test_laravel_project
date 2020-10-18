<?php

namespace App\Http\Requests\Prize;

use Core\Prize\Prize;
use Core\Prize\PrizeActions\PrizeActionType;
use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        /** @var Prize $prize */
        $prize = $this->prize;

        $allowedActions = implode(',', PrizeActionType::ALLOWED_ACTIONS[$prize->type] ?? []);

        return [
            'action_type' => 'required|in:' . $allowedActions,
        ];
    }
}
