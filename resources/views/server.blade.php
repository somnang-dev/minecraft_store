
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOMROTI - Gamemode Info</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=JetBrains+Mono:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* --- REUSED CSS FROM HOME PAGE --- */
        :root {
            --primary-orange: #ff6600; 
            --orange-hover: #ff8533;
            --bg-body: #1a1a1a; 
            --bg-card: #252525;
            --text-main: #ffffff;
            --text-muted: #cccccc;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        
        a {
            text-decoration: none;
        }

        /* Navbar */
        .navbar { padding: 20px 0; position: absolute; width: 100%; z-index: 100; }
        .nav-container {
            background: rgba(40, 40, 40, 0.9); backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1); padding: 8px 30px;
            border-radius: 50px; display: inline-flex; align-items: center; gap: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .navbar-brand { font-weight: 800; font-size: 1.1rem; color: white !important; letter-spacing: 0.5px; text-transform: uppercase; margin: 0; }
        .nav-link { color: #ddd !important; font-size: 0.9rem; font-weight: 600; padding: 0 !important; transition: 0.3s; }
        .nav-link:hover { color: var(--primary-orange) !important; }
        .btn-play {
            background-color: var(--primary-orange); color: white; font-weight: 700;
            font-size: 0.85rem; padding: 8px 20px; border-radius: 50px; border: none;
            transition: transform 0.2s, background 0.2s; white-space: nowrap;
        }
        .btn-play:hover { transform: scale(1.05); background-color: var(--orange-hover); }

        /* Hero (Short Version) */
        .page-header {
            height: 50vh; min-height: 400px; display: flex; align-items: center; justify-content: center;
            position: relative;
            background: linear-gradient(to bottom, rgba(40, 40, 40, 0.85), rgba(26, 26, 26, 1)), 
                        url('https://images.unsplash.com/photo-1599583724135-236357e937d3?q=80&w=1200&auto=format&fit=crop');
            background-size: cover; background-position: center; padding-top: 80px;
        }
        .header-title { font-size: 3.5rem; font-weight: 800; margin-bottom: 10px; text-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .header-desc { color: var(--text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; text-align: center; }

        /* --- NEW CSS FOR ITEM CARDS --- */
        
        .section-title {
            font-size: 1.8rem; font-weight: 800; margin-bottom: 30px;
            border-left: 5px solid var(--primary-orange); padding-left: 20px;
            display: flex; align-items: center; justify-content: space-between;
        }

        .item-card {
            background: var(--bg-card); border: 1px solid rgba(255,255,255,0.05);
            border-radius: 12px; padding: 15px; text-align: center;
            transition: 0.3s; height: 100%; position: relative; overflow: hidden;
        }
        .item-card:hover {
            transform: translateY(-5px); border-color: var(--primary-orange);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .item-img-box {
            height: 120px; background: rgba(0,0,0,0.2); border-radius: 8px;
            margin-bottom: 15px; display: flex; align-items: center; justify-content: center;
        }
        .item-img { max-height: 80%; max-width: 80%; object-fit: contain; }

        .item-name { font-weight: 700; font-size: 1rem; margin-bottom: 5px; color: white; }
        .item-price { color: var(--primary-orange); font-weight: 700; font-size: 0.9rem; }
        .item-badge {
            position: absolute; top: 10px; right: 10px; font-size: 0.7rem;
            padding: 2px 8px; border-radius: 4px; background: #333; color: #ccc;
        }

        /* Special Rank Card */
        .rank-card-wrapper {
            background: linear-gradient(45deg, #222, #333);
            border: 2px solid var(--primary-orange);
            border-radius: 20px; padding: 40px; text-align: center;
            position: relative; overflow: hidden;
        }
        .rank-glow {
            position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,102,0,0.15) 0%, transparent 70%);
            animation: rotate 10s linear infinite; pointer-events: none;
        }
        @keyframes rotate { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Grid Layouts */
        .grid-10 {
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); 
            gap: 20px;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .navbar { padding: 10px 0; }
            .nav-container { width: 95%; justify-content: space-between; padding: 10px 20px; }
            .header-title { font-size: 2.5rem; }
            .grid-10 { grid-template-columns: repeat(2, 1fr); } /* 2 columns on mobile */
        }
    </style>
</head>
<body>

    <!-- Navbar (Same as Home) -->
    <nav class="navbar d-flex justify-content-center">
        <div class="nav-container">
            <a class="navbar-brand" href="/">{{$server['name']}}</a>
            <a class="nav-link d-none d-md-block" href="/">Home</a>
            <a class="nav-link d-none d-md-block" href="#">Store</a>
            <a class="nav-link" href="#"><i class="fab fa-discord"></i></a>
            <a class="nav-link" href="#"><i class="fab fa-telegram"></i></a>
            <button class="btn-play">PLAY NOW</button>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container text-center">
            <h1 class="header-title">{{$server['name']  }} <span style="color: var(--primary-orange);">ECO</span></h1>
            <p class="header-desc">
                {{ $server['description'] }}
                <br> <span class="text-white fw-bold mt-2 d-block">Version: {{$server['version']  }} • PvE & PvP Enabled</span>
            </p>
        </div>
    </header>

    <div class="container py-5">
        <div class="mb-5">
            <div class="section-title">
                Ranks 
                <span class="fs-6 text-muted fw-normal">{{ count($ranks) }} Items Available</span>
            </div>
            <div class="grid-10">
                <!-- Query list keys crate from database -->

                @foreach ($ranks as $product)
                    <a class="item-card" href={{ route('item.detail', $product['id']) }}>
                        <div class="item-badge">{{ $product['note'] }}</div>
                        <div class="item-img-box"><img src={{ $product['icon_path'] }} class="item-img"></div>
                        <div class="item-name">{{ $product['name'] }}</div>
                        <div class="item-price">${{ $product['price'] }}</div>
                    </a>
                @endforeach
            </div>    
                
        </div>
        
        <!-- 1. RANK CARD -->

        {{-- @foreach ($ranks as $rank)
            <div class="mb-5">
                <div class="section-title">{{$rank['name']}}</div>
                <div class="rank-card-wrapper">
                    <div class="rank-glow"></div>
                    <div class="position-relative" style="z-index: 2;">
                        <img src="https://cdn-icons-png.flaticon.com/512/2583/2583344.png" width="80" class="mb-3">
                        <h2 class="fw-bold text-white">{{ $server['name'] }}</h2>
                        <p class="text-muted mb-4">{{ $rank['description'] }}</p>
                        <a href="detail.html" class="btn-play px-5 py-3 fs-5">Purchase Rank - ${{ $rank['price'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
         --}}
        

        <!-- 2. CRATE KEYS (10 Cards) -->
        <div class="mb-5">
            <div class="section-title">
                Crate Keys 
                <span class="fs-6 text-muted fw-normal">{{ count($crate_keys) }} Items Available</span>
            </div>
            <div class="grid-10">
                <!-- Query list keys crate from database -->

                @foreach ($crate_keys as $key)
                    <a class="item-card" href={{ route('item.detail', $product['id']) }}>
                        <div class="item-badge">{{ $key['note'] }}</div>
                        <div class="item-img-box"><img src={{ $key['icon_path'] }} class="item-img"></div>
                        <div class="item-name">{{ $key['name'] }}</div>
                        <div class="item-price">${{ $key['price'] }}</div>
                    </a>
                @endforeach
            </div>    
        </div>

        <!-- 3. PETS (10 Cards) -->
        <div class="mb-5">
            <div class="section-title">
                Companions & Pets
                <span class="fs-6 text-muted fw-normal">10 Pets Available</span>
            </div>
            <div class="grid-10">
                @foreach ($pets as $pet) 
                    <div class="item-card">
                    <div class="item-img-box"><img src={{ $pet['icon_path'] }} class="item-img"></div>
                    <div class="item-name">{{ $pet['name'] }}</div>
                    <div class="item-price">{{ $pet['price'] }}</div>
                </div>
                @endforeach
            </div>
        </div>


        <!-- 4. BASE / BUILDING CARD -->
        <div class="mb-5">
            <div class="section-title">Base Blueprints</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="item-card p-4 d-flex flex-column flex-md-row align-items-center text-md-start text-center">
                        <div class="me-md-5 mb-4 mb-md-0" style="flex-shrink: 0;">
                            <img src="https://i.pinimg.com/736x/88/2c/3f/882c3f68487332204c38234674797086.jpg" style="border-radius: 10px; width: 250px; height: 180px; object-fit: cover;">
                        </div>
                        <div>
                            <div class="item-badge position-static d-inline-block mb-2">Schematic</div>
                            <h3 class="text-white fw-bold">Starter Fortress Blueprint</h3>
                            <p class="text-muted">
                                Instantly spawn a protected 20x20 fortress. Includes storage room, enchantment table setup, and basic farm layout. 
                                Perfect for new players wanting safety immediately.
                            </p>
                            <div class="d-flex align-items-center gap-3 justify-content-center justify-content-md-start mt-3">
                                <span class="fs-4 fw-bold text-white">$12.99</span>
                                <button class="btn-play">Buy Schematic</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="text-center py-5 text-muted border-top border-secondary">
        <p>&copy; 2026 NOMROTI Network. All Rights Reserved.</p>
    </footer>

</body>
</html>