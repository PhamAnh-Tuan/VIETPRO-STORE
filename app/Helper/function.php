<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function showError($errors, $name)
{
    if ($errors->has($name)) {
        echo '<div class="alert alert-danger">' . $errors->first($name) . '</div>';
    }
}
function showErrorEditCategory($errors, $name)
{
    if ($errors->has($name)) {
        echo '<div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel">
        <use xlink:href="#stroked-cancel"></use>
        </svg>' . $errors->first($name) . '<a href="\VIETPRO-STORE/public/trang-quản-trị/danh-mục/danh-sách-danh-mục.html" class="pull-right"><span
        class="glyphicon glyphicon-remove"></span></a>
        </div>';
    }
}
/** Lấy danh mục bằng phương pháp đệ quy p-30                           Ctrl+D
 * B1: Chọn lấy tất cả cat_parent_id = 0 -> Đây là danh mục cha.
 * 
 * Code:
 * function demo($category, $parentId)
 *{
 *   foreach ($category as $value) {
 *      if ($value['cat_parent_id'] == $parentId) {
 *         echo $char.$value['cat_name'] . "<br/>";
 *    }
 *}
 *}
 * B2: 
 * Khi lấy dc danh mục cha rồi -> Tìm danh mục con
 *      ->nhìn vào bảng CSDL sẽ thấy cat_parent_id(CON) == cat_id(CHA) => Làm thế nào để lấy đc những thằng con đó ra theo thằng cha.
 *      ->Nhận ra ta đã lấy danh mục cha bằng Foreach ở trên rồi, nếu có thêm 1 vòng foreach bên trong => Vòng For trong sẽ đi sau thằng For ngoài.
 *      => Dùng đệ quy, điều kiện kết thúc khi không tìm thấy cat_parent_id = 0 nào nữa thì thoát khỏi điều kiện if.
 * Khi đã xác định được thằng con -> thêm 1 chuỗi kí tự phân biệt cha con -> $char, và nối thêm "--|".
 * 
 * Code:
 * function demo($category, $parentId, $char)
 *{
 *   foreach ($category as $value) {
 *      if ($value['cat_parent_id'] == $parentId) {
 *         echo $char . $value['cat_name'] . "<br/>";
 *        $new_parent = $value['cat_id'];
 *       demo($category, $new_parent, $char . "--|");
 *  }
 * }
 *}
 * B3: Bây giờ chúng ta thử thêm một chút mã HTML và để có dạng select-option
 * function demo($category, $parentId, $char)
 *{
 *  foreach ($category as $value) {
 *    if ($value['cat_parent_id'] == $parentId) {
 *      echo '<option value="'.$value['cat_id'].'">'.$char . $value['cat_name'].'</option>';
 *    $new_parent = $value['cat_id'];
 *  demo($category, $new_parent, $char . "--|");
 * }
 *}
 *}
 */
function demo($category, $parentId, $char, $parentChild)
{
    foreach ($category as $value) {
        if ($value['cat_parent_id'] == $parentId) {
            if ($value['cat_id'] == $parentChild) {
                echo '<option value="' . $value['cat_id'] . '" selected >' . $char . $value['cat_name'] . '</option>';
            } else {
                echo '<option value="' . $value['cat_id'] . '">' . $char . $value['cat_name'] . '</option>';
            }
            $new_parent = $value['cat_id'];
            demo($category, $new_parent, $char . "--|", $parentChild);
        }
    }
}
// Chạy 3 trang List, Create, Edit
/** $isParent
 * -> la parent cha khi click vao 1 danh muc
 * -> Chon gia tri isParent = 0, vì danh mục cha có parent = 0
 * getCategories($categories, 0, '', 0);
 */
function getCategories($array, $parentId, $char, $isParent)
{
    foreach ($array as $key => $value) {
        if ($value['cat_parent_id'] == $parentId) {
            if ($value['cat_id'] == $isParent) {
                echo '<option selected value="' . $value['cat_id'] . '">' . $char . $value['cat_name'] . '</option>';
            } else {
                echo '<option value="' . $value['cat_id'] . '">' . $char . $value['cat_name'] . '</option>';
            }
            $new_parent = $value['cat_id'];
            getCategories($array, $new_parent, $char . "--|", $isParent);
        }
    }
}

// Edit 2:00
function listCategories($mang, $parentId, $char)
{
    $user = Auth::user();
    foreach ($mang as $key => $value) {
        $string = '';
        if ($value['cat_parent_id'] == $parentId) {

            $string .= '<div class="item-menu"><span>';
            $string .= $char . $value["cat_name"];
            $string .= "</span>";
            $string .= "<div class='category-fix'>";
            if ($user->hasPermissionTo('edit') || $user->hasRole('super-admin')) {
            $string .= "<a class='btn-category btn-primary' href='" . route('category.edit', ['id' => $value['cat_id']]) . "'><i class='fa fa-edit'></i></a>";
            }
            if ($user->hasPermissionTo('delete') || $user->hasRole('super-admin')) {
            $string .= "<a class='btn-category btn-danger' href='" . route('category.delete', ['id' => $value['cat_id']]) . "'><i class='fas fa-times'></i></a>";
            }
            $string .= "</div>";
            $string .= "</div>";
            $new_parent = $value['cat_id'];
            echo $string;
            listCategories($mang, $new_parent, $char . "--|");
        }
    }
}
// <div class="panel panel-default">
//     <div class="panel-heading" role="tab" id="headingOne">
//         <h4 class="panel-title">
//             <a data-toggle="collapse" data-parent="#accordion" href="#menu1"
//                 aria-expanded="true" aria-controls="collapseOne">Quần
//                 Áo Nam
//             </a>
//         </h4>
//     </div>
//     <div id="menu1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
//         <div class="panel-body">
//             <ul>
//                 <li><a href="#">Áo Sơ mi nam</a></li>
//                 <li><a href="#">Áo thun nam</a></li>
//                 <li><a href="#">Áo Khoác nam</a></li>
//                 <li><a href="#">Áo vest Nam</a></li>
//             </ul>
//         </div>
//     </div>
// </div>
function listShop($mang, $parentId)
{
    foreach ($mang as $key => $item) {
        $string = '';

        if ($item['cat_parent_id'] == $parentId) {
            $string .= '<div class="panel panel-default">';
            $string .= '<div class="panel-heading" role="tab" id="headingOne">';
            $string .= '<h4 class="panel-title">';
            $string .= '<a data-toggle="collapse" data-parent="#accordion" href="#menu' . $item['cat_id'] . '" aria-expanded="true" aria-controls="collapseOne">' . $item['cat_name'] . '</a>';
            $string .= '</h4>';
            $string .= '</div>';
            $string .= '<div id="menu' . $item['cat_id'] . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
            // if ($item['cat_parent_id'] == $new_par) {

            // }
            $string .= '</div>';
            $string .= '</div>';
            $new_par = $item['cat_id'];
            echo $string;
            listShop($mang, $new_par);
            $string .= '<div class="panel-body">';
            $string .= '<ul>';
            $string .= '<li><a href="#">' . $item['cat_name'] . '</a></li>';
            $string .= '<ul>';
            $string .= '</div>';
        }
    }
}
