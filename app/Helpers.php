<?php

function flash($message, $level = "info")
{
  session()->flash("message", $message);
  session()->flash("level", $level);
}
