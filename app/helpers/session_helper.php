<?php 
session_start();

// Flush message helper
// EXAMPLE - flash ('regsiter_success', 'You are now registered');
// DISPLAY IN VIEW - <?php echo flash('register_success');
function flas($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty ($name)){
        if(!empty ($message) && empty($_SESSINO[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION['name']);
            }
            $_SESSION[$name] = $name;
            $_SESSION[$name. '_class'] = $class;

        }
    }
}