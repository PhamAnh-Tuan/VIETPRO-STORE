<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserFindIDExport implements FromCollection, WithHeadings
{
    protected $id;
    function __construct($id)
    {
        $this->user_id = $id;
    }

    public function collection()
    {
        return User::where('user_id', '=', $this->user_id)->get();
    }

    //Thêm hàng tiêu đề cho bảng
    public function headings(): array
    {
        return ["ID", "Email", "Tên tài khoản", "Địa chỉ", "Số điện thoại", "level", "Ngày tạo", "Ngày cập nhật"];
    }
}
