<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - AY Japan Bikes Shop</title>

    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <!-- swiper css  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- glider css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<link rel="icon" href="{{ asset('image/icon/ay japan bikes shop.png') }}">

<body>

    <!-- nav bar start-->
        <nav class="navbar navbar-expand-lg sticky-top shadow-sm" id="nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="logo">
                    <img src="{{ asset('image/icon/ay japan bikes shop.png') }}" class="w-100 d-block">
                </a>
                <label for="" id="ay-label">AY JAPAN BIKES SHOP.</label>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto" id="nav-unorder">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('user#homePage') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user#productList') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user#aboutPage') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user#contactPage') }}">Contact</a>
                        </li>
                    </ul>
                    <div class="nav-item d-flex">
                        <div class="dropdown d-inline me-4">
                            <a href="" class="ml-3 text-white btn border border-1 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown">
                                <i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item my-2" href="{{ route('user#accountpfp') }}">
                                        <i class="fa-solid fa-user me-2"></i>Account
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item my-2" href="{{ route('user#changePassPage') }}">
                                        <i class="fa-solid fa-lock me-2"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="btn-disabled">
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn bg-dark text-white w-100" type="submit">
                                                <i class="fa-solid fa-right-from-bracket"></i>Logout
                                            </button>
                                        </form>
                                    </a>
                              </li>
                            </ul>
                        </div>
                        <div class="nav-item me-4">
                            <a href="cart.html" type="button" class="btn btn-outline-light position-relative" id="dropdown">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                  99+
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    <!-- nav bar end  -->

    <!-- Shop Start -->
    <div class="container-fluid mx-auto mt-4">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4 mb-5">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-4"><span class="bg-body-secondary p-2 text-black">Products</span></h5>
                <div class="bg-dark text-white p-4 mb-30">
                    <form>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="text-info">Categories</h5>
                            <label class="badge border text-info">{{ count($category) }}</label>
                        </div>
                        <hr style="border-color: white;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ route('user#productList') }}" class="text-white"><label class="" for="price-1">All</label></a>
                        </div>
                       @foreach ($category as $c)
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="{{ route('user#productFliter',$c->name) }}" class="text-white"><label class="">{{ $c->name }}</label></a>
                            </div>
                       @endforeach
                    </form>
                </div>
                <!-- Price End -->

                <div class="">
                    <button class="btn btn btn-info w-100">Order</button>
                </div>
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <a href="{{ route('cart#list') }}" class="text-decoration-none me-3">
                                    <button type="button" class="btn btn-dark text-white position-relative mb-1">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary-subtle text-dark">
                                            5
                                        </span>
                                    </button>
                                </a>

                                <a href="history.html" class="">
                                    <button type="button" class="btn btn-dark text-white position-relative mb-1">
                                        <i class="fa-solid fa-clock-rotate-left"></i> History
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary-subtle text-dark">
                                            3
                                        </span>
                                    </button>
                                </a>
                            </div>
                            <div class="ms-3">
                                <div class="btn-group">
                                    <select class="form-control bg-body-secondary" id="ajax-sorting" name="sorting">
                                        <option value="" disabled>Choose One Option...</option>
                                        <option value="asc">Ascending</option>
                                        <option value="desc">Descending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto" id="ajax-form">
                        @if (count($products) != 0)
                            @foreach ($products as $p)
                                <div class="col-lg-4 col-md-6 col-sm-6" >
                                    <div class="product-item mb-4">
                                        <div class="position-relative overflow-hidden">
                                            <div id="product-img-content">
                                                <img src="{{ asset('storage/'.$p->image) }}" class="w-100 d-block" style="height: 240px;">
                                                <div id="product-img-link">
                                                    <a href="{{ route('detail#view',$p->id) }}" id="eye"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="shop.html" id="shop"><i class="fa-solid fa-cart-shopping"></i></a>
                                                </div>
                                            </div>
                                            <div id="product-name" class="mt-2 border px-1 py-1">
                                                <h5>{{ $p->name }}</h5>
                                                <label class="mb-2">{{ $p->category_name }}</label>
                                                <div class="d-flex" style="color: #a2b2ee;">
                                                    <label for="" class="me-5">{{ $p->price }}</label>
                                                    <span>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center bg-body-secondary fs-4 text-dark col-6 offset-3 rounded py-2">There is no product.<i class="fa-solid fa-bicycle ms-2"></i> </p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</body>
<!-- glider js  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js" integrity="sha512-AZURF+lGBgrV0WM7dsCFwaQEltUV5964wxMv+TSzbb6G1/Poa9sFxaCed8l8CcFRTiP7FsCgCyOm/kf1LARyxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- js  -->
<script src="{{ asset('js/script.js') }}"></script>

<!-- jquery  -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>

<script>
    $(document).ready(function(){
        $('#ajax-sorting').change(function(){
            $eventOption = $('#ajax-sorting').val();

            if($eventOption == 'asc'){
                $.ajax({
                    type: 'get',
                    url: '/user/ajax/sorting',
                    data: { 'status' : 'asc' },
                    dataType: 'json',
                    success: function(response){
                        $list = ``;
                        for ($i=0; $i < response.length; $i++) {
                            $list += `
                            <div class="col-lg-4 col-md-6 col-sm-6" >
                                <div class="product-item mb-4">
                                    <div class="position-relative overflow-hidden">
                                        <div id="product-img-content">
                                            <img src="{{ asset('storage/${response[$i].image}') }}" class="w-100 d-block" style="height: 240px;">
                                            <div id="product-img-link">
                                                <a href="view.html" id="eye"><i class="fa-solid fa-eye"></i></a>
                                                <a href="shop.html" id="shop"><i class="fa-solid fa-cart-shopping"></i></a>
                                            </div>
                                        </div>
                                        <div id="product-name" class="mt-2 border px-1 py-1">
                                            <h5> ${response[$i].name} </h5>
                                            <label class="mb-2"> ${response[$i].category_name} </label>
                                            <div class="d-flex" style="color: #a2b2ee;">
                                                <label for="" class="me-5"> ${response[$i].price} </label>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> `;
                        }
                        $('#ajax-form').html($list);
                    }
                });
            }
            else if($eventOption == 'desc'){
                $.ajax({
                    type: 'get',
                    url: '/user/ajax/sorting',
                    data: { 'status' : 'desc' },
                    dataType: 'json',
                    success: function(response){
                        $list = ``;
                        for ($i=0; $i < response.length; $i++) {
                            $list += `
                            <div class="col-lg-4 col-md-6 col-sm-6" >
                                <div class="product-item mb-4">
                                    <div class="position-relative overflow-hidden">
                                        <div id="product-img-content">
                                            <img src="{{ asset('storage/${response[$i].image}') }}" class="w-100 d-block" style="height: 240px;">
                                            <div id="product-img-link">
                                                <a href="view.html" id="eye"><i class="fa-solid fa-eye"></i></a>
                                                <a href="shop.html" id="shop"><i class="fa-solid fa-cart-shopping"></i></a>
                                            </div>
                                        </div>
                                        <div id="product-name" class="mt-2 border px-1 py-1">
                                            <h5> ${response[$i].name} </h5>
                                            <label class="mb-2"> ${response[$i].category_name} </label>
                                            <div class="d-flex" style="color: #a2b2ee;">
                                                <label for="" class="me-5"> ${response[$i].price} </label>
                                                <span>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> `;
                        }
                        $('#ajax-form').html($list);
                    }
                });
            }
        });
    });
</script>
