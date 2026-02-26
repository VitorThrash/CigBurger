<?php


function display_errors($field, $errors)
{
    if(empty($errors)){ 
        return;
    }

    if (array_key_exists($field, $errors)) {
        return '<div class="text-danger fw-bold"><small><i class="fa-regular fa-circle-xmark me-1"></i>'.$errors[$field].'</small></div>';
    }
}

function calculate_promotion($value, $discount)
{
    if ($discount == 0) {
        return $value;
    }

    return round($value - ($value * $discount) / 100, 2);
}
//retorna o valor com uma virgula e 2 casas decimaias
function normalize_price($price){

         return number_format($price, 2, ',', '.');           


}



function prefixed_product_file_name($file_name) {

        //criar um prefixo para os restaurante

        $prefix = 'rest_' . str_pad(session()->user['id_restaurant'], 5,'0', STR_PAD_LEFT);
            return $prefix. '_' . $file_name;



}