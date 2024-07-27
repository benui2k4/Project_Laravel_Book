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
    <link rel="stylesheet" href="home.css">
</head>

<x-header />
<div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="active/image/trang chủ 1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="active/image/trang chủ 2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="active/image/trang chủ 3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<body>

    <div style="background-color: green;">

        <div>
            <div class="container" id=product-box>
                <ul class="ul">
                    <li class="li list active" data-filter="all">All</li>
                    @foreach($category as $cat)
                    <li class="li list pl-4 pr-4" data-filter="{{$cat->id}}">{{$cat->name}}</li>
                    @endforeach
                </ul>
                <h2 class="text-center py-3 text-white"><b>Sách Nổi Bật</b></h2>
                <div class="row">
                    @foreach($product as $pr)
                    <div class="col-md-4 col-sm-12 col-lg-4 py-3 item {{$pr->category_id}}">
                        <div class="card text-left">
                            <img class="card-img-top" src="uploads/{{$pr->image}}" alt="Engaged">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{$pr->name}}</h4>
                                <p>Tác giả: {{$pr->author}}</p>
                                <p class="card-text">
                                    <b>Giá: {{ number_format($pr->price) }}đ</b>
                                </p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal"
                                    data-target="#model-{{$pr->id}}">
                                    Chi tiết
                                </button>
                                <div class="py-1"></div>
                                <!-- Modal -->
                                <div class="modal fade" id="model-{{$pr->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$pr->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <img class="card-img-top" src="uploads/{{$pr->image}}">
                                                    <div style="text-align: left; ">{{$pr->description}}...</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Đóng</button>
                                                <a href="{{ route('cart.add',$pr->id)}}" class="btn btn-success">Thêm
                                                    vào giỏ
                                                    hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                $('#exampleModal').on('show.bs.modal', event => {
                                    var button = $(event.relatedTarget);
                                    var modal = $(this);
                                });
                                </script>
                                <a href="{{ route('cart.add',$pr->id)}}" class="btn btn-sm btn-success btn-block">Thêm
                                    vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h2 class="text-center py-3 text-white"><b>Sách Sắp Ra Mắt</b></h2>
                <div class="row">
                    @foreach($newproduct as $npr)
                    <div class="col-md-4 col-sm-12 col-lg-4 py-3">
                        <div class="card text-left">
                            <span class="badge badge-danger position-absolute mt-2 ml-2 py-2 px-3">NEW</span>
                            <img class="card-img-top" src="uploads/{{$npr->image}}" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{$npr->name}}</h4>
                                <p class="card-text">
                                    Tác giả: {{$npr->author}} </p>
                                <p>Ngày xuất bản: {{$npr->publication_date}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <x-footer />
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="active/js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.list').click(function() {
            const son = $(this).attr('data-filter');
            if (son == 'all') {
                $('.item').show('1000');
            } else {
                $('.item').not('.' + son).hide('1000');
                $('.item').filter('.' + son).show('1000');
            }
        });
        $('.list').addClass('active').siblings().addremoveClass('active');
    });
    </script>

</body>



</html>