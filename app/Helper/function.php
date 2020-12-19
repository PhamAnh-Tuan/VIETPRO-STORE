<?php
function showError($errors, $name)
{
    if ($errors->has($name)) {
        echo '<div class="alert alert-danger">' . $errors->first($name) . '</div>';
    }
}
// Lấy danh mục bằng phương pháp đệ quy p-30
function getCategories($categories, $parentId, $char, $isParent)
{
    foreach ($categories as $key => $value) {
        if ($value['cat_parent_id'] == $parentId) {
            if ($value['cat_id'] == $isParent) {
                echo '<option selected value="' . $value['cat_id'] . '">' . $char . $value['cat_name'] . '</option>';
            } else {
                echo '<option value="' . $value['cat_id'] . '">' . $char . $value['cat_name'] . '</option>';
            }
            $new_parent = $value['cat_id'];
            getCategories($categories, $new_parent, $char . "--|", $isParent);
        }
    }
}
