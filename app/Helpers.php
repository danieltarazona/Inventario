<?php

function flash($message, $message_level = "info")
{
  session()->flash("message", $message);
  session()->flash("message_level", $message_level);
}
