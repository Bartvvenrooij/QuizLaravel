<?php

/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 12:15
 */
class PagesController extends BaseController
{

    public function getHome()
    {
        return View::make('pages.home');
    }

    public function getQuiz()
    {
        return View::make('pages.quiz');
    }
}