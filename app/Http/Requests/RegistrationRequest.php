<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;


class RegistrationRequest extends FormRequest
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


        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ];
    }

    public function persist()
    {

        // create and save the user

        $user = User::create(
            $this->only(['name', 'email', 'password'])
        );

//        $user = User::create(request(['name', 'email', 'password']));

        // sign them in

        auth()->login($user);

        //mail new user
        Mail::to($user)->send(new Welcome($user));

    }
}
