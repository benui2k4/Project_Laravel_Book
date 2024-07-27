<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <title>Tiệm Sách Ếch Con</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="active/css/style.css">

</head>

<x-header />

<body>

    <div style="background-color: green;">
        <div class="py-5">
            <div class="container" id=product-box style="background-color: white; border-radius: 15px 50px 30px;">
                <div class="p-t-140 py-5">
                    <div class="container center">
                        <h2 class="pb-5" style="text-align: center; font-size: 100px;">Giỏ hàng của bạn</h2>
                        <div>
                            @if (Session::has('ok'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{Session::get('ok')}}
                            </div>
                            @endif

                            @if (Session::has('no'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{Session::get('no')}}
                            </div>
                            @endif

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Bìa sách</th>
                                        <th>Tên sách</th>
                                        <th>Tác Giả</th>
                                        <th>Giá</th>
                                        <th>Điều chỉnh số lượng</th>
                                        <th>Số lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart->items as $item )
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td><img src="uploads/{{$item->image}}" width="100px"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->author}}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>
                                            <form action="{{ route('cart.update', $item->id) }}" method="get">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <div class="btn-num-product-down cl3 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input name="quantity" class="mtext-100 cl3 txt-center num-product"
                                                        style="width:70px;" type="number" name="num-product"
                                                        value="{{$item->quantity}}">
                                                    <button class="btn btn-sm btn-primary text-center">
                                                        Update
                                                    </button>
                                                </div>

                                            </form>
                                        </td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{ number_format($item->quantity * $item->price) }}đ</td>
                                        <td>
                                            <a href="{{ route('cart.remove',$item->id) }}"
                                                class="btn btn-danger">&times;</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-center p-b-25">
                                <h2 class="py-3">Tổng tiền : {{ number_format($cart->totalPrice) }}đ</h2>
                                <a href="{{ route('home') }}#product-box" class="btn btn-primary">Tiếp tục mua</a>
                                <a href="{{ route('cart.clear') }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc không?')">Xóa giỏ hàng</a>
                                <a href="{{ route('order.checkout') }}" class="btn btn-success">Đặt
                                    hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>

    <!-- Latest compiled and minified JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>


</html>