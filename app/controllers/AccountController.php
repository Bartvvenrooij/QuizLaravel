<?php

/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 11:40
 */
class AccountController extends BaseController
{

    public function getLogin()
    {
        return View::make('pages.account.login');
    }

    public function getRegister()
    {
        return View::make('pages.account.register');
    }

    public function getForgotPassword()
    {
        return View::make('pages.account.forgot');
    }

    public function store()
    {
        $repo = App::make('UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject('Ativation');
                    }
                );
            }

            return Redirect::to('login')
                ->with('notice', Lang::get('confide::confide.alerts.account_created'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::to('register')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    public function login()
    {
        if (Confide::user()) {
            return Redirect::to('/');
        } else {
            return View::make('login');
        }
    }

    public function doLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            return Redirect::to('/');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@doForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }
}