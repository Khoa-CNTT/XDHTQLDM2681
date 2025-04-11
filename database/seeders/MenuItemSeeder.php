<?php

namespace Database\Seeders;

// use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_items')->delete();
        DB::table('menu_items')->truncate();
        // Chèn dữ liệu mẫu
        DB::table('menu_items')->insert([
            [
                //     ['id' => 1, 'restaurant_id' => 1, 'category_id' => 2, 'Title' => 'Pizza Hải Sản', 'Price' => 150000, 'Image' => 'pizza_hai_san.jpg', 'Quantity' => 10, 'Status' => true, 'description' => 'Pizza thơm ngon với tôm, mực, phô mai.'],
                //     ['id' => 2, 'restaurant_id' => 1, 'category_id' => 3, 'Title' => 'Bánh Mì Gà Xé', 'Price' => 35000, 'Image' => 'banh_mi_ga_xe.jpg', 'Quantity' => 20, 'Status' => true, 'description' => 'Bánh mì nóng giòn với gà xé và sốt đặc biệt.'],
                //     ['id' => 3, 'restaurant_id' => 1, 'category_id' => 4, 'Title' => 'Cơm Gà Hội An', 'Price' => 50000, 'Image' => 'com_ga_hoi_an.jpg', 'Quantity' => 15, 'Status' => true, 'description' => 'Cơm gà đặc sản Hội An với nước chấm đậm đà.'],
                //     ['id' => 4, 'restaurant_id' => 1, 'category_id' => 5, 'Title' => 'Bún Bò Huế', 'Price' => 60000, 'Image' => 'bun_bo_hue.jpg', 'Quantity' => 12, 'Status' => true, 'description' => 'Bún bò Huế với nước dùng đậm đà, thơm ngon.'],
                //     ['id' => 5, 'restaurant_id' => 1, 'category_id' => 6, 'Title' => 'Gỏi Cuốn Tôm Thịt', 'Price' => 40000, 'Image' => 'goi_cuon.jpg', 'Quantity' => 25, 'Status' => true, 'description' => 'Gỏi cuốn tươi ngon với tôm, thịt, rau sống và nước chấm đặc biệt.'],
                //     ['id' => 6, 'restaurant_id' => 1, 'category_id' => 7, 'Title' => 'Phở Bò Tái', 'Price' => 55000, 'Image' => 'pho_bo_tai.jpg', 'Quantity' => 18, 'Status' => true, 'description' => 'Phở bò tái thơm ngon, nước dùng nấu từ xương bò nguyên chất.'],
                //     ['id' => 7, 'restaurant_id' => 1, 'category_id' => 8, 'Title' => 'Trà Sữa Trân Châu', 'Price' => 45000, 'Image' => 'tra_sua.jpg', 'Quantity' => 30, 'Status' => true, 'description' => 'Trà sữa thơm béo với trân châu dai ngon.'],
                //     ['id' => 8, 'restaurant_id' => 1, 'category_id' => 9, 'Title' => 'Bánh Xèo Miền Tây', 'Price' => 70000, 'Image' => 'banh_xeo.jpg', 'Quantity' => 15, 'Status' => true, 'description' => 'Bánh xèo giòn rụm với nhân tôm, thịt, giá đỗ.'],
                //     ['id' => 9, 'restaurant_id' => 1, 'category_id' => 10, 'Title' => 'Chè Ba Màu', 'Price' => 30000, 'Image' => 'che_ba_mau.jpg', 'Quantity' => 20, 'Status' => true, 'description' => 'Chè ba màu mát lạnh, ngọt dịu, hương vị truyền thống.'],
                //     ['id' => 10, 'restaurant_id' => 1, 'category_id' => 11, 'Title' => 'Bún Đậu Mắm Tôm', 'Price' => 75000, 'Image' => 'bun_dau_mam_tom.jpg', 'Quantity' => 10, 'Status' => true, 'description' => 'Bún đậu mắm tôm chuẩn vị Hà Nội, đầy đủ topping.'],
                //     ['id' => 11, 'restaurant_id' => 1, 'category_id' => 2, 'Title' => 'Cà Phê Sữa Đá', 'Price' => 25000, 'Image' => 'ca_phe_sua_da.jpg', 'Quantity' => 50, 'Status' => true, 'description' => 'Cà phê pha phin sánh đặc với sữa đặc béo ngậy.'],
                //     ['id' => 12, 'restaurant_id' => 1, 'category_id' => 3, 'Title' => 'Mì Quảng', 'Price' => 60000, 'Image' => 'mi_quang.jpg', 'Quantity' => 15, 'Status' => true, 'description' => 'Mì Quảng với tôm, thịt, đậu phộng, bánh tráng nướng.'],
                //     ['id' => 13, 'restaurant_id' => 1, 'category_id' => 4, 'Title' => 'Cháo Lòng', 'Price' => 40000, 'Image' => 'chao_long.jpg', 'Quantity' => 20, 'Status' => true, 'description' => 'Cháo lòng nóng hổi với lòng heo và hành lá.'],
                //     ['id' => 14, 'restaurant_id' => 1, 'category_id' => 5, 'Title' => 'Cơm Tấm Sườn', 'Price' => 50000, 'Image' => 'com_tam_suon.jpg', 'Quantity' => 25, 'Status' => true, 'description' => 'Cơm tấm với sườn nướng thơm ngon và nước mắm chua ngọt.'],
                //     ['id' => 15, 'restaurant_id' => 1, 'category_id' => 6, 'Title' => 'Xôi Xéo', 'Price' => 30000, 'Image' => 'xoi_xeo.jpg', 'Quantity' => 30, 'Status' => true, 'description' => 'Xôi xéo dẻo thơm với đậu xanh và hành phi.'],
                //     ['id' => 16, 'restaurant_id' => 1, 'category_id' => 7, 'Title' => 'Hủ Tiếu Nam Vang', 'Price' => 60000, 'Image' => 'hu_tieu_nam_vang.jpg', 'Quantity' => 12, 'Status' => true, 'description' => 'Hủ tiếu nước trong ngọt thanh, thịt bằm, tôm tươi.'],
                //     ['id' => 17, 'restaurant_id' => 1, 'category_id' => 8, 'Title' => 'Bánh Canh Cua', 'Price' => 65000, 'Image' => 'banh_canh_cua.jpg', 'Quantity' => 10, 'Status' => true, 'description' => 'Bánh canh cua sánh đặc với thịt cua tươi ngon.'],
                //     ['id' => 18, 'restaurant_id' => 1, 'category_id' => 9, 'Title' => 'Lẩu Thái Chua Cay', 'Price' => 250000, 'Image' => 'lau_thai.jpg', 'Quantity' => 8, 'Status' => true, 'description' => 'Lẩu thái chua cay với hải sản, nấm và rau tươi.'],
                //     ['id' => 19, 'restaurant_id' => 1, 'category_id' => 10, 'Title' => 'Bánh Tráng Trộn', 'Price' => 35000, 'Image' => 'banh_trang_tron.jpg', 'Quantity' => 30, 'Status' => true, 'description' => 'Bánh tráng trộn đậm vị với bò khô, trứng cút, rau răm.'],
                [
                    'restaurant_id' => 1,
                    'category_id'   => 2,
                    'Title'         => 'Pizza Hải Sản',
                    'Price'         => 150000,
                    'Image'         => 'https://thepizzacompany.vn/images/thumbs/000/0002214_sf-deluxe_500.png',
                    'Quantity'      => 10,
                    'Status'        => true,
                    'description'   => 'Pizza thơm ngon với tôm, mực, phô mai.',
                    // 'created_at'    => now(),
                    // 'updated_at'    => now(),
                ],

            ]
        ]);
    }
}
