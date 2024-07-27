CREATE DATABASE ban_sach;
use ban_sach;
CREATE TABLE Categories
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);

CREATE TABLE Products
(
    id int PRIMARY KEY AUTO_INCREMENT,
    author varchar(100) NOT NULL,
    name varchar(150) NOT NULL UNIQUE,
    price float NOT NULL,
    sale_price float NULL DEFAULT '0',
    image varchar(100) NULL,
    description varchar(200) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL,
    category_id int NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE  NewProducts
(
	
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(150) NOT NULL UNIQUE,
    author varchar(100) NOT NULL,
    image varchar(100) NULL,
    category_id int NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    publication_date timestamp default CURRENT_TIMESTAMP 	,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);


CREATE TABLE Customer 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    phone varchar(12) NOT NULL UNIQUE,
    address varchar(255) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);

CREATE TABLE Users 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL

);


CREATE TABLE Orders 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NULL,
    email varchar(100) NULL,
    phone varchar(12) NULL,
    address varchar(255) NULL,
    note varchar(255) NULL,
    customer_id int NOT NULL,
    status tinyint default '0' null,
    token varchar(255) null,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);

CREATE TABLE Order_details
(
    order_id int NOT NULL,
    product_id int NOT NULL,
    price float NOT NULL,
    quantity int NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id),
    PRIMARY KEY (order_id, product_id)
);




INSERT INTO `Categories`( `name`) VALUES 
(N'Chuyển sinh'),
(N'Cổ Đại'),
(N'Drama'),
(N'Kinh Dị'),
(N'Ngôn Tình'),
(N'Tâm Lý'),
(N'Xuyên Không');




