<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;
use Validator;
use Auth;
use App\User;

class AuthAjaxController extends MyController
{

    protected $rulesForSignIn = [
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
    ];
    protected $rulesForSignUp = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ];

    protected $errorMessages = [
        'required' => 'Поле :attribute должно быть заполнено.',
        'unique' => 'Пользователь с даннным :attribute уже существует',
        'confirmed' => 'Пароли не совпадают',
        'email' => 'Не коректный :attribute ',
        'max' => 'Значение поля  :attribute должно быть меньше или равно :max.',
        'min' => 'Значение поля  :attribute должно быть больше или равно :min.',
    ];

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    protected function signIn(Request $request)
    {
        $validator = $this->validator($request->all(), $this->rulesForSignIn, $this->errorMessages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => true,
                'messages' => $validator->messages()
            ]);
        }
        if (!Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])
        ) {
            return response()->json([
                'errors' => true,
                'messages' => ['signIn' => 'Email или Password не совпадают']
            ]);

        }
        return response()->json([
            'errors' => false,
            'messages' => ['success' => 'С возвращением, ' . Auth::user()->name . '!' ]
        ]);

    }

    /**
     * registration
     *
     * @params Request
     * @return Response
     */
    public function signUp(Request $request)
    {
        $validator = $this->validator($request->all(), $this->rulesForSignUp, $this->errorMessages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => true,
                'messages' => $validator->messages()
            ]);
        }
        if ($user = $this->create($request->all())) {
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
            return response()->json([
                'errors' => false,
                'messages' => ['success' => $user->name .', Вы успешно зарегестрировались.']
            ]);
        }
    }

    /**
     * Get a validator for an incoming registration or authorization request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, array $rules, array $errorMessages)
    {
        return Validator::make($data, $rules, $errorMessages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
