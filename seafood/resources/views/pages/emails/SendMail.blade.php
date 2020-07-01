<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seafood</title>
</head>

<body>
   <h1>{{$details['title']}}</h1>
   <h4>{{$details['body']}}</h4>
   <p>Tên khách hàng: {{$details['content']}}</p>
   <p>Số điện thoại: {{$details['phone']}}</p>
   <p>Số người: {{$details['song']}}</p>
   <p>Ngày Ăn: {{ date('d-m-Y', strtotime($details['ngay']))}}</p>
   @if($details['tgian']==1)
   <p>Giờ Ăn: Sáng(8h-13h)</p>
   @elseif($details['tgian']==2)
   <p>Giờ Ăn: Chiều(13h - 17h)</p>
   @elseif($details['tgian']==3)
   <p>Giờ Ăn: Tối(17h - 22h)</p>
   @endif
   <p>Mức giá/1 bàn: {{number_format($details['gia'])}}VNĐ</p>
   <p>Có gì thắc mắc liên hệ qua hostline:
    <a href=""><h4>0962.282.864</h4> 
    </a>
    </p>
</body>
</html>