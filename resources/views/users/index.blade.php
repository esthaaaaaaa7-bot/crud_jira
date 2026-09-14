<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Users | TDL</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; }
        .navbar { background: #4a90d9; color: #fff; padding: 14px 24px; display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { display: flex; align-items: center; gap: 24px; }
        .navbar-brand h3 { font-size: 18px; margin: 0; }
        .nav-links { display: flex; gap: 16px; }
        .nav-links a { color: rgba(255,255,255,0.8); text-decoration: none; font-size: 14px; font-weight: 500; }
        .nav-links a:hover, .nav-links a.active { color: #fff; }
        .navbar .user-info { display: flex; align-items: center; gap: 16px; font-size: 14px; }
        .btn-logout { background: rgba(255,255,255,0.2); color: #fff; border: 1px solid rgba(255,255,255,0.4); padding: 6px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; text-decoration: none; }
        .btn-logout:hover { background: rgba(255,255,255,0.3); }

        .content { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .card { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .card-header h2 { color: #333; font-size: 20px; }
        
        .btn-primary { background: #4a90d9; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary:hover { background: #3a7bc8; }
        .btn-danger { background: #e74c3c; color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; border: none; cursor: pointer; }
        .btn-danger:hover { background: #c0392b; }
        .btn-warning { background: #f39c12; color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; border: none; cursor: pointer; }
        .btn-warning:hover { background: #d68910; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-size: 14px; }
        th { background-color: #f8f9fa; font-weight: 600; color: #555; }
        tr:hover { background-color: #f5f5f5; }
        
        .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb; font-size: 14px; }
        .alert-error { background: #ffe0e0; color: #c00; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #ffb3b3; font-size: 14px; }
        
        .badge { background: #e1ecf4; color: #39739d; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; border: 1px solid #c9e1f2;}
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <h3>ProSite - Dashboard</h3>
            <div class="nav-links">
                <a href="{{ url('/users') }}" class="active">Kelola Users</a>
            </div>
        </div>
        <div class="user-info">
            <span>Halo, {{ session('user')->name ?? session('user')->nama }}</span>
            <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Data Users</h2>
                <a href="{{ url('/users/create') }}" class="btn-primary">+ Tambah User</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name ?? $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn-warning">Edit</a>
                                @if($user->id != session('user')->id)
                                <form action="{{ url('/users/'.$user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
