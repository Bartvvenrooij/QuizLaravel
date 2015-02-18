<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 12:13
 */
 ?>
  @extends('master')

  @section('content')
    <div class="board">
        <h1>Register</h1>
        <p>Here you can register your account, please notice that your account had to be confirmed with a email.</p>
        {{ Form::open(array('method' => 'post')) }}
        {{ Form::email('email', null, array('class' => 'usernameInput', 'placeholder' => 'Email')) }}
        {{ Form::password('password', array('class' => 'passwordInput', 'placeholder' => 'Password')) }}
        {{ Form::password('password_confirmation', array('class' => 'passwordInput', 'placeholder' => 'Password again')) }}
        {{ Form::label('remember', 'Remember me') }}
        {{ Form::checkbox('remember', 'remember') }}
        {{ Form::submit('Sign In', array('class' => 'submitLogin')) }}
        {{ Form::token() }}
        {{ Form::close() }}

        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
            @if (is_array(Session::get('error')))
                {{ head(Session::get('error')) }}
            @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif
    </div>
  @stop