<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect(Request $request)
    {
        session(['previousUrl' => $request->session()->previousUrl()]);
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service, Request $request)
    {

        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);
        if ($request->session()->has('previousUrl')) {
            
            return redirect(session('previousUrl'));
        }
        return redirect()->to('/');
    }
}
