<?php

namespace App\Http\Middleware;

use Google_Client;
use Google_Service_Plus;
use Closure;

class GoogleOauthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $google_client_token = session()->get('google_token');

        if (!isset($google_client_token)) {
            return redirect('/login');
        }

        $client = new Google_Client();
        $client->setApplicationName("Makerspace");
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setAccessToken(json_encode($google_client_token));
        $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");

        $this->getMe($client);

        return $next($request);
    }

    /**
     * This will get the name and icon of the requested user and put it in a instance called user.
     * @param Google_Client $client the logged in client
     */
    private function getMe(Google_Client $client) {
        $me = (new Google_Service_Plus($client))->people->get("me");
        app()->instance('user', [
            'name' => $me['displayName'],
            'icon' => $me['image']['url'],
            'teacher' => ($me['domain'] == 'ga.ntig.se'),
        ]);
    }
}
