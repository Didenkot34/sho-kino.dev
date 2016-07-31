<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect(Request $request, $provider)
    {
        session(['previousUrl' => $request->session()->previousUrl()]);
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, Request $request, $provider)
    {

        $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);

        auth()->login($user);
        if ($request->session()->has('previousUrl')) {
            
            return redirect(session('previousUrl'));
        }
        return redirect()->to('/');
    }
}
