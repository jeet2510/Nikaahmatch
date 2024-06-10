<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class IsParent
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
        $checkEmailVerification = \DB::table('settings')->where('type', 'email_verification')->value('value');

        if (Auth::check() && Auth::user()->user_type == 'parent') {
            // Set a short cache expiration time to indicate the user is online
            $expiresAt = Carbon::now()->addMinutes(3);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);

            // Check if the user is blocked
            if (Auth::user()->blocked == 1) {
                // User is blocked, redirect to a blocked page
                return redirect()->route('user.blocked');
            }
            else {

                if (!Auth::user()->hasVerifiedEmail() && $checkEmailVerification == 1) {
                    $verificationUrl = URL::to('email/verify');
                    return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::guest($verificationUrl);
                }

                return $next($request);
            }
        } else {
            // User is not authenticated or is not a 'member'

            // Store the current URL in the session for later redirection after login
            session(['link' => url()->current()]);

            // Redirect to the login page
            return redirect()->route('user.login');
        }
    }
}