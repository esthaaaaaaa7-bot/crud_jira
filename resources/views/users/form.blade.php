<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($user) ? 'Edit User' : 'Register' }} | ProSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0a0a0a;
            background-image:
                radial-gradient(ellipse 55% 60% at 10% 55%, rgba(60, 90, 0, 0.55) 0%, transparent 70%),
                radial-gradient(ellipse 35% 35% at 88% 80%, rgba(50, 80, 0, 0.35) 0%, transparent 65%);
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
        }

        .register-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 18px;
            padding: 42px 40px 36px;
            width: 100%;
            max-width: 460px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.6);
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            background: #c8f135;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .register-title {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
            text-align: center;
        }

        .register-subtitle {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            margin-bottom: 28px;
        }

        .alert-error {
            width: 100%;
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #f87171;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .alert-error ul {
            margin-left: 16px;
            margin-top: 4px;
        }

        .form-group {
            width: 100%;
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            display: flex;
            align-items: center;
            color: #6b7280;
            pointer-events: none;
        }

        .input-icon svg {
            width: 16px;
            height: 16px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group select {
            width: 100%;
            padding: 12px 14px 12px 44px;
            background: #111111;
            border: 1px solid #2d2d2d;
            border-radius: 9px;
            font-size: 14px;
            color: #e5e7eb;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
        }

        .form-group select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 16px;
            padding-right: 40px;
        }

        .form-group select option {
            background: #1a1a1a;
            color: #e5e7eb;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus,
        .form-group select:focus {
            border-color: #c8f135;
        }

        .form-group input::placeholder {
            color: #4b5563;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            display: flex;
            align-items: center;
            color: #6b7280;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .toggle-password svg {
            width: 17px;
            height: 17px;
        }

        .toggle-password:hover {
            color: #9ca3af;
        }

        .form-hint {
            font-size: 11px;
            color: #4b5563;
            margin-top: 5px;
            display: block;
        }

        .form-actions {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            background: #c8f135;
            color: #0a0a0a;
            border: none;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-submit:hover {
            background: #d4f542;
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        .signin-text {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
        }

        .signin-link {
            color: #c8f135;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
            transition: opacity 0.2s;
        }

        .signin-link:hover {
            opacity: 0.75;
        }

        /* Jika ini halaman Edit (ada navbar) */
        .back-link {
            position: fixed;
            top: 20px;
            left: 24px;
            font-size: 13px;
            color: #6b7280;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #9ca3af;
        }

        .back-link svg {
            width: 14px;
            height: 14px;
        }

        .edit-badge {
            display: inline-block;
            background: rgba(200, 241, 53, 0.15);
            border: 1px solid rgba(200, 241, 53, 0.3);
            color: #c8f135;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>

    {{-- Tombol Back ke daftar users (hanya saat Edit) --}}
    @if(isset($user))
        <a href="{{ url('/users') }}" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Users
        </a>
    @endif

    <div class="register-card">

        {{-- Logo --}}
        <div class="logo-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
            </svg>
        </div>

        <div class="brand-name">PROSITE</div>

        @if(isset($user))
            <span class="edit-badge">Edit Mode</span>
            <h1 class="register-title">Edit Akun</h1>
            <p class="register-subtitle">Perbarui data pengguna di bawah ini</p>
        @else
            <h1 class="register-title">Create Account</h1>
            <p class="register-subtitle">Register to start managing your projects</p>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="alert-error">
                <strong>Oops! Ada kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($user) ? url('/users/'.$user->id) : url('/users') }}" method="POST" style="width:100%">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            {{-- Nama Lengkap --}}
            <div class="form-group">
                <label for="name">NAMA LENGKAP</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name ?? '') }}"
                        required
                        placeholder="Contoh: Budi Santoso"
                        autofocus>
                </div>
            </div>

            {{-- Username --}}
            <div class="form-group">
                <label for="username">USERNAME</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username', $user->username ?? '') }}"
                        required
                        placeholder="Contoh: budi123">
                </div>
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="inputPass">PASSWORD</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </span>
                    <input
                        type="password"
                        id="inputPass"
                        name="password"
                        {{ isset($user) ? '' : 'required' }}
                        placeholder="{{ isset($user) ? 'Kosongkan jika tidak ingin diubah' : 'Minimal 6 karakter' }}">
                    <button type="button" class="toggle-password" id="togglePassword" aria-label="Toggle password visibility">
                        <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
                @if(isset($user))
                    <span class="form-hint">*Kosongkan jika tidak ingin mengubah password.</span>
                @endif
            </div>


            {{-- Tombol Aksi --}}
            <div class="form-actions">
                <button type="submit" class="btn-submit" id="submitBtn">
                    {{ isset($user) ? 'Simpan Perubahan' : 'Sign Up' }}
                </button>
            </div>

        </form>

        {{-- Link kembali ke Login (hanya pada mode Register) --}}
        @if(!isset($user))
            <p class="signin-text" style="margin-top: 20px;">
                Already have an account? <a href="{{ url('/login') }}" class="signin-link">Sign In</a>
            </p>
        @endif

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('inputPass');
        const eyeIcon = document.getElementById('eyeIcon');

        const eyeOpenPath = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        const eyeClosedPath = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';

        togglePassword.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.innerHTML = isPassword ? eyeClosedPath : eyeOpenPath;
        });
    </script>

</body>

</html>
