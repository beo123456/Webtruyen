<?php 
 function ShowErrors($errors,$name){
    if($errors->has($name)){
        $message = "<div class='text-danger'>";
        $message .= $errors->first($name);
        $message .= "</div>";
        return $message;
    }
}