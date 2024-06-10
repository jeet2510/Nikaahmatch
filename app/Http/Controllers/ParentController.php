<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Member;
use App\Models\CountryCode;
use App\Models\Package;
use App\Rules\RecaptchaRule;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Utility\EmailUtility;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Notifications\DbStoreNotification;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\OTPVerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ParentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function addChild(Request $request)

    {
        $request->merge([
            'date_of_birth' => '01-01-' . $request->input('date_of_birth')
        ]);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'country_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'gender' => 'required|integer|min:1|max:2',
            'date_of_birth' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'checkbox_example_1' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['parent_id'] = Auth::user()->id;

        $user = User::create($validatedData);
        return view('frontend.register_success');

        return redirect()->route('login')->with('success', 'User created successfully.');
    }

    public function addChildPage(Request $request)
    {
        return view('frontend.parent.createChild');
    }

    public function loginAschild(Request $request, $id)
    {
        $child = User::find($id);

        if ($child && $child->parent_id == Auth::user()->id) {

            try{

                Session::put([
                    'impersonate_login' => true,
                    'parent_id' => Auth::user()->id,
                ]);

                Auth::logout();

                if (Auth::check()) {
                    Auth::logout();
                }

                Auth::login($child);

                return redirect()->route('dashboard');
            } catch(\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

        } else {
            return redirect()->back()->withError('You are not authorized to perform this action');
        }
    }

    public function loginBackAsParent()
    {
        $id = session('parent_id');
        Session::forget(['impersonate_login', 'parent_id']);
        $parent = User::find($id);
        Auth::logout();
        Auth::login($parent);
        return redirect()->route('parent.dashboard');
    }

}
