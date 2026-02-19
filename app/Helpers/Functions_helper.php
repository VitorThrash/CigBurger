<?php


function display_errors($field, $errors)
{
    if(empty($errors)){ // aqui estava "erros"
        return;
    }

    if (array_key_exists($field, $errors)) {
        return '<div class="text-danger fw-bold"><small><i class="fa-regular fa-circle-xmark me-1"></i>'.$errors[$field].'</small></div>';
    }
}
