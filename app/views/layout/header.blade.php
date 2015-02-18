<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 9:03
 */
 ?>
 <header>
    <nav>
        <ul class="navigation">
            <li>{{ HTML::link('/', 'Home')}}</li>
            <li>{{ HTML::link('quiz', 'Quiz')}}</li>
            @if(Auth::guest())
                <li>{{ HTML::link('register', 'Register')}}</li>
                <li>{{ HTML::link('login', 'Login')}}</li>
            @endif
        </ul>
        @if(Auth::guest())
            <ul class="loginFormUl">
                {{ Form::open(array('url' => 'login')) }}
                {{ Form::email('email', null, array('class' => 'usernameInput', 'placeholder' => 'Email')) }}
                {{ Form::password('password', array('class' => 'passwordInput', 'placeholder' => 'Password')) }}
                {{ Form::checkbox('remember', 'remember') }}
                {{ Form::submit('Sign In', array('class' => 'submitLogin')) }}
                {{ Form::token() }}
                {{ Form::close() }}
            </ul>
        @else
        <ul class="loginFormUl">
        {{ Form::open() }}
        {{ Form::submit('Sign Out', array('class' => 'submitLogin')) }}
        {{ Form::close() }}
        </ul>
        @endif
    </nav>
 </header>