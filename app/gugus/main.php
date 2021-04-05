<?php

class main {
    public function make($action)
    {
        require_once __DIR__."/make/".$action.".php";
    }
}