<?php

$requestData['username'] = 'quyen';
$requestData['email'] = 'quyen@gmail.com';
$requestData['password'] = '123123';

print(count($requestData)) = 3
print(isset($requestData['sex'])) =false
print(isset($requestData['username'])) =true
print(!empty($requestData['username'])) =true
// xong r anh 
// sai
isset sao lai trả về 
// e sua lai dung chua a
viet sai false chu ko phai flase
---

$a = [
'1' => 1,
'2' => 2,
2
];
echo $a['2'];// nó sẽ echo ra là 2
if (isset($a['2']) && !empty($a[3]) || count($a) >=3 ) {
  echo "1";// false echo "1" sao lai la false @@
  // e nham e tuong a cái cuối a nhập sai 
  // A nói từ đầu rooi, ko có nhầm hay tưởng bỏ thói quen đó đi, suy nghĩ kỹ trước khi trả lời.
  // Tóm lại là đoạn này nó echo ra mấy?1 why? nó kiểm tra trong mang a co gai tri 2 ko nêu có nó sẽ trả về giá trị true rồi echo ra 1
  // Thế này thi sao? sửa rồi đó
  // nó vẫn ra là 1 
  --Tiếp
  // e nghi là flase
  // vi !empty  là kiểm tra xem có tồn tại giá trị 3 hay k 
  // dung k ạ 
  // !empty($a[3]) = false. thfi ca cai false luon 
  // a để &&
  ---
  // tra ve gia tru true 
  // ở đây nó xét 2 điều kiện ho" điều kiện sau đúng thì nó vẫn trả về giá trị true và vãn thực hiện ech

}
dau r sao lai la 1, phep so sanh cho ra kq true false, sao lai ra so vây 
e chua hieu đe bai luon 
phép so sánh, điền kết quả vào hiểu chưa?

1 === '1' = false: sai /// wwhy? vi nos khac kieu du lieu, 1== '1' thì sao? true ? why? vi hai gia tri giong nhau. Hieu == với === khác nhau thế nào chưa? roi aj . Xem lại các câu trloi dưới
false === 0 = false// Chắc chưa? haha roi a.
true === 1 = false 
false == 0 = true
true === false = false // cai nay e k chac e nho === là so sánh tương đồng chỉ trả về giá trị true
// Ai dậy em ở trường === là so sánh tương đồng vậy?pe
// sai aj  e xem trên mạng thế . Thế ss tương đồng là gì?
// nó cùng giá trị data hoặc type
date?
// == Nó so sánh giá trị, không quan tâm đến kiểu dữ liêu (tiếng anh là datatype)
// === So sánh cả giá trị với kiểu dữ liệu. Cái gì mà cùng giá trị data or type a nghe ko hieu.
'a' == 'a' = true
'a' === 'a' = true
null == ""; // true. So sánh giá trị nên bằng true. Còn nếu ở đây dùng === thì là false.
Vì null là kiểu null còn "" là string.
null == "0"; // false
???
haha e chua hieu cau hoi 
Đang giải thích thôi. Có hỏi đâu
Ko a giai thich cho e . Tai sao no = true đó

?>
-- Ty xong note lai đã học cái gì nhé.
Mấy thằng hlv trường e dậy như cặc
:(((((.
https://viblo.asia/p/variable-comparison-in-php-3ZabG9mkGzY6
Dành thời gian ở nhà học nhiều, đừng kỳ vọng trên lớp, lấy tấm bằng thôi, trung bình cugnx được. Nhớ đoc cái link trên nhé.
vanag dder luwu lai
Nhớ đọc cái bài viết đó.
vang 