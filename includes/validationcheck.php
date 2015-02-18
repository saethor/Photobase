<?php
/* 
    Foreach loop goes through $_POST array, strips out any whitespace from text fields, 
    and assign the field's contents to a variable with the sam name (so $_POST['email'] 
    becomes $email, and so on). If a required field is left blank, its name attribute is
    added to the $missing array and the related variable is set to an empty string. 
    Only elements in the $_POST array with keys listed in the $required and $expected 
    arrays are processed.

*/
foreach($_POST as $key => $value) {

    // Assign temporary variable and strip whitespace if not an array
    $temp = is_array($value) ? $value : trim($value);

    // if empty and required, add $missing array
    if (empty($temp) && in_array($key, $required)) {

        $missing[] = $key;
        ${$key} = '';

    } elseif (in_array($key, $expected)) {

        // otherwise, assign to a variable of the sama name as $key
        ${$key} = $temp;

    }
}