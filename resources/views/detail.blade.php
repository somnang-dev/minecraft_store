<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - NOMROTI</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=JetBrains+Mono:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-orange: #ff6600; 
            --orange-hover: #ff8533;
            --bg-body: #1a1a1a; 
            --bg-card: #252525;
            --bg-darker: #121212;
            --text-main: #ffffff;
            --text-muted: #cccccc;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar { padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.05); background: var(--bg-darker); }
        .navbar-brand { font-weight: 800; font-size: 1.2rem; color: white !important; letter-spacing: 0.5px; }

        /* Main Container */
        .product-container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }

        /* --- LEFT COL: GALLERY --- */
        .gallery-main {
            width: 100%; height: 400px; 
            background: var(--bg-darker); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center; margin-bottom: 15px;
            overflow: hidden;
        }
        .gallery-main img { width: 100%; height: 100%; object-fit: contain; padding: 20px; transition: transform 0.3s ease; }
        .gallery-main:hover img { transform: scale(1.05); }

        .thumbnails { display: flex; gap: 10px; overflow-x: auto; padding-bottom: 10px; }
        .thumb {
            width: 80px; height: 80px; background: var(--bg-darker);
            border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            opacity: 0.6; transition: 0.2s; flex-shrink: 0;
        }
        .thumb:hover, .thumb.active { opacity: 1; border-color: var(--primary-orange); }
        .thumb img { width: 70%; height: 70%; object-fit: contain; }

        /* --- RIGHT COL: INFO & PAYMENT --- */
        .product-info { padding-left: 20px; }
        
        .product-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; }
        .product-price { font-size: 2rem; color: var(--primary-orange); font-weight: 700; margin-bottom: 20px; font-family: 'JetBrains Mono', monospace; display: flex; gap: 10px }
        
        .product-desc { color: var(--text-muted); line-height: 1.6; margin-bottom: 30px; font-size: 0.95rem; }

        .checkout-box {
            background: var(--bg-card); border: 1px solid rgba(255,255,255,0.05);
            border-radius: 15px; padding: 30px; margin-top: 30px;
        }
        .checkout-header { font-size: 1.2rem; font-weight: 700; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; margin-bottom: 20px; }

        /* Form Elements */
        .form-control::placeholder {
            color: white;
        }
        .form-control, .form-select {
            background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 12px;
        }
        .form-control:focus {
            background: rgba(0,0,0,0.4); border-color: var(--primary-orange); color: white; box-shadow: none;
        }

        .platform-option {
            border: 1px solid rgba(255,255,255,0.1); padding: 12px; border-radius: 8px; 
            cursor: pointer; text-align: center; transition: 0.2s; background: rgba(255,255,255,0.02);
        }
        .platform-option:hover { background: rgba(255,255,255,0.05); }
        .platform-option.active { border-color: var(--primary-orange); background: rgba(255, 102, 0, 0.1); color: white; }

        .btn-pay {
            background-color: var(--primary-orange); color: white; font-weight: 800;
            padding: 15px; border-radius: 8px; border: none; width: 100%;
            transition: 0.2s; text-transform: uppercase; font-size: 1.1rem;
        }
        .btn-pay:hover { background-color: var(--orange-hover); }

        .qr-area {
            background: white; width: 140px; height: 140px; margin: 0 auto 15px;
            display: flex; align-items: center; justify-content: center; border-radius: 8px;
        }

        @media (max-width: 991px) {
            .product-info { padding-left: 0; margin-top: 30px; }
            .gallery-main { height: 300px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="/server/{{ $product['server_id'] }}">
                <i class="fas fa-chevron-left me-2 text-muted"></i> Back to Catalog
            </a>
            <span class="text-white fw-bold">NOMROTI STORE</span>
        </div>
    </nav>

    <div class="product-container">
        <div class="row">
            
            <!-- LEFT: Image Gallery -->
            <div class="col-lg-6">
                <div class="gallery-main">
                    <img id="mainImg" src={{ $product['icon_path'] }} alt="Main Product Image">
                </div>
                <!-- Thumbnails (3-5+ images) -->

                <div class="thumbnails" id="thumbContainer">
                    {{-- @foreach ($images as $img)
                        <div class='active'>
                            <img src={{ $img['image_path'] }} alt={{ $product['name'] }} alt='hello' height='%'>
                        </div>
                        
                    @endforeach --}}
                    
                    <!-- Javascript will populate this based on the main image to simulate a gallery -->
                </div>
            </div>

            <!-- RIGHT: Details & Checkout Form -->
            <div class="col-lg-6 product-info">
                <h1 class="product-title" id="pTitle">{{ $product['name']}}</h1>
                <div class="product-price"><div id='pPrice'>${{ $product['price']}}</div><div id="dPrice"></div> </div>
                
                <div class="product-desc">
                    <p>{{ $product['long_description']}}</p>
                    <ul class="text-muted small">
                        <li><i class="fas fa-check text-success me-2"></i> Instant Delivery</li>
                        <li><i class="fas fa-check text-success me-2"></i> Works on all realms</li>
                        <li><i class="fas fa-check text-success me-2"></i> 24/7 Support</li>
                    </ul>
                </div>

                <!-- INTEGRATED CHECKOUT FORM -->
                <div class="checkout-box">
                    <div class="checkout-header">
                        <i class="fas fa-shopping-cart me-2 text-warning"></i> Secure Checkout
                    </div>

                    <form onsubmit="event.preventDefault(); alert('Receipt Submitted! Please allow 10-15 minutes for processing.');">
                        <!-- 1. Player Info -->
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label class="form-label text-muted small">Minecraft Username</label>
                                <input type="text" class="form-control" placeholder="Enter your in-game name" required>
                            </div>
                        </div>

                        <!-- 2. Platform -->
                        <div class="mb-4">
                            <label class="form-label text-muted small">Platform</label>
                            <div class="d-flex gap-2">
                                <div class="platform-option flex-fill active" onclick="selectPlatform(this)">
                                    <i class="fab fa-java mb-1"></i> Java
                                </div>
                                <div class="platform-option flex-fill" onclick="selectPlatform(this)">
                                    <i class="fas fa-gamepad mb-1"></i> Bedrock
                                </div>
                                <div class="platform-option flex-fill" onclick="selectPlatform(this)">
                                    <i class="fas fa-mobile-alt mb-1"></i> Pocket
                                </div>
                            </div>
                        </div>
                        
                        <!-- 3. Promo Code (NEW FEATURE) -->
                        <div class="mb-4">
                            <label class="form-label text-muted small">Promo Code</label>
                            <div class="input-group">
                                <input type="text" id="promoInput" class="form-control" placeholder="Enter code (e.g. NOMROTI)">
                                <button type="button" class="btn btn-outline-warning" onclick="applyPromo()">Apply</button>
                            </div>
                            <div id="promoMessage" class="small mt-1"></div>
                        </div>

                        <!-- 4. Payment Method Display -->
                        <div class="bg-dark bg-opacity-50 p-3 rounded mb-4 text-center border border-secondary border-opacity-25">
                            <label class="small text-muted mb-2 d-block">Scan to Pay</label>
                            <div class="qr-area">
                                <i class="fas fa-qrcode fa-3x text-dark"></i>
                            </div>
                            <div class="small text-warning">Total: <span id="payAmount" class="fw-bold">$0.00</span></div>
                        </div>

                        <!-- 5. Upload Receipt -->
                        <div class="mb-4">
                            <label class="form-label text-muted small">Upload Receipt</label>
                            <input type="file" class="form-control" accept="image/*" required>
                            <div class="form-text text-muted" style="font-size: 0.8rem;">Attach a screenshot of your payment.</div>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn-pay shadow">
                            Submit Payment
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts to Simulate Dynamic Content -->
    <script>
        // 1. Get URL Params
        const params = new URLSearchParams(window.location.search);
        const name = params.get('name') || 'Mystery Item';
        let basePrice = parseFloat(params.get('price')) || 0.00;
        let finalPrice = basePrice;
        const mainImgSrc = params.get('img') || @json($product['icon_path']);
        const elementPrice = document.getElementById('pPrice');
        // 2. Populate Data
       

        // 3. Generate Thumbnails (Simulating Gallery)
        const thumbContainer = document.getElementById('thumbContainer');
        // Add main image as first thumb
        createThumb(mainImgSrc, true);
        // Add dummy variant images
        @foreach ($images as $img)
        {{$img['image_path']  }}
            createThumb(@json($img['image_path']), false);
        @endforeach

        function createThumb(src, isActive) {
            const div = document.createElement('div');
            div.className = `thumb ${isActive ? 'active' : ''}`;
            div.innerHTML = `<img src="${src}">`;
            div.onclick = function() {
                document.getElementById('mainImg').src = src;
                document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
                div.classList.add('active');
            };
            thumbContainer.appendChild(div);
        }

        function selectPlatform(el) {
            document.querySelectorAll('.platform-option').forEach(p => p.classList.remove('active'));
            el.classList.add('active');
        }

        // --- PROMO CODE LOGIC ---
        let isDiscountApplied = false;

        function applyPromo() {
            const input = document.getElementById('promoInput').value.trim();
            const msg = document.getElementById('promoMessage');

            // Prevent double dipping
            if (isDiscountApplied) {
                msg.className = 'small mt-1 text-warning';
                msg.innerText = 'Discount already applied.';
                return;
            }
            
            // Checking for promocode
            console.log(input)
            fetch("{{ route('promo.apply') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    code: input
                })
            }).then(async(res) => {
                if (res.status === 404) {
                    console.log('product not found')
                    msg.style.color = 'red'
                    msg.innerText = 'Invalid promo code. Please try again.'
                    return;
                }
                const result = await res.json();
                elementPrice.style.textDecorationLine = 'line-through'
                document.getElementById('dPrice').innerText =  `$${parseFloat(parseFloat({{$product['price']}}) - parseFloat(result['data']['discount_price'])).toFixed(2)}`
                document.getElementById('payAmount').innerText = `$${parseFloat(parseFloat({{$product['price']}}) - parseFloat(result['data']['discount_price'])).toFixed(2)}`
                msg.innerText = 'Promo code applied'
                msg.style.color = '#14ff43ad'
            })
        
        }
    </script>

</body>
</html>