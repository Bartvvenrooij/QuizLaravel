<?php

/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 18:49
 */
class OwnerController extends BaseController
{

    public function getDashboard()
    {
        return View::make('owner.dashboard');
    }
}