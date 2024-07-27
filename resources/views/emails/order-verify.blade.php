<div style="width: 800px; margin: auto; padding: 10px; background-color: lightblue;">
    <h4>Xin chào: {{$customer->name}}</h4>
    <p>Email dưới đây là thông tin đơn hàng quý khách đã thực hiện giao dịch tại cửa hàng chúng tôi</p>
    <p>Quý khách kiểm tra thông tin và xác nhận lại đơn hàng bằng cách nhấn vào nút <b>Xác nhận đơn hàng phí dưới</b>
    </p>
    <h4>Thông tin đơn hàng</h4>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <td>Mã ĐH</td>
            <td>Ngày đặt</td>
            <td>Tổng tiền</td>
            <td>Trạng thái</td>
            <td width="100"></td>
        </tr>

        <tr>
            <td>#{{$order->id}}</td>
            <td>{{$order->created_at->format('d/m/Y h:i:s')}}</td>
            <td>${{ number_format($order->total) }}</td>
            <td>Chờ xác nhận của quý khách</td>
            <td>
                <a href="{{route('order.verify', $order->token)}}"
                    style="display: inline-block;text-decoration: none; color: #fff; font-weight: bold;padding: 5px 15px; background-color: green;">Xác
                    nhận</a>
            </td>
        </tr>

    </table>

    <h4>Chi tiết đơn hàng</h4>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <td>STT</td>
            <td>Bìa sách</td>
            <td>Tên sách</td>
            <td>Tác giả</td>
            <td>Số lượng</td>
            <td>Giá</td>
            <td>Thành tiền</td>
        </tr>
        @foreach($order->details as $dt)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>
                <img width="60" src="uploads/{{$dt->image}}" alt="">
            </td>
            <td>{{$dt->product->name}}</td>
            <td>{{$dt->product->author}}</td>
            <td>{{$dt->quantity}}</td>
            <td>{{$dt->price}}</td>
            <td>{{$dt->quantity * $dt->price}}</td>
        </tr>
        @endforeach

    </table>
</div>