<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Food Sharing') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: "Sarabun", sans-serif;
            font-weight: 400;
            font-style: normal;
            padding-bottom: 10vw;
            background-color: #ede5e5;
        }
        .hero-section {
            background-image: url('images/header.jpg');
            background-size: cover; /* ปรับขนาดภาพให้ครอบคลุมพื้นที่ */
            background-position: center; /* จัดตำแหน่งภาพให้อยู่ตรงกลาง */
            background-repeat: no-repeat; /* ห้ามทำให้ภาพซ้ำ */
            color: #fff; /* เปลี่ยนสีข้อความให้เข้ากับพื้นหลัง */
            padding: 50px 0; /* เพิ่มพื้นที่ด้านบนและด้านล่าง */
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero-text {
            text-align: center;
        }
        .search-bar {
            margin: 20px auto;
            max-width: 600px;
        }
        /* การจัดระเบียบสินค้าภายในร้านค้า */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        .card-img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .product-card {
            
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .shop-card {
            
            margin-bottom: 20px;
            flex: 1 1 100%;
            margin-bottom: 1rem;
            background: rgba(255, 255, 255, 0.3); /* White background with 80% opacity */
            backdrop-filter: blur(10px); /* Apply blur effect */
            border-radius: 10px; /* Optional: rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Optional: shadow for better visibility */
            color: white;
        }
        .search-card {
            position: absolute;
            top: 0px; /* Adjust this value based on your header height */
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 100%; /* Optional: set a maximum width */
            z-index: 1000; /* Ensure it stays on top of other content */
            background: rgba(255, 255, 255, 0.3); /* White background with 80% opacity */
            backdrop-filter: blur(10px); /* Apply blur effect */
            border-radius: 10px; /* Optional: rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: shadow for better visibility */
            color: white;
        }
        .hero-section-from {
            margin-top: 100px; /* Space for the card to float above */
            position: absolute;
            top: 400px; /* Adjust this value based on your header height */
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 800px; /* Optional: set a maximum width */
            z-index: 1002; /* Ensure it stays on top of other content */
             
        }
        .hero-section-banner { 
            margin-top: 150px; /* Space for the card to float above */
            position: absolute;
            top: 550px; /* Adjust this value based on your header height */
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 1800px; /* Optional: set a maximum width */
            z-index: 1003; /* Ensure it stays on top of other content */
             
        }
        .container-product { 
            padding-top: 20px;
        }
        .container-product-shop { 
             /* Ensure it stays on top of other content */
             color: rgb(77, 7, 7);
        }
        .btn-custom-find {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            border: 2px solid transparent;
        }
   
 
        .navbar{
            position: absolute;
            top: 0px; /* Adjust this value based on your header height */
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 100%; /* Optional: set a maximum width */
            z-index: 1000; /* Ensure it stays on top of other content */
            background: rgba(255, 255, 255, 0.5); /* White background with 80% opacity */
            backdrop-filter: blur(10px); /* Apply blur effect */
            border-radius: 10px; /* Optional: rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: shadow for better visibility */
            color: white;
        }
        .navbar-pro {
            display: flex;
            justify-content: center;
            align-items: center; 
            padding: 10px;
        }
        .navbar-pro .nav-item {
            margin: 0 15px;
            text-align: center;
        }
        .navbar-pro .nav-item a {
            color: rgb(77, 7, 7);
            text-decoration: none;
            font-size: 14px;
        }
        .navbar-pro .nav-item a .icon {
            font-size: 24px;
            display: block;
        }
        .navbar-pro .nav-item a:hover {
            color: #ff6600;
        }
        @media (max-width: 768px) {
                /* สำหรับหน้าจอมือถือ */
            .product-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 คอลัมน์ในหน้าจอมือถือ */
            }
            .navbar-pro .nav-item span {
                display: none;
            }
            .container-product{
                padding-top: 2px;
            }
            .hero-section-from {
                margin-top: 100px; /* Space for the card to float above */
                position: absolute;
                top: 350px; /* Adjust this value based on your header height */
                left: 50%;
                transform: translateX(-50%);
                width: 95%;
                max-width: 800px; /* Optional: set a maximum width */
                z-index: 1002; /* Ensure it stays on top of other content */
                
            }
            .hero-section-banner { 
                margin-top: 150px; /* Space for the card to float above */
                position: absolute;
                
                top: 480px; /* Adjust this value based on your header height */
                left: 50%;
                transform: translateX(-50%);
                width: 95%;
                max-width: 1800px; /* Optional: set a maximum width */
                z-index: 1003; /* Ensure it stays on top of other content */
                
            }
            .btn-custom-find{
                display: inline-block;
                padding: 5px 18px;
                font-size: 14px;
                font-weight: 400;
                text-align: center;
                text-decoration: none;
                border-radius: 8px;
                transition: background-color 0.3s, transform 0.3s;
                cursor: pointer;
                border: 1px solid transparent;
            }
            .form-select{
                padding: 5px 18px;
                font-size: 14px;
                font-weight: 400;
            }
            .form-control{
                padding: 5px 18px;
                font-size: 14px;
                font-weight: 400;
            }
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name', 'Food Sharing') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> --}}
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="hero-section">
            <div class="hero-text">
                <h1>ยินดีต้อนรับสู่ {{ config('app.name', 'Food Sharing') }}!</h1>
                <p>ร่วมเป็นส่วนหนึ่งกับ {{ config('app.name', 'Food Sharing') }} โดยการแบ่งปันอาหารส่วนเกิน ลดขยะอาหาร และทำให้ชีวิตของผู้ที่ต้องการดีขึ้น</p>
                <a href="{{ route('register') }}" class="btn btn-primary">เริ่มต้นใช้งาน</a>
                
            </div>
        </div>
    </header>
    <div class="container-fluid">
            <!-- Hero Section with background image -->
            <div class="hero-section-from">
                <div class="search-card card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">ค้นหาสินค้าที่ยังเหลืออยู่</h5>
                        <form action="{{ route('search') }}" method="GET">
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control me-2 flex-grow-1" name="query" placeholder="ค้นหาสินค้า" value="{{ request()->input('query') }}">
                                <select class="form-select" name="sort" aria-label="Default select example" style="width: 150px;">
                                    <option value="" disabled {{ request()->input('sort') == '' ? 'selected' : '' }}>จัดเรียงตาม</option>
                                    <option value="distance" {{ request()->input('sort') == 'distance' ? 'selected' : '' }}>ระยะทาง</option>
                                    <!-- เพิ่มตัวเลือกอื่น ๆ ได้ที่นี่ -->
                                </select>
                            </div>
                            <button class="btn-custom-find mt-3" type="submit">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Hero Section with background image -->
            <div class="hero-section-banner">
                <div class="search-card card shadow-lg">
                    <div class="card-body">
                        <div class="navbar-pro">
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-apple-alt icon"></i>
                                    <span>Fruits</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-carrot icon"></i>
                                    <span>Vegetables</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-bread-slice icon"></i>
                                    <span>Bakery</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-drumstick-bite icon"></i>
                                    <span>Meat</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-fish icon"></i>
                                    <span>Seafood</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="#">
                                    <i class="fas fa-cheese icon"></i>
                                    <span>Dairy</span>
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

    </div> 
    <br><br>
    <div class="container container-product">
        @forelse ($shops as $shop)
        <div class="shop-card card mb-4">
            <div class="card-body container-product-shop">
                <h5 class="card-title">{{ $shop->name }}</h5>
                <p class="card-text">{{ $shop->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $shop->address }}</small></p>
                <hr> 
                <div class="product-grid">
                    @forelse ($shop->products as $product)
                    <div class="product-card card mb-0">
                        <div class="row no-gutters"> 
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                     {{ $product->description }} <br>
                                     ค่าเช่าต่อวัน :</strong> {{ $product->quantity }} บาท 
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No products available from this shop.</p>
                    @endforelse
                </div>
            </div>
        </div>
        @empty
        <p>No shops available.</p>
        @endforelse
    </div>
    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        //getLocation();
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Send the coordinates to the server
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }

    </script>
</body>
</html>
