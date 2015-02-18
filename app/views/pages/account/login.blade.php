<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 11:39
 */
 ?>
 @extends('master')

 @section('content')
    <div class="board">
        <h1>Login</h1>
        <p>Log in to your account to create some awesome quizzes, and to keep up your scores!</p>
        {{ Form::open(array('method' => 'post')) }}
        {{ Form::email('email', null, array('class' => 'usernameInput', 'placeholder' => 'Email')) }}
        {{ Form::password('password', array('class' => 'passwordInput', 'placeholder' => 'Password')) }}
        {{ Form::label('remember', 'Remember me') }}
        {{ Form::checkbox('remember', 'remember') }}
        {{ Form::submit('Sign In', array('class' => 'submitLogin')) }}
        <a href="{{{ URL::to('login/forgotPassword') }}}">Forgot password?</a>
        {{ Form::token() }}
        {{ Form::close() }}

        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
    </div>
 @stop