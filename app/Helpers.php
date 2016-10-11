<?php

function Flash($message, $level = "info")
{
  session()->flash("message", $message);
  session()->flash("level", $level);
}

function set_active($path, $active='active')
{
  return Request::is($path) || Request::is($path . '/*') ? $active: '';
}