INSERT INTO `products` (`id`, `author`, `name`, `price`, `sale_price`, `image`, `description`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Krish & Ananya', 'Chào Ngày Vui', 895639, NULL, '1697768419-b.png', 'Linda - cô nàng trẻ tuổi, năng động, hoạt bát và tràn đầy năng lượng luôn luôn vui vẻ với mọi thứ xoay quanh cô.\r\nLucsy - chàng trai trẻ bế tắc trong công việc và cuộc sống, luôn tìm cách kết thúc cuộc đời của mình. \r\nBỗng một ngày họ sống chung dưới một mái nhà với thân phận là hàng xóm của nhau. Liệu Linda sẽ làm cách nào để cứu vớt Lucsy trở về cuộc sống như lúc đầu. Hãy cùng Krish & Ananya theo dõi chuyện tình của cặp đôi này nhé !', '2023-10-19 12:20:19', '2023-10-24', 5),
(2, 'Minh Thư', 'Sắc Dục', 927512, NULL, '1697769203-22.png', 'Một bộ truyện đến từ tác giả trẻ đầy nhiệt huyết Minh Thư của chúng ta. Bộ truyện khiến ta nghẹn thở mà muốn thoát ra, rất nhiều độc giả đã khóc sau khi đọc bộ truyện Sắc Dục bởi cái số phận nghiệt ngã của người phụ nữ, bởi cái định lý bất công của thời phong kiến khắc sâu trong tâm trí của cha ông, bởi cái nhìn luôn chăm chăm vào cơ thể phụ nữ.', '2023-10-19 12:33:23', '2023-10-24', 4),
(3, 'Huyền Thiên', 'Không Thể Quay Đầu Đâu', 917254, 0, '1697769361-11.png', 'Một cuốn sách xoay quanh về các mối quan hệ của Runsly - một cô gái nhút nhát. Mối quan hệ gia đình - bạn bè - người thân - người yêu và chính bản thân cô ấy. Liệu cô ấy xoay sở ra sao trong những lúc bản thân không thể tìm lối thoát. Cuốn sách sẽ khiến bạn bất ngờ và tuyệt vọng trong đầy thăng trầm cảm xúc khiến người đọc không rõ được tiến trình.', '2023-10-19 12:36:01', '2023-10-20', 6),
(4, 'Load & Miu', 'Couple', 986512, NULL, '1697769595-c.png', 'Cặp đôi tắc kè hoa của chúng ta đã đem đến cho chúng ta một cuốn sách nói về những cặp đôi thường hay làm gì và cách để họ sống chung hòa hợp với nhau. Cuốn sách được dựa trên những điều thực tế mà cặp đôi tắc kè hoa của chúng ta gặp phải và cũng có những hướng giải quyết quyết đoán và vô cùng xúc động. Có lẽ xúc động nhất vẫn là chương cuối của cuối sách mang tên \" Hiện Tại \". Đây cũng là cuốn sách cuối cùng mà cặp đôi này viết khi Load sẽ lên xe hoa vào tháng tới tính từ ngày cuốn sách xuất bản. Chúc độc giả sẽ luôn hạnh phúc trong tình yêu của mình.', '2023-10-19 12:39:55', '2023-10-24', 5),
(5, 'Linh Thu', 'Thiện Ác', 912512, 0, '1697769944-98.png', 'Cô nàng Cheyong của chúng ta là một người đa nhân cách, bên trong cô ấy có một người vô cùng lương thiện nhưng cũng có một người vô cùng độc ác. Họ thay phiên nhau xuất hiện trên người Cheyong. Nhân cách lương thiện luôn thích mặc đồ đen và những chú quạ đen bên nghĩa địa, công việc của người lương thiện là chăm sóc nghĩa địa. Nhân cách độc ác của cô nàng lại trái ngược hoàn toàn, cô thích mặc đồ trắng, thích ánh nắng ban mai và những bó hoa xinh đẹp mỗi sáng, cô bỏ độc dược vào bất kỳ một ai mà cô không hài lòng. Một ngày nọ, một nhân cách thứ 3 xuất hiện và cuộc sống hoàn toàn bị đảo lộn. Liệu điều gì sẽ và đang đến, hãy cùng chúng mình đi cùng Linh Thu để theo dõi những bước đi hành động của cô nàng đa nhân cách này.', '2023-10-19 12:45:44', '2023-10-20', 3),
(6, 'Kisaki Tetta', 'Biến Khỏi Đầu Tôi Đi', 978252, 0, '1697770602-6.png', 'Loura - Một cô nàng đang có một cuộc sống bình thường, Lusy - một linh hồn lạc lối họ gặp nhau. Lusy mong rằng Loura có thể tìm được xác của mình đem về quê nhà chôn cất. Loura mong Lusy có thể cứu vớt cô khỏi cuộc đời tăm tối. Hai người họ lại làm bản thân mình bế tắc và mệt mỏi hơn bất kỳ ai hết. Loura trách tất cả mọi điều là do Lusy đem đến cho mình nên đã luôn đuổi cô ra khỏi cơ thể của mình. Nhưng chính sự xua đuổi đấy càng làm Lusy trở thành một quỷ dữ và luôn nhồi nhét vào đầu Loura những hành động trái lương tâm của cô. Liệu mọi chuyển có được kết thúc viên mãn hay chăng ?', '2023-10-19 12:56:42', '2023-10-20', 6),
(7, 'Jay & Lou', 'Hãy Bên Em !', 981742, 0, '1697770861-5.png', 'Một cuộc hôn nhân sắp đặt, một cuộc tình ngang trái đã đưa họ đến với nhau theo một cách không ai mong muốn nhất. Tề Mặc - nam chính của chúng ta ngoại trừ khi đám cưới diễn ra thì anh không hề xuất hiện trước mặt vợ của mình - Minh Kiều. Minh Kiều là người theo chủ nghĩa độc thân, nên điều này đối với cô mà nói là một cuộc làm ăn vô cùng có lợi cho đến khi công ty xảy ra một việc vô cùng lớn thì bỗng chốc người chồng của cô xuất hiện cùng một người tình nhân bên cạnh. Liệu họ có nhận ra nhau hay không ?', '2023-10-19 13:01:01', '2023-10-20', 3),
(8, 'Runa', 'Chuyện Tình Yêu Tinh', 912485, NULL, '1697771018-7.png', 'Từ kiếp này tới kiếp khác, chàng chạy đi tìm kiếm phu nhân của mình, cả cuộc đời của chàng luôn vô vị và chán nán. Cho đến khi nàng xuất hiện làm mọi thứ như có thêm màu sắc, bản tính lương thiện của nàng, nụ cười hiền từ của nàng và mọi điều từ nàng đã làm cho một người cứng nhắc cũng phải mềm yếu mà dịu dàng trước nàng.', '2023-10-19 13:03:38', '2023-10-24', 5),
(11, 'Miu', 'Get Ready with Me', 24124, NULL, '1698113578-son.png', 'Ba cô nàng chơi thân với nhau, vì một vụ tai nạn sảy ra mà cả ba đã ra đi cùng nhau. Khi mở mắt ra cả ba nhận ra đã trong một cơ thể khác và liệu họ xoay sở ra sao ? Hãy cùng theo dõi nhé !', '2023-10-23 19:12:58', '2023-10-24', 1),
(12, 'Input', 'Thế Giới Của Những Loài Nấm', 24912, NULL, '1698113810-ngu.png', 'Một vườn nấm chứa những loài nấm cực độc gây ảo giác như một chất gây nghiện được các nhà khoa học nghiên cứu. Những chú ếch nằm trong danh sách thí nghiệm được thả tự do trong khu vườn nấm. Mọi chuyện xảy ra cứ ngỡ như một bi kịch nhưng lại đem đến cho độc giả những giây phút giật thót, bối rồi và bàng hoàng trước những chú ếch.', '2023-10-23 19:16:50', '2023-10-24', 2),
(13, 'Mây and Hoàng', 'Level Up', 21984, NULL, '1698116299-minh.png', 'Một cuộc tình bước từng bước một, ban đầu là người lạ rồi thành người quen rồi thành bạn và cuối cùng là người yêu của nhau. Bước từng bước một, nhưng lại luôn mang cho đối phương cảm giác lạc lõng và khó tả.', '2023-10-23 19:58:19', '2023-10-24', 3),
(14, 'Ếch nhỏ', 'Will You Be My Valentine ?', 93562, NULL, '1698116463-hon.png', 'Một cái hồ nước bỗng dưng xuất hiện trong một công viên tại thủ đô. Nơi đây tựa như là nơi hẹn hò của các cặp đôi uyên ương thề non hẹn biển. Và như mọi khi, khi cặp đôi chính của chúng ta cầu hôn nhau thì một chú ếch nhỏ xuất hiện tựa như người làm chứng tại lễ đường. Và mọi chuyện kỳ quái bắt đầu xảy ra và làm rối tung mọi thứ lên.', '2023-10-23 20:01:03', '2023-10-24', 4),
(15, 'Katie', 'James & Katie', 195898, NULL, '1698116622-hoang.png', 'Tác giả Katie đã viết lại câu chuyện tình của mình như một cách lưu giữ những kỷ niệm khó quên của cô. Nhưng mọi thứ tưởng chừng như êm đềm đó lại luôn ẩn chứa những điều khiến đối phương thất vọng. Và mọi chuyện xảy ra khi chính tác giả của chúng ta lại bị đối phương giam cầm trong căn phòng suốt 10 năm trời cho đến khi đội cứu hộ đến và giải cứu. Hãy cùng theo dõi những góc ẩn của chuyện tình ngỡ lãng mạn này.', '2023-10-23 20:03:42', '2023-10-24', 5),
(16, 'Bé Nho', 'Nice To Meet You', 985612, NULL, '1698116725-cho.png', 'Một bộ truyện với tựa đề \" Rất vui được gặp bạn \" được viết nên để kể về những mối tình cấp 3 thuở thiếu niên thơ ngây và đẹp đẽ chứa đầy những sự hồn nhiên và vô tư của tuổi học trò. Tất cả các mối tình đều kết thúc khi bước chân qua tuổi 18 như một hồi ức.', '2023-10-23 20:05:25', '2023-10-24', 6),
(17, 'Cáo', 'Summer Days', 29581, NULL, '1698116905-be.png', 'Những ngày hè ngập nắng, một người mất đi người mình yêu cứ thế bước qua mùa thu rồi đông. Mùa đông vốn dĩ rất lạnh, lại thêm nỗi đau về cả tinh thần lẫn thể xác, vô vàn hình ảnh yêu thương cùng người yêu mình ngắm những bông tuyết, uống ca cao nóng, và cùng nhau đón Giáng Sinh. Tất cả đều rất tuyệt đẹp vì những điều đó chỉ là một giấc mơ trong những phút bồng bột đưa mình về nơi đất trời.', '2023-10-23 20:08:25', '2023-10-24', 7);


INSERT INTO `newproducts` (`id`, `name`, `author`, `image`, `category_id`, `publication_date`, `created_at`, `updated_at`) VALUES
(1, 'Tấm Rèm Buông', 'Thiên Minh', '1697771534-14.png', 4, '2023-12-14 17:00:00', '2023-10-19 20:12:14', '2023-10-20'),
(2, 'Bờ Môi', 'Duy Thanh', '1697771568-21.png', 3, '2024-02-22 17:00:00', '2023-10-19 20:12:48', '2023-10-20'),
(3, 'Người Ấy Không Trở Về', 'Én & Thỏ', '1697771614-10.png', 6, '2024-01-17 17:00:00', '2023-10-19 20:13:34', '2023-10-20'),
(4, 'Ghim Vào Nơi Trái Tim Nở', 'Ijunyo', '1697771662-99.png', 5, '2024-01-24 17:00:00', '2023-10-19 20:14:22', '2023-10-20'),
(5, 'Họ Không Đáng Tin', 'Lũ', '1697771715-12.png', 3, '2023-11-29 17:00:00', '2023-10-19 20:15:15', '2023-10-20'),
(6, 'Vô Hồn', 'Lũ & Bè', '1697771749-100.png', 4, '2024-08-30 17:00:00', '2023-10-19 20:15:49', '2023-10-20');