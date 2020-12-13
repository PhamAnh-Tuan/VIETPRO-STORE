<?php
function showError($errors, $name)
{
    if ($errors->has($name)) {
        echo '<div class="alert alert-danger">' . $errors->first($name) . '</div>';
    }
}
