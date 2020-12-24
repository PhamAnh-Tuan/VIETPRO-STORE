

 if ($request->img != '') {
            // nếu nhận dc request img mới, xóa ảnh cũ đi
            $item = $product->prd_image;
            if ($item != null) {
                $file_old = public_path('Backend\img\product\\') . $product->prd_image;
                if (file_exists($file_old) != null) {
                    unlink($file_old);
                }
            }
            // Upload file image
            $image = $request->file('img');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('Backend\img\product');
            $file_old = public_path('Backend\img\product\\') . $name;
            /** Nếu thư mục gốc đã tồn tại ảnh(của 1 sản phẩm khác cùng ảnh)
             * Lấy ramdom -> gán vào tên của ảnh được update
             * Str::replaceFirst trong đó: https://laravel.com/docs/7.x/helpers
             * tham số thứ nhât là chuỗi ban đầu
             * tham số thứ hai là chuỗi được thay thế
             * tham số thứ ba là tên img chờ được ramdom
             * 
             */
            if (file_exists($file_old)) {
                $string = '0123456789';
                $strRamdon = substr(str_shuffle(str_repeat($string, 5)), 0, 10);
                $resultStr = Str::replaceFirst(' ','-',$name); // gai-xinh.jpg
                $resultStr_v1 = Str::replaceFirst('.', $strRamdon . '.', $resultStr); // gai-xinh5818817500.jpg
                $image->move($destinationPath, $resultStr_v1);
                $product->prd_image = $resultStr_v1;
            } else {
                $string = Str::replaceFirst(' ','-',$name);
                $product->prd_image=$string;
                $image->move($destinationPath, $string);
            }
            $product->save();
            return redirect()->route('product.index')->with('thong-bao', 'success');
        }