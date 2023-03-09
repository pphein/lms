@extends('layouts.app')

@section('content')
<div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">Dashboard</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a href="#" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                </li>
                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">loser</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col">
        <main class="">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner drk m-0 vh-100">
                    <div class="carousel-item active">
                        <img src="{{url('sliders/slider1.jpg')}}" class="d-block vh-100" alt="Slider One">
                        <div class="carousel-caption">
                            <h3>First slide label</h3>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{url('sliders/slider2.jpg')}}" class="d-block vh-100" alt="Slider Two">
                        <div class="carousel-caption">
                            <h3>Second slide label</h3>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{url('sliders/slider3.jpg')}}" class="d-block vh-100" alt="Slider Three">
                        <div class="carousel-caption">
                            <h3>Third slide label</h3>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{url('sliders/slider4.jpg')}}" class="d-block vh-100" alt="Slider Four">
                        <div class="carousel-caption">
                            <h3>Fourth slide label</h3>
                            <p>Some representative placeholder content for the fourth slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </main>
    </div>
</div>
@endsection
