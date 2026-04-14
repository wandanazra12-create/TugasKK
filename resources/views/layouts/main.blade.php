<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pustaka Huruf' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f5f5f5; color: #333; }
        
        header { background: white; border-bottom: 1px solid #ddd; padding: 20px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        header .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 24px; font-weight: 600; color: #333; }
        header a { color: #007bff; text-decoration: none; }
        header a:hover { color: #0056b3; }
        
        main { max-width: 1200px; margin: 0 auto; padding: 30px 20px; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; border-left: 4px solid; }
        .alert-success { background-color: #d4edda; color: #155724; border-color: #28a745; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        
        .card { background: white; border: 1px solid #ddd; border-radius: 4px; padding: 20px; margin-bottom: 20px; }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .card-header h2 { font-size: 18px; font-weight: 600; }
        
        .btn { display: inline-block; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; text-decoration: none; transition: all 0.3s; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-success:hover { background-color: #218838; }
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-warning:hover { background-color: #e0a800; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-danger:hover { background-color: #c82333; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }
        
        table { width: 100%; border-collapse: collapse; background: white; }
        th { background-color: #f9f9f9; padding: 12px; text-align: left; font-weight: 600; border-bottom: 2px solid #ddd; color: #666; font-size: 13px; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:hover { background-color: #f9f9f9; }
        
        .pagination { display: flex; justify-content: center; gap: 5px; margin-top: 20px; }
        .pagination a, .pagination span { padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; }
        .pagination a { color: #007bff; text-decoration: none; }
        .pagination a:hover { background-color: #f9f9f9; }
        .pagination .active { background-color: #007bff; color: white; border-color: #007bff; }
        
        footer { background: white; border-top: 1px solid #ddd; padding: 20px 0; margin-top: 40px; text-align: center; color: #999; font-size: 12px; }
        
        .badge { display: inline-block; padding: 4px 8px; border-radius: 3px; font-size: 12px; font-weight: 600; background-color: #e9ecef; color: #495057; }
        .badge-primary { background-color: #cfe2ff; color: #084298; }
        .badge-success { background-color: #d1e7dd; color: #0f5132; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><i class="fas fa-book"></i> Pustaka Huruf</h1>
            <div>
                <span>Admin Dashboard</span>
            </div>
        </div>
    </header>

    <main>
        @if(session('success'))
            <div class="alert alert-success">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <strong>Gagal!</strong> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} SMKN 4 Bandung | Portal Pembelajaran Huruf</p>
    </footer>
</body>
</html>
