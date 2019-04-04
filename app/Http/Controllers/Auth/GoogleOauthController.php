<?php

namespace App\Http\Controllers\Auth;

use Google_Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleOauthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @param Request $request
     * @return void
     */

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Set token for the Google API PHP Client
        $google_client_token = [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];

        $client = new Google_Client();
        $client->setApplicationName("Makerspace");
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setAccessToken(json_encode($google_client_token));

        session(['google_token' => $client->getAccessToken()]);

        //dd(session()->get('google_token'));
        return redirect('/');
    }
}
