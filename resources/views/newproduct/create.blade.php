<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
    <title>Admin Ếch Con</title>
    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css">
    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">
        <x-nav />
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-adminheader />
                <div class="grid-margin stretch-card">
                    <div class="card position-relative mx-auto">
                        <div class="card-body p-4">
                            <h2 class="h3 mb-0 text-gray-800 py-5"> Create NewProduct</h2>
                            <div id="detailedReports"
                                class="carousel slide detailed-report-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner container">
                                    <div class="carousel-item active">

                                        <form action="{{ route('newproduct.store') }}" method="POST" role="form"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for=""><b>Tên Sản Phẩm</b></label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Input name" value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for=""><b>Tên Tác Giả</b></label>
                                                <input type="text" class="form-control" name="author"
                                                    placeholder="Input author" value="{{ old('author') }}">
                                            </div>
                                            @error('author')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for="">Bìa Sách </label>
                                                <input type="file" class="form-control" name="file"
                                                    placeholder="Input image">
                                            </div>
                                            @error('file')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for=""><b>Ngày Xuất Bản</b></label>
                                                <input type="date" class="form-control" name="publication_date"
                                                    placeholder="Input publication_date"
                                                    value="{{ old('publication_date') }}">
                                            </div>
                                            @error('publication_date')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for=""> <b>Danh Mục</b></label>
                                                <select name="category_id" id="input" class="form-control">
                                                    <option value="">Chọn Danh Mục</option>
                                                    @foreach($category as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                    Save </button>
                                                <button type="reset" class="btn btn-primary"><i
                                                        class="fa fa-refresh"></i> Reset </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-pageTop />

    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="asset/js/sb-admin-2.min.js"></script>
    <script src="asset/vendor/chart.js/Chart.min.js"></script>
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
    <script>
    $('.description').summernote({
        height: 250
    });
    </script>
</body>

</html>