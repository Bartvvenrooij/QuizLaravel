<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 18-2-2015
 * Time: 10:22
 */
 ?>
 @extends('master')

 @section('content')
    <div class="board">
        <h1>Password recovery</h1>
        {{ Form::open(array('method' => 'post')) }}
        {{ Form::email('email', null, array('class' => 'usernameInput', 'placeholder' => 'Email')) }}
        {{ Form::submit('Recover', array('class' => 'submitLogin')) }}
        {{ Form::token() }}
        {{ Form::close() }}
    </div>
 @stop