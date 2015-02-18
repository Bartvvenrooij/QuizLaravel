<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 14:35
 */
 ?>
 <a href='{{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}'>
     {{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}
 </a>