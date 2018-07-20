<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu {

    private $arr_menu;
    public function __construct($arr){
        $this->arr_menu= $arr;
    }
    public function loadMenu(){
        $str_menu= "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='#'>Menu</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarColor01' aria-controls='navbarColor01' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarColor01'>
        <ul class='navbar-nav'>";
        $str_menu .= "<li class='nav-item'><a class='nav-link' href='". base_url()."DashBoard/' target='_self'>Index</a></li>";
        $str_menu .= "<li class='nav-item'><a class='nav-link' href='". base_url()."DashBoard/addUserForm' target='_self'>Add New User</a></li>";
        $str_menu .= "<li class='nav-item'><a class='nav-link' href='". base_url()."user' target='_self'>APIUser</a></li>";
        $str_menu .= "<li class='nav-item'><a class='nav-link' href='". base_url()."answer' target='_self'>APIAnswer</a></li>";
        $str_menu .="</ul>
        <div>
        </nav>
        <br />";
        return $str_menu;
    }
}