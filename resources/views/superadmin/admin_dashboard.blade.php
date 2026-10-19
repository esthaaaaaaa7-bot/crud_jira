<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ItensFlow - Super Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}?v={{ filemtime(public_path('css/theme.css')) }}">
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.add('light');
        } else {
            document.documentElement.classList.remove('light');
        }
    </script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }


        .bg-gradient-glow {
            background-color: #000000;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 50% 50%, rgba(199, 255, 61, 0.15) 0%, transparent 60%);
        }

        .custom-scroll::-webkit-scrollbar {
            height: 7px;
            width: 8px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: #1a1a1a;
            border-radius: 10px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #c7ff3d;
            border-radius: 10px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #a8d930;
        }

        .flatpickr-calendar {
            background: #151515 !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5) !important;
        }

        .flatpickr-day.selected {
            background: #C7FF3D !important;
            border-color: #C7FF3D !important;
            color: #000 !important;
        }

        .flatpickr-day:hover {
            background: rgba(199, 255, 61, 0.2) !important;
        }

        .flatpickr-months,
        .flatpickr-weekdays,
        .flatpickr-day {
            color: white !important;
        }

        .flatpickr-day.today {
            border-color: #C7FF3D !important;
        }
    </style>


</head>

<body class="flex h-screen overflow-hidden bg-[#080808] font-sans">

    <div id="sidebar-backdrop"
        class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm"
        onclick="toggleSidebar()">
    </div>

    <aside id="sidebar" class="fixed lg:relative inset-y-0 left-0 z-50 w-[200px] md:w-56 bg-[#080808] text-white flex flex-col p-5 shadow-lg 
              border-r border-white/10 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <div class="flex items-center gap-3 mx-4 px-0 md:px-4 pb-4 mb-4 mt-0 border-b border-white/30">

            <div class="w-8 h-8 rounded-[9px] flex items-center justify-center shrink-0">
                <img src="{{ asset('images/logo_itenas.png') }}" alt="ProSite Logo" class="w-8 h-8 rounded-[9px]">
            </div>


            <h2 class="text-md font-bold text-white tracking-wide">
                ItensFlow
            </h2>
        </div>

        @php
            $isDashboard = request()->is('admin/dashboard*');
            $isUserManagement = request()->is('user/management*');
            $isRoles = request()->is('admin/roles*');
            $isPermissions = request()->is('admin/permissions*');
            $isAccessControl = $isUserManagement || $isRoles || $isPermissions;
        @endphp

        <ul class="space-y-1 flex-1 mt-1">

            <li>
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg transition duration-200 {{ $isDashboard ? 'active-nav bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white hover:border-[#2a2a2a] border border-transparent' }}">
                    <i class="fa-solid fa-chart-line text-sm w-5 text-center {{ $isDashboard ? 'text-white' : 'text-gray-400' }}"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <button onclick="toggleAccessControl()" id="accessControlBtn"
                    class="w-full flex items-center justify-between gap-3 py-2 px-4 rounded-lg transition duration-200 mt-1 {{ $isAccessControl ? 'text-white bg-[#1a1a1a]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-shield-halved text-sm w-5 text-center"></i>
                        <span class="text-sm">Access Control</span>
                    </div>
                    <i id="accessControlChevron" class="fa-solid fa-chevron-right text-[10px] transition-transform duration-200 {{ $isAccessControl ? 'rotate-90' : '' }}"></i>
                </button>

                <!-- Dropdown Submenu -->
                <ul id="accessControlMenu" class="{{ $isAccessControl ? '' : 'hidden' }} overflow-hidden mt-1 ml-4 pl-3 border-l border-white/10 space-y-0.5">
                    <li>
                        <a href="{{ url('/user/management') }}"
                            class="flex items-center gap-2.5 py-2 px-3 rounded-lg transition duration-200 text-sm {{ $isUserManagement ? 'active-nav bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white hover:border-[#2a2a2a] border border-transparent' }}">
                            <i class="fa-solid fa-users text-xs w-4 text-center"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/roles') }}"
                            class="flex items-center gap-2.5 py-2 px-3 rounded-lg transition duration-200 text-sm {{ $isRoles ? 'active-nav bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white hover:border-[#2a2a2a] border border-transparent' }}">
                            <i class="fa-solid fa-user-tag text-xs w-4 text-center"></i>
                            <span>Role Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/permissions') }}"
                            class="flex items-center gap-2.5 py-2 px-3 rounded-lg transition duration-200 text-sm {{ $isPermissions ? 'active-nav bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a]' : 'text-gray-400 hover:bg-[#1a1a1a] hover:text-white hover:border-[#2a2a2a] border border-transparent' }}">
                            <i class="fa-solid fa-key text-xs w-4 text-center"></i>
                            <span>Permission</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>

    <main class="flex-1 p-8 pt-0 overflow-y-auto custom-scroll bg-gradient-glow">

        <header class="flex items-center justify-between py-3 sm:py-4 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">

            <div class="flex flex-1 items-center gap-6 sm:gap-2">

                <button onclick="toggleSidebar()" 
                    class="lg:hidden w-8 h-8 -ml-3 flex items-center justify-center rounded-xl 
                   bg-[#151515] border border-white/10 text-gray-400 
                   hover:text-white hover:bg-[#1a1a1a] transition">
                    <i class="fa-solid fa-bars text-xs"></i>
                </button>

                <div class="relative w-full max-w-[150px] md:max-w-[280px] lg:max-w-xs xl:max-w-sm -ml-4 sm:-ml-0">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-xs"></i>
                    <input type="text" placeholder="Search anything, tasks, issues..."
                        class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 
                                rounded-xl pl-9  pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
                </div>

            </div>


            <div class="flex items-center -mr-4 gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-bell text-sm"></i>
                </button>
                <button onclick="toggleTheme()" class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i id="theme-icon" class="fa-regular fa-sun text-sm"></i>
                </button>
                <!-- User Profile Dropdown -->
                <div class="relative" id="profileDropdownContainer">
                    <button id="profileDropdownBtn" onclick="toggleProfileDropdown(event)" type="button" class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition cursor-pointer">
                        <i class="fa-regular fa-user text-sm"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdownMenu" class="hidden absolute right-0 mt-2 w-56 bg-[#151515] border border-white/10 rounded-2xl shadow-2xl p-2 z-50 transition-all">
                        <!-- User Info -->
                        <div class="px-3 py-2.5 border-b border-white/10">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] font-bold text-xs uppercase shrink-0">
                                    {{ strtoupper(substr(session('user')?->name ?? session('user')?->username ?? 'U', 0, 1)) }}
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-xs font-semibold text-white truncate">{{ session('user')?->name ?? 'Developer' }}</p>
                                    <p class="text-[11px] text-gray-400 truncate">{{ '@' . (session('user')?->username ?? 'developer') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Links -->
                        <div class="py-1 space-y-0.5">
                            <a href="{{ url('/setting') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-gray-300 hover:text-white hover:bg-white/5 transition">
                                <i class="fa-solid fa-gear text-xs text-gray-400 w-4 text-center"></i>
                                <span>Settings</span>
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="pt-1 border-t border-white/10">
                            <a href="{{ url('/logout') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-red-400 hover:text-red-300 hover:bg-red-500/10 transition">
                                <i class="fa-solid fa-arrow-right-from-bracket text-xs w-4 text-center"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </header>

        <!-- Content -->
        <div class="space-y-8">
            <!-- Welcome Banner & Page Title -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Super Admin Dashboard</h1>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C7FF3D] animate-pulse"></span>
                            Live Console
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-400">Ringkasan statistik pengguna, proyek, dan kontrol sistem ItensFlow.</p>
                </div>

                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-[#151515] border border-white/10 text-xs text-gray-400">
                        <i class="fa-regular fa-calendar text-[#C7FF3D]"></i>
                        <span>{{ date('d M Y') }}</span>
                    </span>
                    <a href="{{ url('/user/management') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        <i class="fa-solid fa-user-plus text-xs"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </div>
            </div>

            <!-- Main Statistics Cards (Total User & Total Project) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Card 1: Total User -->
                <div class="relative overflow-hidden bg-[#151515] border border-white/10 rounded-2xl p-6 hover:border-[#C7FF3D]/50 transition duration-300 group">
                    <!-- Subtle Glow Effect -->
                    <div class="absolute -top-12 -right-12 w-36 h-36 bg-[#C7FF3D]/10 rounded-full blur-3xl group-hover:bg-[#C7FF3D]/20 transition duration-500 pointer-events-none"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Header Row -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C7FF3D]"></span>
                                    <h3 class="text-xs font-bold text-gray-300 uppercase tracking-wider">Total Users</h3>
                                </div>
                                <div class="w-11 h-11 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D] group-hover:scale-110 group-hover:bg-[#C7FF3D] group-hover:text-black transition-all duration-300">
                                    <i class="fa-solid fa-users text-lg"></i>
                                </div>
                            </div>

                            <!-- Value & Metric -->
                            <div class="flex items-baseline gap-3 mb-2">
                                <h2 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">128</h2>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 border border-[#C7FF3D]/20 px-2 py-0.5 rounded-lg">
                                    <i class="fa-solid fa-arrow-trend-up text-[10px]"></i> +12%
                                </span>
                            </div>
                            <p class="text-xs text-gray-400">Total akun pengguna terdaftar pada sistem</p>
                        </div>

                        <!-- Footer Details -->
                        <div class="pt-5 mt-6 border-t border-white/5 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-4 text-gray-400">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-solid fa-shield-halved text-[10px] text-[#C7FF3D]"></i> 4 Admin
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-user text-[10px] text-gray-400"></i> 124 Member
                                </span>
                            </div>
                            <a href="{{ url('/user/management') }}" class="text-[#C7FF3D] hover:underline flex items-center gap-1 font-semibold text-xs group-hover:translate-x-0.5 transition-transform">
                                <span>Detail User</span>
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Project -->
                <div class="relative overflow-hidden bg-[#151515] border border-white/10 rounded-2xl p-6 hover:border-[#C7FF3D]/50 transition duration-300 group">
                    <!-- Subtle Glow Effect -->
                    <div class="absolute -top-12 -right-12 w-36 h-36 bg-[#C7FF3D]/10 rounded-full blur-3xl group-hover:bg-[#C7FF3D]/20 transition duration-500 pointer-events-none"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Header Row -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C7FF3D]"></span>
                                    <h3 class="text-xs font-bold text-gray-300 uppercase tracking-wider">Total Projects</h3>
                                </div>
                                <div class="w-11 h-11 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D] group-hover:scale-110 group-hover:bg-[#C7FF3D] group-hover:text-black transition-all duration-300">
                                    <i class="fa-solid fa-folder-tree text-lg"></i>
                                </div>
                            </div>

                            <!-- Value & Metric -->
                            <div class="flex items-baseline gap-3 mb-2">
                                <h2 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">24</h2>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 border border-[#C7FF3D]/20 px-2 py-0.5 rounded-lg">
                                    <i class="fa-solid fa-arrow-trend-up text-[10px]"></i> +4 Baru
                                </span>
                            </div>
                            <p class="text-xs text-gray-400">Total seluruh proyek aktif & terselesaikan</p>
                        </div>

                        <!-- Footer Details -->
                        <div class="pt-5 mt-6 border-t border-white/5 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-4 text-gray-400">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-solid fa-spinner text-[10px] text-[#C7FF3D]"></i> 18 Berjalan
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-circle-check text-[10px] text-gray-400"></i> 6 Selesai
                                </span>
                            </div>
                            <a href="{{ url('/projects') }}" class="text-[#C7FF3D] hover:underline flex items-center gap-1 font-semibold text-xs group-hover:translate-x-0.5 transition-transform">
                                <span>Lihat Proyek</span>
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Additional Overview Sections (Mock UI) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pb-8">

                <!-- Quick Actions / Shortcuts -->
                <div class="bg-[#151515] border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-bolt text-[#C7FF3D]"></i> Quick Management
                        </h3>
                    </div>
                    <div class="space-y-2.5">
                        <a href="{{ url('/user/management') }}" class="flex items-center justify-between p-3 rounded-xl bg-[#1a1a1a] hover:bg-[#202020] border border-white/5 hover:border-[#C7FF3D]/30 transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#C7FF3D]/10 text-[#C7FF3D] flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-user-gear"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-white group-hover:text-[#C7FF3D] transition">User Management</p>
                                    <p class="text-[11px] text-gray-400">Tambah, edit & nonaktifkan user</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-500 group-hover:text-white transition"></i>
                        </a>

                        <a href="{{ url('/admin/roles') }}" class="flex items-center justify-between p-3 rounded-xl bg-[#1a1a1a] hover:bg-[#202020] border border-white/5 hover:border-[#C7FF3D]/30 transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#C7FF3D]/10 text-[#C7FF3D] flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-white group-hover:text-[#C7FF3D] transition">Role Management</p>
                                    <p class="text-[11px] text-gray-400">Atur hak akses & tingkatan role</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-500 group-hover:text-white transition"></i>
                        </a>

                        <a href="{{ url('/projects') }}" class="flex items-center justify-between p-3 rounded-xl bg-[#1a1a1a] hover:bg-[#202020] border border-white/5 hover:border-[#C7FF3D]/30 transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#C7FF3D]/10 text-[#C7FF3D] flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-folder-plus"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-white group-hover:text-[#C7FF3D] transition">Project Workspace</p>
                                    <p class="text-[11px] text-gray-400">Kelola dan pantau seluruh proyek</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-500 group-hover:text-white transition"></i>
                        </a>
                    </div>
                </div>

                <!-- Recent Projects Overview (Mock UI) -->
                <div class="lg:col-span-2 bg-[#151515] border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-diagram-project text-[#C7FF3D]"></i> Project Overview
                            </h3>
                            <p class="text-xs text-gray-400 mt-0.5">Daftar proyek terbaru dalam sistem</p>
                        </div>
                        <a href="{{ url('/projects') }}" class="text-xs text-[#C7FF3D] hover:underline font-medium">Lihat Semua</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-[11px] font-bold text-gray-400 uppercase border-b border-white/10 pb-2">
                                    <th class="pb-3 font-semibold">Nama Proyek</th>
                                    <th class="pb-3 font-semibold">Status</th>
                                    <th class="pb-3 font-semibold">Tim Member</th>
                                    <th class="pb-3 font-semibold text-right">Progress</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-xs">
                                <tr>
                                    <td class="py-3">
                                        <div class="font-semibold text-white">Redesign Website Itenas</div>
                                        <div class="text-[11px] text-gray-400">Web Development</div>
                                    </td>
                                    <td class="py-3">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">In Progress</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="flex -space-x-1.5">
                                            <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center text-[9px] text-white font-bold">B</div>
                                            <div class="w-6 h-6 rounded-full bg-[#3a3a3a] border border-white/20 flex items-center justify-center text-[9px] text-[#C7FF3D] font-bold">S</div>
                                            <div class="w-6 h-6 rounded-full bg-[#1a1a1a] border border-white/20 flex items-center justify-center text-[9px] text-gray-400">+3</div>
                                        </div>
                                    </td>
                                    <td class="py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <div class="w-16 bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 70%"></div>
                                            </div>
                                            <span class="text-[11px] font-medium text-gray-300">70%</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <div class="font-semibold text-white">Mobile Apps Kampus</div>
                                        <div class="text-[11px] text-gray-400">Mobile Development</div>
                                    </td>
                                    <td class="py-3">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">Review</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="flex -space-x-1.5">
                                            <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center text-[9px] text-white font-bold">A</div>
                                            <div class="w-6 h-6 rounded-full bg-[#3a3a3a] border border-white/20 flex items-center justify-center text-[9px] text-[#C7FF3D] font-bold">R</div>
                                        </div>
                                    </td>
                                    <td class="py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <div class="w-16 bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 85%"></div>
                                            </div>
                                            <span class="text-[11px] font-medium text-gray-300">85%</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <div class="font-semibold text-white">Sistem Informasi Akademik</div>
                                        <div class="text-[11px] text-gray-400">Backend Integration</div>
                                    </td>
                                    <td class="py-3">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">Completed</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="flex -space-x-1.5">
                                            <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center text-[9px] text-white font-bold">D</div>
                                            <div class="w-6 h-6 rounded-full bg-[#3a3a3a] border border-white/20 flex items-center justify-center text-[9px] text-gray-400">+4</div>
                                        </div>
                                    </td>
                                    <td class="py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <div class="w-16 bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 100%"></div>
                                            </div>
                                            <span class="text-[11px] font-medium text-[#C7FF3D]">100%</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <script>
        /* ── Theme ── */
        function toggleTheme() {
            const isLight = document.documentElement.classList.toggle('light');
            localStorage.setItem('theme', isLight ? 'light' : 'dark');
            const icon = document.getElementById('theme-icon');
            if (icon) icon.className = isLight ? 'fa-regular fa-moon text-sm' : 'fa-regular fa-sun text-sm';
        }
        (function() {
            const icon = document.getElementById('theme-icon');
            if (icon && localStorage.getItem('theme') === 'light') icon.className = 'fa-regular fa-moon text-sm';
        })();

        /* ── Sidebar ── */
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        /* ── Profile Dropdown ── */
        function toggleProfileDropdown(event) {
            if (event) event.stopPropagation();
            const menu = document.getElementById('profileDropdownMenu');
            if (menu) menu.classList.toggle('hidden');
        }
        window.addEventListener('click', function(e) {
            const container = document.getElementById('profileDropdownContainer');
            if (container && !container.contains(e.target)) {
                const menu = document.getElementById('profileDropdownMenu');
                if (menu) menu.classList.add('hidden');
            }
        });

        /* ── Access Control Dropdown ── */
        function toggleAccessControl() {
            const menu = document.getElementById('accessControlMenu');
            const chevron = document.getElementById('accessControlChevron');
            const btn = document.getElementById('accessControlBtn');

            const isOpen = !menu.classList.contains('hidden');

            if (isOpen) {
                menu.classList.add('hidden');
                chevron.style.transform = 'rotate(0deg)';
                btn.classList.remove('text-white', 'bg-[#1a1a1a]');
                btn.classList.add('text-gray-400');
            } else {
                menu.classList.remove('hidden');
                chevron.style.transform = 'rotate(90deg)';
                btn.classList.remove('text-gray-400');
                btn.classList.add('text-white', 'bg-[#1a1a1a]');
            }
        }

        /* ── Auto-open Access Control jika halaman saat ini ada di dalam dropdown ── */
        (function() {
            const dropdownPaths = ['/user/management', '/admin/roles', '/admin/permissions'];
            const currentPath = window.location.pathname;
            const isInsideDropdown = dropdownPaths.some(p => currentPath.startsWith(p));
            if (isInsideDropdown) {
                const menu = document.getElementById('accessControlMenu');
                const chevron = document.getElementById('accessControlChevron');
                const btn = document.getElementById('accessControlBtn');
                if (menu) menu.classList.remove('hidden');
                if (chevron) chevron.style.transform = 'rotate(90deg)';
                if (btn) {
                    btn.classList.remove('text-gray-400');
                    btn.classList.add('text-white', 'bg-[#1a1a1a]');
                }
            }
        })();
    </script>

</body>
</html>
