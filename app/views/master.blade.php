<?php
/**
 * Created by PhpStorm.
 * User: Bart van Venrooij
 * Date: 17-2-2015
 * Time: 8:42
 */
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <title>Quiz Laravel</title>
 {{ HTML::style('css/style.css') }}
 </head>
     <body>

         @include('layout.header')

         <div role="main">
            @yield('content')
         </div>

     </body>
 </html>