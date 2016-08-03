<?php

class Cli extends CI_Controller
{
    public function index()
    {
        // 去除exit
        if (is_cli())
        {
            echo 'You can not run this via CLI';
        }
        else
        {
            echo 'Okay';
        }
    }
}
