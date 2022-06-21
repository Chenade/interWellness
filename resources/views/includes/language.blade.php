<?php
use Illuminate\Support\Facades\App;

$lang = session('setLocale') ? session('setLocale') : app()->getLocale();
App::setLocale($lang);

?>