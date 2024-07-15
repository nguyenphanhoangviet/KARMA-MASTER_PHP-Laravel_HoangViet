<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 2,
                'name' => 'JA 1 EP',
                'description' => 'Ja Morant đã trở thành siêu sao như ngày hôm nay bằng cách liên tục đánh chìm những người nhảy trên vành xiêu vẹo, nhảy lên lốp máy kéo và rê bóng qua nón giao thông trong mùa hè ẩm ướt ở Nam Carolina. JA 1 là một minh chứng cho sự trỗi dậy của anh ấy. Với Zoom Air, nó hỗ trợ nhảy thỏ và siêu tốc độ mà không phải hy sinh sự thoải mái để bạn có thể kiểm soát vận mệnh của chính mình trên sân. Thiết kế đặc biệt này gật đầu với một món ăn nhẹ ngon miệng dẫn đến phát hiện của Ja và ngọn lửa bùng cháy trong dạ dày của anh ta để tiếp tục chứng minh những người ghét sai.',
                'price' => 3239000.000,
                'img' => '1719152915.webp',
                'stock' => 50, // Thêm giá trị stock
                'category_id' => 3,
                'color_id' => 2,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '28', '35'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '28', '35')
            ],
            [
                'id' => 3,
                'name' => 'Nike P-6000',
                'description' => 'Nike P-6000 dựa trên Nike Air Pegasus 2006, mang đến cho bạn sự pha trộn của phong cách mang tính biểu tượng, thoáng khí, thoải mái và gợi lên sự rung cảm đầu những năm 2000.',
                'price' => 2929000.000,
                'img' => '1719153371.webp',
                'stock' => 60, // Thêm giá trị stock
                'category_id' => 4,
                'color_id' => 6,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '36', '11'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '34', '17')
            ],
            [
                'id' => 4,
                'name' => 'JA 1 EP',
                'description' => 'Ja Morant đã trở thành siêu sao như ngày hôm nay bằng cách liên tục đánh chìm những người nhảy trên vành xiêu vẹo, nhảy lên lốp máy kéo và rê bóng qua nón giao thông trong mùa hè ẩm ướt ở Nam Carolina. JA 1 là một minh chứng cho sự trỗi dậy của anh ấy. Đệm Air Zoom hỗ trợ nhảy thỏ và siêu tốc độ mà không làm mất đi sự thoải mái, để bạn có thể kiểm soát vận mệnh của chính mình trên sân. Với đế ngoài bằng cao su siêu bền, phiên bản này mang đến cho bạn lực kéo cho các sân ngoài trời.',
                'price' => 3519000.000,
                'img' => '1719153508.jpg',
                'stock' => 40, // Thêm giá trị stock
                'category_id' => 3,
                'color_id' => 4,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '38', '28'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '39', '23')
            ],
            [
                'id' => 5,
                'name' => 'Nike Court Royale 2 Thấp',
                'description' => 'Một tia sáng từ quá khứ, Nike Court Royale 2 có thiết kế tương tự đã làm rung chuyển đường phố kể từ cuối những năm 70. Da ở phía trên trông sắc nét và dễ mặc, trong khi thiết kế Swoosh retro lớn làm tăng thêm sức hấp dẫn. Trên hết, đế xương cá được hiện đại hóa tạo ra một sự thay đổi cho vẻ ngoài cổ điển.',
                'price' => 1609000.000,
                'img' => '1719153743.webp',
                'stock' => 30, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 5,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '42', '23'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '42', '23')
            ],
            [
                'id' => 6,
                'name' => 'Nike Air Max 270',
                'description' => 'Phong cách sống đầu tiên của Nike Air Max mang đến cho bạn phong cách, sự thoải mái và thái độ lớn trong Nike Air Max 270. Thiết kế lấy cảm hứng từ các biểu tượng Air Max, thể hiện sự đổi mới lớn nhất của Nike với cửa sổ lớn và mảng màu sắc tươi mới.',
                'price' => 4409000.000,
                'img' => '1719153917.webp',
                'stock' => 50, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 6,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '45', '17'),
                'updated_at' => Carbon::create('2024', '06', '23', '07', '45', '17')
            ],
            [
                'id' => 7,
                'name' => 'Nike Court Vision Low',
                'description' => 'Phong cách phá bóng nhanh của bóng rổ thập niên 80 đáp ứng văn hóa nhịp độ nhanh của trò chơi ngày nay với Nike Court Vision Low. Phần trên được lấy cảm hứng từ giày thể thao bóng rổ kiểu cũ, trong khi đế cốc cao su cổ điển đã xuất hiện trên một số cú đá mang tính biểu tượng nhất trong quá khứ.',
                'price' => 2349000.000,
                'img' => '1719154678.webp',
                'stock' => 60, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 7,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '07', '57', '58'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '00', '35')
            ],
            [
                'id' => 8,
                'name' => 'Nike Dunk Low',
                'description' => 'Được tạo ra cho gỗ cứng nhưng được đưa ra đường phố, biểu tượng bóng rổ thập niên 80 này trở lại với các chi tiết cổ điển và sự tinh tế của vòng throwback. Lớp phủ da tổng hợp giúp Nike Dunk truyền tải phong cách cổ điển trong khi cổ áo đệm, cắt thấp cho phép bạn mang trò chơi của mình đến bất cứ đâu — một cách thoải mái.',
                'price' => 3519000.000,
                'img' => '1719154821.webp',
                'stock' => 70, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 8,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '08', '00', '21'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '01', '49')
            ],
            [
                'id' => 9,
                'name' => 'Air Jordan 1 Low',
                'description' => 'Lấy cảm hứng từ bản gốc ra mắt vào năm 1985, Air Jordan 1 Low mang đến một cái nhìn cổ điển, sạch sẽ, quen thuộc nhưng luôn tươi mới. Với thiết kế mang tính biểu tượng kết hợp hoàn hảo với bất kỳ sự phù hợp nào, những cú đá này đảm bảo bạn sẽ luôn đi đúng hướng.',
                'price' => 3239000.000,
                'img' => '1719155022.jpg',
                'stock' => 80, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 6,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '08', '03', '42'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '03', '42')
            ],
            [
                'id' => 10,
                'name' => 'Jordan Spizike Low',
                'description' => 'Spizike lấy các yếu tố của năm Jordan cổ điển, kết hợp chúng và mang đến cho bạn một đôi giày thể thao mang tính biểu tượng. Đó là một sự tôn kính đối với việc Spike Lee chính thức giới thiệu Hollywood và vòng vo trong một khoảnh khắc văn hóa. Bạn có được một cặp đá tuyệt vời với một số lịch sử. Bạn có thể yêu cầu gì hơn nữa? Bạn đào?',
                'price' => 4699000.000,
                'img' => '1719155139.webp',
                'stock' => 90, // Thêm giá trị stock
                'category_id' => 3,
                'color_id' => 7,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '08', '05', '27'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '05', '39')
            ],
            [
                'id' => 11,
                'name' => 'Nike Blazer Mid \'77 Vintage',
                'description' => 'Vào những năm 70, Nike là đôi giày mới trên khối. Vì vậy, mới trong thực tế, chúng tôi vẫn đang đột nhập vào bối cảnh bóng rổ và thử nghiệm các nguyên mẫu trên đôi chân của đội địa phương của chúng tôi. Tất nhiên, thiết kế được cải thiện qua nhiều năm, nhưng tên bị mắc kẹt. Nike Blazer Mid \'77 Vintage—cổ điển ngay từ đầu.',
                'price' => 2929000.000,
                'img' => '1719155233.webp',
                'stock' => 100, // Thêm giá trị stock
                'category_id' => 5,
                'color_id' => 3,
                'brand_id' => 4,
                'created_at' => Carbon::create('2024', '06', '23', '08', '07', '01'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '07', '13')
            ],
            [
                'id' => 12,
                'name' => 'GIÀY ADIZERO ADIOS 8',
                'description' => 'ĐÔI GIÀY CHẠY BỘ ĐẦY TỐC ĐỘ CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nChinh phục kỷ lục cá nhân mới với mẫu Giày Adizero Adios 8 này. Thân giày kiểu mới làm từ vải lưới siêu nhẹ và thoáng khí, và bên dưới là sự kết hợp giữa mút foam LIGHTSTRIKE 2.0 và LIGHTSTRIKE PRO siêu nhẹ. Sự kết hợp ấy giúp đôi giày này đủ tốc độ cho ngày thi đấu, đồng thời cũng bền bỉ cùng bạn tập luyện hàng ngày.\r\n\r\nCông nghệ ENERGYTORSION ROD 2.0 cải tiến được trang bị ở đế giữa, bổ sung thanh thứ ba chạy từ giữa bàn chân tới mũi chân cho cảm giác gọn ghẽ khi cất bước. Kết quả là? Một đôi giày chạy bộ giúp bạn chạy nhanh hơn và lâu hơn bao giờ hết — đồng thời mang lại độ cứng cáp mà mềm mại và tăng cường truyền lực.',
                'price' => 3500000.000,
                'img' => '1719155915.avif',
                'stock' => 110, // Thêm giá trị stock
                'category_id' => 6,
                'color_id' => 9,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '18', '35'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '27', '28')
            ],
            [
                'id' => 13,
                'name' => 'GIÀY ADIZERO BOSTON 12',
                'description' => 'ĐÔI GIÀY TẬP CHÚ TRỌNG TỐC ĐỘ VỚI CÔNG NGHỆ CHUYÊN DỤNG.\r\nBoston Marathon là một giải đua. Nhưng đồng thời cũng là một mục tiêu, một kế hoạch tập luyện và cả những tháng ngày bạn ngóng đợi tới giờ thi đấu chính thức. Giày Adizero Boston 12 có thiết kế dành cho đường chạy cự ly trung bình tới cự ly dài. Đôi giày này mang đến cho giờ tập cảm giác hệt như trên đường đua nhờ cảm giác bùng nổ đến từ các thanh ENERGYROD 2.0 bằng sợi thủy tinh giúp hạn chế tiêu hao năng lượng. Giày có cấu tạo đầy tốc độ mà không kém phần bền bỉ — đế giữa kết hợp đệm LIGHTSTRIKE PRO siêu nhẹ và phiên bản mới của đệm LIGHTSTRIKE 2.0 EVA bền chắc.',
                'price' => 4000000.000,
                'img' => '1719156346.avif',
                'stock' => 120, // Thêm giá trị stock
                'category_id' => 6,
                'color_id' => 9,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '25', '46'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '38', '28')
            ],
            [
                'id' => 14,
                'name' => 'GIÀY FORUM LOW CL',
                'description' => 'ĐÔI GIÀY MANG CẢM HỨNG BÓNG RỔ VỚI THIẾT KẾ TỐI GIẢN.\r\nĐôi giày adidas Forum Low CL này cân bằng hoàn hảo giữa phong cách laid-back và retro. Bạn sẽ thấy thoải mái không thôi nhờ thân giày bằng da cao cấp và lót giày bằng vải dệt mềm mại. Đôi giày đa năng này là một item không thể thiếu vắng.',
                'price' => 2600000.000,
                'img' => '1719156438.avif',
                'stock' => 130, // Thêm giá trị stock
                'category_id' => 3,
                'color_id' => 3,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '27', '18'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '37', '35')
            ],
            [
                'id' => 15,
                'name' => 'GIÀY FORUM MID',
                'description' => 'ĐÔI GIÀY CỔ CAO VỪA, KẾT NỐI PHONG CÁCH TÁO BẠO VÀ TINH THẦN BIỂU ĐẠT BẢN THÂN.\r\nDù đang có một ngày bình thường hay chuẩn bị ăn diện cho bữa tối ở đâu đó, đôi giày adidas này chính là lựa chọn kinh điển hàng đầu với thiết kế hiện đại. Sự kết hợp giữa da cật và da tổng hợp kết hợp với các chi tiết cổ điển và kiểu dáng thanh thoát, tất cả cho bạn vẻ ngoài phù hợp với đường phố nhưng vẫn classic như chính đôi giày này.',
                'price' => 2800000.000,
                'img' => '1719156539.avif',
                'stock' => 140, // Thêm giá trị stock
                'category_id' => 3,
                'color_id' => 7,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '28', '59'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '33', '41')
            ],
            [
                'id' => 16,
                'name' => 'GIÀY DROPSET 3',
                'description' => 'ĐÔI GIÀY TẬP THỂ LỰC CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nBất kể bạn nâng tạ, chống đẩy hay lên xà, đôi giày trainer Dropset 3 luôn mang đến sự nâng đỡ ổn định cần thiết cho các bài tập thể lực. Đế giữa mật độ kép giúp đôi chân luôn êm ái suốt những rep tập cường độ cao, cùng thành đế giày bằng TPU cố định phần giữa bàn chân. Công nghệ adidas HEAT.RDY giữ cho đôi chân luôn mát mẻ kể cả khi buổi tập tăng nhiệt. Với dáng rộng hơn tiêu chuẩn, đôi giày trainer này vẫn ôm thoải mái dù chân có phồng lên sau nhiều giờ nỗ lực.\r\n\r\nSản phẩm này có chứa tối thiểu 20% chất liệu tái chế. Bằng cách tái sử dụng các chất liệu đã được tạo ra, chúng tôi góp phần giảm thiểu lãng phí và hạn chế phụ thuộc vào các nguồn tài nguyên hữu hạn, cũng như giảm phát thải từ các sản phẩm mà chúng tôi sản xuất.',
                'price' => 3500000.000,
                'img' => '1719156729.avif',
                'stock' => 150, // Thêm giá trị stock
                'category_id' => 7,
                'color_id' => 10,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '32', '09'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '37', '16')
            ],
            [
                'id' => 17,
                'name' => 'GIÀY TRAINER RAPIADMOVE',
                'description' => 'ĐÔI GIÀY DÀNH CHO HIIT VÀ CÁC BÀI TẬP LINH HOẠT, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nĐừng mang giày chạy bộ khi tập luyện. Các chuyển động linh hoạt, đa hướng của HIIT đòi hỏi một đôi giày chuyên dụng. Chẳng hạn như đôi giày siêu nhẹ và linh hoạt này đến từ adidas. Đế giữa EVA thoải mái và nâng đỡ, và hệ thống Torsion System bất đối xứng mang lại độ ổn định linh hoạt cho chuyển động bùng nổ theo mọi hướng.\r\n\r\nLàm từ một loạt chất liệu tái chế, thân dép có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.',
                'price' => 3200000.000,
                'img' => '1719156808.avif',
                'stock' => 160, // Thêm giá trị stock
                'category_id' => 7,
                'color_id' => 5,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '33', '28'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '33', '28')
            ],
            [
                'id' => 18,
                'name' => 'GIÀY TRAINER RAPIADMOVE ADV',
                'description' => 'ĐÔI GIÀY DÀNH CHO HIIT VÀ CÁC BÀI TẬP LINH HOẠT, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nNhẹ nhàng chinh phục lớp HIIT cùng một đôi giày đáng tin cậy. Đôi giày tập adidas này hỗ trợ chuyển động linh hoạt. Thân giày bằng vải dệt kim kỹ thuật có các vùng nâng đỡ được bố trí hợp lý. Lớp đệm Lightstrike siêu nhẹ và đàn hồi, cùng hệ thống Torsion System bất đối xứng giúp bạn duy trì ổn định khi chuyển hướng nhanh và di chuyển đa hướng.\r\n\r\nLàm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.',
                'price' => 3000000.000,
                'img' => '1719156998.avif',
                'stock' => 170, // Thêm giá trị stock
                'category_id' => 7,
                'color_id' => 11,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '36', '38'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '36', '38')
            ],
            [
                'id' => 19,
                'name' => 'GIÀY GOLF RỘNG NGANG BOOST TOUR360 BOA 24',
                'description' => 'ĐÔI GIÀY GOLF ĐẲNG CẤP TOUR CÓ SỬ DỤNG CÁC CHẤT LIỆU TÁI CHẾ VÀ TÁI TẠO.\r\nThoải mái nhất. Phong độ nhất. Dễ dàng có được sự tự tin và phong cách với đôi Giày Golf BOOST Tour360 BOA 24 đến từ adidas. Dành cho thi đấu chuyên nghiệp và các golf thủ đam mê, đôi giày này sử dụng các chất liệu cao cấp và công nghệ giày tiên phong cho hiệu năng đẳng cấp. Hệ thống BOA® Fit System tinh chỉnh độ ôm kích hoạt công nghệ 360Wrap bên trong giúp tăng cường nâng đỡ và vững chãi. Đệm adidas Lightstrike kết hợp đệm JET BOOST ở gót giày cùng với khung ổn định Torsion Bridge trợ lực cho từng sải bước và ổn định thế đứng cho những cú drive bùng nổ. Thân giày bằng da microfibre chống thấm nước nâng đỡ bàn chân cho cảm giác thoải mái suốt vòng golf. Nâng tầm cuộc chơi với đôi giày golf cho phong cách và cảm giác tuyệt vời nhất.\r\n\r\nBằng cách chọn tái chế, chúng tôi có thể tái sử dụng những chất liệu đã được tạo ra, từ đó góp phần giảm lãng phí. Những lựa chọn chất liệu tái tạo sẽ giúp chúng tôi giảm phụ thuộc vào nguồn tài nguyên hữu hạn. Các sản phẩm sử dụng kết hợp các chất liệu tái chế và tái tạo của chúng tôi có chứa tổng cộng tối thiểu 20% các chất liệu này.',
                'price' => 6300000.000,
                'img' => '1719157268.avif',
                'stock' => 180, // Thêm giá trị stock
                'category_id' => 8,
                'color_id' => 3,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '41', '08'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '41', '08')
            ],
            [
                'id' => 20,
                'name' => 'GIÀY RỘNG NGANG S2G BOA',
                'description' => 'ĐÔI GIÀY GOLF CASUAL CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nVào những ngày mới bắt đầu từ sân golf và kết thúc ở những buổi tiệc ngoài trời, đôi Giày Rộng Chiều Ngang adidas S2G BOA nổi bật với thiết kế lấy cảm hứng từ giày chạy bộ, cho vẻ ngoài và cảm giác trên sân golf tuyệt vời không khác gì đi ngoài đường. Từ sự thoải mái và dễ chịu của đôi giày adidas Bounce cho đến cảm giác ổn định của đế ngoài Thintech, đây là đôi giày kết hợp phong cách thoải mái thường ngày với hiệu năng chuyên dụng cho sân golf. Khả nâng hỗ trợ tinh chỉnh của hệ thống BOA® Fit System giúp bạn điều chỉnh độ ôm phù hợp với hoạt động của mình. Vặn nút xoay khi bước ra sân, rồi nới lỏng sau khi đánh xong, mọi thứ quá đỗi đơn giản với núm xoay BOA®.\r\n\r\nLàm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.',
                'price' => 3500000.000,
                'img' => '1719157411.avif',
                'stock' => 190, // Thêm giá trị stock
                'category_id' => 8,
                'color_id' => 7,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '43', '31'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '43', '31')
            ],
            [
                'id' => 21,
                'name' => 'GIÀY GOLF RỘNG NGANG BOOST TOUR360 BOA 24',
                'description' => 'ĐÔI GIÀY GOLF ĐẲNG CẤP TOUR CÓ SỬ DỤNG CÁC CHẤT LIỆU TÁI CHẾ VÀ TÁI TẠO.\r\nThoải mái nhất. Phong độ nhất. Dễ dàng có được sự tự tin và phong cách với đôi Giày Golf BOOST Tour360 BOA 24 đến từ adidas. Dành cho thi đấu chuyên nghiệp và các golf thủ đam mê, đôi giày này sử dụng các chất liệu cao cấp và công nghệ giày tiên phong cho hiệu năng đẳng cấp. Hệ thống BOA® Fit System tinh chỉnh độ ôm kích hoạt công nghệ 360Wrap bên trong giúp tăng cường nâng đỡ và vững chãi. Đệm adidas Lightstrike kết hợp đệm JET BOOST ở gót giày cùng với khung ổn định Torsion Bridge trợ lực cho từng sải bước và ổn định thế đứng cho những cú drive bùng nổ. Thân giày bằng da microfibre chống thấm nước nâng đỡ bàn chân cho cảm giác thoải mái suốt vòng golf. Nâng tầm cuộc chơi với đôi giày golf cho phong cách và cảm giác tuyệt vời nhất.\r\n\r\nBằng cách chọn tái chế, chúng tôi có thể tái sử dụng những chất liệu đã được tạo ra, từ đó góp phần giảm lãng phí. Những lựa chọn chất liệu tái tạo sẽ giúp chúng tôi giảm phụ thuộc vào nguồn tài nguyên hữu hạn. Các sản phẩm sử dụng kết hợp các chất liệu tái chế và tái tạo của chúng tôi có chứa tổng cộng tối thiểu 20% các chất liệu này.',
                'price' => 6300000.000,
                'img' => '1719157518.avif',
                'stock' => 200, // Thêm giá trị stock
                'category_id' => 8,
                'color_id' => 6,
                'brand_id' => 5,
                'created_at' => Carbon::create('2024', '06', '23', '08', '45', '18'),
                'updated_at' => Carbon::create('2024', '06', '23', '08', '45', '18')
            ],
        ]);
    }
}
