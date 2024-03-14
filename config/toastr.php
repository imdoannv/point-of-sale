<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Toastr options
    |--------------------------------------------------------------------------
    |
    | Here you can specify the options that will be passed to the toastr.js
    | library. For a full list of options, visit the documentation.
    |
    */

    'options' => [
          "closeButton" => false,
          "debug" => false,
          "newestOnTop" => false,
          "progressBar" => false,
          "positionClass" => "toast-top-right",
          "preventDuplicates" => false,
          "showDuration" => "300",
          "hideDuration" => "1000",
          "timeOut" => "5000",
          "extendedTimeOut" => "1000",
          "showEasing" => "swing",
          "hideEasing" => "linear",
          "showMethod" => "fadeIn",
          "hideMethod" => "fadeOut"
    ],
];
