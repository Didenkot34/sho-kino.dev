<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {

        $providerUser = Socialite::driver('facebook')->user();
        dd($providerUser->getAvatar());
    }
}
