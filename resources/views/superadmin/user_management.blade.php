<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ItensFlow - User Management</title>
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

<body class="flex h-screen overflow-hidden bg-gradient-glow font-sans">

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
                    <input type="text" id="headerSearchInput" oninput="filterUsers()" placeholder="Search anything, users, tasks..."
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
        <div class="space-y-6 pb-10">

            <!-- Welcome & Header Action -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">User Management</h1>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C7FF3D]"></span>
                            128 Pengguna
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-400">Kelola akun seluruh pengguna, tingkatan hak akses (*roles*), dan status keaktifan anggota.</p>
                </div>

                <div class="flex items-center gap-2.5">
                    <button type="button" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-[#151515] border border-white/10 text-xs font-semibold text-gray-300 hover:text-white hover:bg-[#1a1a1a] transition">
                        <i class="fa-solid fa-arrow-down-to-bracket text-xs text-gray-400"></i>
                        <span>Export CSV</span>
                    </button>
                    <button type="button" onclick="openAddUserModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        <i class="fa-solid fa-user-plus text-xs"></i>
                        <span>Tambah Pengguna</span>
                    </button>
                </div>
            </div>

            <!-- Mini Quick Metric Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Total Users</p>
                        <h3 class="text-2xl font-extrabold text-white">128</h3>
                        <p class="text-[10px] text-[#C7FF3D] mt-1 font-medium">+12 pengguna baru</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D]">
                        <i class="fa-solid fa-users text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Super Admin</p>
                        <h3 class="text-2xl font-extrabold text-white">4</h3>
                        <p class="text-[10px] text-gray-400 mt-1 font-medium">Akses penuh sistem</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-amber-400">
                        <i class="fa-solid fa-shield-halved text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Project Manager</p>
                        <h3 class="text-2xl font-extrabold text-white">8</h3>
                        <p class="text-[10px] text-gray-400 mt-1 font-medium">Pengelola proyek</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-purple-400">
                        <i class="fa-solid fa-user-tie text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Akun Aktif</p>
                        <h3 class="text-2xl font-extrabold text-white">122</h3>
                        <p class="text-[10px] text-emerald-400 mt-1 font-medium">95.3% aktif beroperasi</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-emerald-400">
                        <i class="fa-regular fa-circle-check text-sm"></i>
                    </div>
                </div>
            </div>

            <!-- Toolbar / Filter Bar -->
            <div class="bg-[#151515] border border-white/10 rounded-2xl p-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    
                    <!-- Left: Filter Section Title -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D] text-xs">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-white flex items-center gap-2">
                                Filter Data Pengguna
                                <span class="text-[10px] font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 px-2 py-0.5 rounded-full border border-[#C7FF3D]/20 hidden sm:inline">
                                    Multi-role
                                </span>
                            </h3>
                            <p class="text-[11px] text-gray-400">Saring daftar pengguna berdasarkan wewenang peran (*role*) dan status akun</p>
                        </div>
                    </div>

                    <!-- Right: Filters & Reset Button -->
                    <div class="flex flex-wrap items-center gap-2">
                        <!-- Role Filter -->
                        <div class="relative">
                            <select id="roleFilterSelect" onchange="filterUsers()" class="appearance-none bg-[#1a1a1a] border border-white/10 text-xs text-gray-300 rounded-xl pl-3.5 pr-8 py-2.5 focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                                <option value="">Semua Peran (Roles)</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="pm">Project Manager</option>
                                <option value="developer">Developer</option>
                                <option value="designer">UI/UX Designer</option>
                                <option value="viewer">Viewer</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Status Filter -->
                        <div class="relative">
                            <select id="statusFilterSelect" onchange="filterUsers()" class="appearance-none bg-[#1a1a1a] border border-white/10 text-xs text-gray-300 rounded-xl pl-3.5 pr-8 py-2.5 focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                                <option value="">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Reset Filter -->
                        <button type="button" onclick="resetFilters()" class="px-3.5 py-2.5 rounded-xl bg-[#1a1a1a] border border-white/10 text-gray-400 hover:text-white hover:bg-[#202020] transition text-xs flex items-center gap-1.5" title="Reset Filter">
                            <i class="fa-solid fa-arrows-rotate text-[11px]"></i>
                            <span>Reset</span>
                        </button>
                    </div>

                </div>
            </div>

            <!-- User List Table Card -->
            <div class="bg-[#151515] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a1a1a] border-b border-white/10 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="py-3.5 px-4 w-10 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                </th>
                                <th class="py-3.5 px-4">Pengguna</th>
                                <th class="py-3.5 px-4">Email</th>
                                <th class="py-3.5 px-4">Peran (Role)</th>
                                <th class="py-3.5 px-4">Departemen / Tim</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-4">Terakhir Login</th>
                                <th class="py-3.5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-xs" id="userTableBody">

                            <!-- Row 1: Super Admin -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_1" 
                                data-user-id="1" 
                                data-name="Administrator ProSite" 
                                data-username="admin" 
                                data-email="admin@itensflow.ac.id" 
                                data-roles="superadmin" 
                                data-status="active" 
                                data-initial="A" 
                                data-color="neon">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] font-bold text-xs uppercase shrink-0">
                                            A
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Administrator ProSite</p>
                                            <p class="text-[11px] text-gray-400">@admin</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    admin@itensflow.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_1">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">
                                            <i class="fa-solid fa-shield-halved text-[10px]"></i>
                                            Super Admin
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(1)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    Core System IT
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    Online Sekarang
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(1)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/50 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2: Budi Santoso (Multi-role: PM + Developer) -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_2" 
                                data-user-id="2" 
                                data-name="Budi Santoso" 
                                data-username="budi" 
                                data-email="budi.santoso@itenas.ac.id" 
                                data-roles="pm,developer" 
                                data-status="active" 
                                data-initial="B" 
                                data-color="purple">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-300 font-bold text-xs uppercase shrink-0">
                                            B
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Budi Santoso</p>
                                            <p class="text-[11px] text-gray-400">@budi</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    budi.santoso@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_2">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-purple-500/10 text-purple-400 border border-purple-500/20">
                                            <i class="fa-solid fa-user-tie text-[10px]"></i>
                                            Project Manager
                                        </span>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            <i class="fa-solid fa-code text-[10px]"></i>
                                            Developer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(2)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    Web Development
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    15 menit yang lalu
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(2)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-purple-500/50 text-gray-400 hover:text-purple-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3: Siti Rahma (Multi-role: Designer + Developer) -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_3" 
                                data-user-id="3" 
                                data-name="Siti Rahma" 
                                data-username="siti" 
                                data-email="siti.rahma@itenas.ac.id" 
                                data-roles="designer,developer" 
                                data-status="active" 
                                data-initial="S" 
                                data-color="pink">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-pink-500/15 border border-pink-500/30 flex items-center justify-center text-pink-300 font-bold text-xs uppercase shrink-0">
                                            S
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Siti Rahma</p>
                                            <p class="text-[11px] text-gray-400">@siti</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    siti.rahma@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_3">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-pink-500/10 text-pink-400 border border-pink-500/20">
                                            <i class="fa-solid fa-pen-ruler text-[10px]"></i>
                                            UI/UX Designer
                                        </span>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            <i class="fa-solid fa-code text-[10px]"></i>
                                            Developer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(3)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    UI/UX Product Design
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    1 jam yang lalu
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(3)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-pink-500/50 text-gray-400 hover:text-pink-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4: Ahmad Fauzi (Developer) -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_4" 
                                data-user-id="4" 
                                data-name="Ahmad Fauzi" 
                                data-username="fauzi" 
                                data-email="ahmad.fauzi@itenas.ac.id" 
                                data-roles="developer" 
                                data-status="active" 
                                data-initial="A" 
                                data-color="blue">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center text-blue-300 font-bold text-xs uppercase shrink-0">
                                            A
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Ahmad Fauzi</p>
                                            <p class="text-[11px] text-gray-400">@fauzi</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    ahmad.fauzi@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            <i class="fa-solid fa-code text-[10px]"></i>
                                            Developer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(4)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    Backend Engineering
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    3 jam yang lalu
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(4)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-blue-500/50 text-gray-400 hover:text-blue-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 5: Dewi Lestari (Multi-role: Designer + Viewer) -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_5" 
                                data-user-id="5" 
                                data-name="Dewi Lestari" 
                                data-username="dewi_l" 
                                data-email="dewi.lestari@itenas.ac.id" 
                                data-roles="designer,viewer" 
                                data-status="active" 
                                data-initial="D" 
                                data-color="pink">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-pink-500/15 border border-pink-500/30 flex items-center justify-center text-pink-300 font-bold text-xs uppercase shrink-0">
                                            D
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Dewi Lestari</p>
                                            <p class="text-[11px] text-gray-400">@dewi_l</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    dewi.lestari@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_5">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-pink-500/10 text-pink-400 border border-pink-500/20">
                                            <i class="fa-solid fa-pen-ruler text-[10px]"></i>
                                            UI/UX Designer
                                        </span>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <i class="fa-solid fa-eye text-[10px]"></i>
                                            Viewer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(5)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    QA & Testing
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    Kemarin, 16:40
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(5)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-pink-500/50 text-gray-400 hover:text-pink-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 6: Rizky Pratama (Nonaktif) -->
                            <tr class="hover:bg-white/[0.02] transition opacity-75 user-table-row" 
                                id="userRow_6" 
                                data-user-id="6" 
                                data-name="Rizky Pratama" 
                                data-username="rizky_p" 
                                data-email="rizky.pratama@itenas.ac.id" 
                                data-roles="developer" 
                                data-status="inactive" 
                                data-initial="R" 
                                data-color="gray">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-gray-700/30 border border-white/10 flex items-center justify-center text-gray-400 font-bold text-xs uppercase shrink-0">
                                            R
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Rizky Pratama</p>
                                            <p class="text-[11px] text-gray-400">@rizky_p</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    rizky.pratama@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_6">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            <i class="fa-solid fa-code text-[10px]"></i>
                                            Developer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(6)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    Mobile App Dev
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                        Nonaktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    5 hari lalu
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(6)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-blue-500/50 text-gray-400 hover:text-blue-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-emerald-500/40 text-gray-400 hover:text-emerald-400 flex items-center justify-center transition" title="Aktifkan Akun">
                                            <i class="fa-solid fa-user-check text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 7: Nadia Putri (Multi-role: PM + Designer) -->
                            <tr class="hover:bg-white/[0.02] transition user-table-row" 
                                id="userRow_7" 
                                data-user-id="7" 
                                data-name="Nadia Putri" 
                                data-username="nadiap" 
                                data-email="nadia.putri@itenas.ac.id" 
                                data-roles="pm,designer" 
                                data-status="active" 
                                data-initial="N" 
                                data-color="purple">
                                <td class="py-4 px-4 text-center">
                                    <input type="checkbox" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-300 font-bold text-xs uppercase shrink-0">
                                            N
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Nadia Putri</p>
                                            <p class="text-[11px] text-gray-400">@nadiap</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300 font-mono text-[11px]">
                                    nadia.putri@itenas.ac.id
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap items-center gap-1.5" id="userRolesContainer_7">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-purple-500/10 text-purple-400 border border-purple-500/20">
                                            <i class="fa-solid fa-user-tie text-[10px]"></i>
                                            Project Manager
                                        </span>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-pink-500/10 text-pink-400 border border-pink-500/20">
                                            <i class="fa-solid fa-pen-ruler text-[10px]"></i>
                                            UI/UX Designer
                                        </span>
                                        <button type="button" onclick="openEditRoleModal(7)" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                                            <i class="fa-solid fa-plus text-[9px]"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    Database Administration
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-400 text-[11px]">
                                    2 hari lalu
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-[#C7FF3D]/40 text-gray-400 hover:text-white flex items-center justify-center transition" title="Edit Profil Pengguna">
                                            <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                        </button>
                                        <button type="button" onclick="openEditRoleModal(7)" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-purple-500/50 text-gray-400 hover:text-purple-400 flex items-center justify-center transition" title="Ubah Role Pengguna">
                                            <i class="fa-solid fa-user-shield text-[11px]"></i>
                                        </button>
                                        <button type="button" class="w-7 h-7 rounded-lg bg-[#1a1a1a] border border-white/10 hover:border-red-500/40 text-gray-400 hover:text-red-400 flex items-center justify-center transition" title="Nonaktifkan">
                                            <i class="fa-solid fa-trash-can text-[11px]"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Table Footer & Pagination -->
                <div class="p-4 bg-[#1a1a1a]/60 border-t border-white/10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs">
                    <p class="text-gray-400">
                        Menampilkan <span class="text-white font-semibold">1</span> s/d <span class="text-white font-semibold">7</span> dari <span class="text-[#C7FF3D] font-bold">128</span> total pengguna
                    </p>

                    <div class="flex items-center gap-1">
                        <button type="button" class="px-3 py-1.5 rounded-lg bg-[#151515] border border-white/10 text-gray-400 hover:text-white hover:bg-[#202020] transition disabled:opacity-50" disabled>
                            <i class="fa-solid fa-chevron-left text-[10px] mr-1"></i> Prev
                        </button>
                        <button type="button" class="w-8 h-8 rounded-lg bg-[#C7FF3D] text-black font-bold flex items-center justify-center shadow">
                            1
                        </button>
                        <button type="button" class="w-8 h-8 rounded-lg bg-[#151515] border border-white/10 text-gray-300 hover:text-white hover:bg-[#202020] flex items-center justify-center transition">
                            2
                        </button>
                        <button type="button" class="w-8 h-8 rounded-lg bg-[#151515] border border-white/10 text-gray-300 hover:text-white hover:bg-[#202020] flex items-center justify-center transition">
                            3
                        </button>
                        <span class="text-gray-500 px-1">...</span>
                        <button type="button" class="w-8 h-8 rounded-lg bg-[#151515] border border-white/10 text-gray-300 hover:text-white hover:bg-[#202020] flex items-center justify-center transition">
                            19
                        </button>
                        <button type="button" class="px-3 py-1.5 rounded-lg bg-[#151515] border border-white/10 text-gray-300 hover:text-white hover:bg-[#202020] transition">
                            Next <i class="fa-solid fa-chevron-right text-[10px] ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Tambah Pengguna Baru (Mock UI with Multi-Role) -->
        <div id="addUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm hidden p-4 transition-all">
            <div class="bg-[#151515] border border-white/10 rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl relative transform transition-all">
                
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] text-xs">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Tambah Pengguna Baru</h3>
                            <p class="text-[11px] text-gray-400">Buat akun anggota baru dan tentukan peran (*multi-role*)</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeAddUserModal()" class="w-7 h-7 rounded-lg bg-[#1a1a1a] text-gray-400 hover:text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>

                <!-- Modal Body / Form -->
                <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto custom-scroll">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Nama Lengkap</label>
                            <input type="text" id="newUserName" placeholder="misal: Farhan Pratama"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Username</label>
                            <input type="text" id="newUserUsername" placeholder="misal: farhan_p"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Email Kampus / Perusahaan</label>
                            <input type="email" id="newUserEmail" placeholder="misal: farhan@itenas.ac.id"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Departemen / Divisi</label>
                            <input type="text" id="newUserDept" placeholder="misal: Frontend Engineering"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                    </div>

                    <!-- Multi-Role Selection Checkbox Group -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-semibold text-gray-300">Pilih Peran Pengguna (Bisa Lebih dari 1 Role)</label>
                            <span class="text-[10px] text-[#C7FF3D] font-medium flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-[9px]"></i> Multi-role Didukung
                            </span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-[#1a1a1a] p-3 rounded-xl border border-white/10">
                            <label class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-white/5 transition cursor-pointer select-none">
                                <input type="checkbox" name="newRoles" value="superadmin" class="rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer">
                                <div>
                                    <span class="text-xs font-medium text-white flex items-center gap-1.5">
                                        <i class="fa-solid fa-shield-halved text-[#C7FF3D] text-[10px]"></i> Super Admin
                                    </span>
                                    <p class="text-[10px] text-gray-400">Akses penuh sistem</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-white/5 transition cursor-pointer select-none">
                                <input type="checkbox" name="newRoles" value="pm" class="rounded bg-[#202020] border-white/20 text-purple-400 focus:ring-0 cursor-pointer">
                                <div>
                                    <span class="text-xs font-medium text-white flex items-center gap-1.5">
                                        <i class="fa-solid fa-user-tie text-purple-400 text-[10px]"></i> Project Manager
                                    </span>
                                    <p class="text-[10px] text-gray-400">Kelola tim & sprint</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-white/5 transition cursor-pointer select-none">
                                <input type="checkbox" name="newRoles" value="developer" checked class="rounded bg-[#202020] border-white/20 text-blue-400 focus:ring-0 cursor-pointer">
                                <div>
                                    <span class="text-xs font-medium text-white flex items-center gap-1.5">
                                        <i class="fa-solid fa-code text-blue-400 text-[10px]"></i> Developer
                                    </span>
                                    <p class="text-[10px] text-gray-400">Pengerjaan task teknis</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-white/5 transition cursor-pointer select-none">
                                <input type="checkbox" name="newRoles" value="designer" class="rounded bg-[#202020] border-white/20 text-pink-400 focus:ring-0 cursor-pointer">
                                <div>
                                    <span class="text-xs font-medium text-white flex items-center gap-1.5">
                                        <i class="fa-solid fa-pen-ruler text-pink-400 text-[10px]"></i> UI/UX Designer
                                    </span>
                                    <p class="text-[10px] text-gray-400">Desain mockup & review</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-white/5 transition cursor-pointer select-none sm:col-span-2">
                                <input type="checkbox" name="newRoles" value="viewer" class="rounded bg-[#202020] border-white/20 text-emerald-400 focus:ring-0 cursor-pointer">
                                <div>
                                    <span class="text-xs font-medium text-white flex items-center gap-1.5">
                                        <i class="fa-solid fa-eye text-emerald-400 text-[10px]"></i> Viewer / Stakeholder
                                    </span>
                                    <p class="text-[10px] text-gray-400">Hanya melihat progress tanpa hak edit</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Password</label>
                            <input type="password" placeholder="••••••••"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Konfirmasi Password</label>
                            <input type="password" placeholder="••••••••"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-[#1a1a1a]/80 border-t border-white/10 flex items-center justify-end gap-2.5">
                    <button type="button" onclick="closeAddUserModal()" class="px-4 py-2 rounded-xl bg-transparent hover:bg-white/5 text-xs text-gray-400 hover:text-white transition">
                        Batal
                    </button>
                    <button type="button" onclick="submitNewUserMock()" class="px-4 py-2 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        Simpan Pengguna
                    </button>
                </div>

            </div>
        </div>

        <!-- Modal Ubah Role Pengguna (Multi-Role Modal) -->
        <div id="editRoleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-sm hidden p-4 transition-all">
            <div class="bg-[#151515] border border-white/10 rounded-2xl w-full max-w-xl overflow-hidden shadow-2xl relative transform transition-all">
                
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] text-sm">
                            <i class="fa-solid fa-user-gear"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Ubah Role Pengguna</h3>
                            <p class="text-[11px] text-gray-400">Atur satu atau beberapa peran (*multi-role*) untuk pengguna ini</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeEditRoleModal()" class="w-7 h-7 rounded-lg bg-[#1a1a1a] text-gray-400 hover:text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>

                <!-- Target User Info Banner -->
                <div class="px-6 py-3.5 bg-[#1a1a1a]/70 border-b border-white/5 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div id="editRoleUserAvatar" class="w-10 h-10 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-300 font-bold text-sm uppercase shrink-0">
                            B
                        </div>
                        <div>
                            <h4 id="editRoleUserName" class="text-xs font-bold text-white">Budi Santoso</h4>
                            <div class="flex items-center gap-2 text-[11px] text-gray-400">
                                <span id="editRoleUserUsername">@budi</span>
                                <span>•</span>
                                <span id="editRoleUserEmail" class="font-mono text-gray-400">budi.santoso@itenas.ac.id</span>
                            </div>
                        </div>
                    </div>
                    <span id="editRoleUserStatusBadge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Akun Aktif
                    </span>
                </div>

                <!-- Modal Body: Role Selection Checklist -->
                <div class="p-6 max-h-[55vh] overflow-y-auto custom-scroll space-y-3">
                    
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs font-bold text-white flex items-center gap-1.5">
                            <i class="fa-solid fa-shield-halved text-[#C7FF3D] text-[11px]"></i>
                            Daftar Peran yang Diberikan:
                        </p>
                        <span class="text-[11px] text-[#C7FF3D] font-medium">Bisa memilih lebih dari 1 role</span>
                    </div>

                    <!-- Role Card 1: Super Admin -->
                    <label class="relative flex items-start gap-3.5 p-3.5 rounded-xl border border-white/10 bg-[#1a1a1a]/60 hover:bg-[#1a1a1a] hover:border-[#C7FF3D]/40 transition cursor-pointer select-none">
                        <input type="checkbox" name="editUserRoles" value="superadmin" class="mt-1 rounded bg-[#202020] border-white/20 text-[#C7FF3D] focus:ring-0 cursor-pointer w-4 h-4" onchange="updateRolePreview()">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-[#C7FF3D]/15 text-[#C7FF3D] flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </span>
                                    <span class="text-xs font-bold text-white">Super Admin</span>
                                </div>
                                <span class="text-[10px] font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 px-2 py-0.5 rounded border border-[#C7FF3D]/20">Sistem Bawaan</span>
                            </div>
                            <p class="text-[11px] text-gray-400">Akses mutlak ke seluruh modul aplikasi, kontrol basis data, pengelolaan pengguna, dan perizinan sistem (24/24 Wewenang).</p>
                        </div>
                    </label>

                    <!-- Role Card 2: Project Manager -->
                    <label class="relative flex items-start gap-3.5 p-3.5 rounded-xl border border-white/10 bg-[#1a1a1a]/60 hover:bg-[#1a1a1a] hover:border-purple-500/40 transition cursor-pointer select-none">
                        <input type="checkbox" name="editUserRoles" value="pm" class="mt-1 rounded bg-[#202020] border-white/20 text-purple-400 focus:ring-0 cursor-pointer w-4 h-4" onchange="updateRolePreview()">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-purple-500/15 text-purple-400 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </span>
                                    <span class="text-xs font-bold text-white">Project Manager</span>
                                </div>
                                <span class="text-[10px] font-semibold text-purple-400 bg-purple-500/10 px-2 py-0.5 rounded border border-purple-500/20">Manajemen</span>
                            </div>
                            <p class="text-[11px] text-gray-400">Membuat proyek baru, mengatur alokasi tim, membagi tugas (*task assignments*), serta memantau deadline (19/24 Wewenang).</p>
                        </div>
                    </label>

                    <!-- Role Card 3: Developer -->
                    <label class="relative flex items-start gap-3.5 p-3.5 rounded-xl border border-white/10 bg-[#1a1a1a]/60 hover:bg-[#1a1a1a] hover:border-blue-500/40 transition cursor-pointer select-none">
                        <input type="checkbox" name="editUserRoles" value="developer" class="mt-1 rounded bg-[#202020] border-white/20 text-blue-400 focus:ring-0 cursor-pointer w-4 h-4" onchange="updateRolePreview()">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-blue-500/15 text-blue-400 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-code"></i>
                                    </span>
                                    <span class="text-xs font-bold text-white">Developer</span>
                                </div>
                                <span class="text-[10px] font-semibold text-blue-400 bg-blue-500/10 px-2 py-0.5 rounded border border-blue-500/20">Tim Teknis</span>
                            </div>
                            <p class="text-[11px] text-gray-400">Mengerjakan task proyek, memindahkan kartu status kanban board (*To Do → In Progress → Done*), dan menulis komentar teknis (12/24 Wewenang).</p>
                        </div>
                    </label>

                    <!-- Role Card 4: UI/UX Designer -->
                    <label class="relative flex items-start gap-3.5 p-3.5 rounded-xl border border-white/10 bg-[#1a1a1a]/60 hover:bg-[#1a1a1a] hover:border-pink-500/40 transition cursor-pointer select-none">
                        <input type="checkbox" name="editUserRoles" value="designer" class="mt-1 rounded bg-[#202020] border-white/20 text-pink-400 focus:ring-0 cursor-pointer w-4 h-4" onchange="updateRolePreview()">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-pink-500/15 text-pink-400 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-pen-ruler"></i>
                                    </span>
                                    <span class="text-xs font-bold text-white">UI/UX Designer</span>
                                </div>
                                <span class="text-[10px] font-semibold text-pink-400 bg-pink-500/10 px-2 py-0.5 rounded border border-pink-500/20">Desain</span>
                            </div>
                            <p class="text-[11px] text-gray-400">Merancang mockup antarmuka, mengunggah wireframe/prototype aset desain, serta memandu review visual aplikasi (11/24 Wewenang).</p>
                        </div>
                    </label>

                    <!-- Role Card 5: Viewer / Stakeholder -->
                    <label class="relative flex items-start gap-3.5 p-3.5 rounded-xl border border-white/10 bg-[#1a1a1a]/60 hover:bg-[#1a1a1a] hover:border-emerald-500/40 transition cursor-pointer select-none">
                        <input type="checkbox" name="editUserRoles" value="viewer" class="mt-1 rounded bg-[#202020] border-white/20 text-emerald-400 focus:ring-0 cursor-pointer w-4 h-4" onchange="updateRolePreview()">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                    <span class="text-xs font-bold text-white">Viewer / Stakeholder</span>
                                </div>
                                <span class="text-[10px] font-semibold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/20">Read-Only</span>
                            </div>
                            <p class="text-[11px] text-gray-400">Akses hanya-baca untuk melihat progress task, rekap sprint, dan timeline proyek tanpa wewenang mengubah data (4/24 Wewenang).</p>
                        </div>
                    </label>

                </div>

                <!-- Role Preview Summary Bar -->
                <div class="px-6 py-3 bg-[#1a1a1a]/90 border-t border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs">
                    <span class="text-gray-400">Peran Terpilih (<span id="selectedRolesCount" class="text-white font-bold">0</span> role):</span>
                    <div id="selectedRolesPreview" class="flex flex-wrap gap-1.5 justify-start sm:justify-end">
                        <!-- Preview badges injected via JS -->
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-[#151515] border-t border-white/10 flex items-center justify-end gap-2.5">
                    <button type="button" onclick="closeEditRoleModal()" class="px-4 py-2 rounded-xl bg-transparent hover:bg-white/5 text-xs text-gray-400 hover:text-white transition">
                        Batal
                    </button>
                    <button type="button" onclick="saveUserRoles()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        <i class="fa-solid fa-check text-xs"></i>
                        <span>Simpan Perubahan Role</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- Toast Notification Popup -->
        <div id="toastNotification" class="fixed top-6 right-6 z-[9999] transform translate-y-[-150%] opacity-0 transition-all duration-300 pointer-events-none">
            <div class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#151515] border border-[#C7FF3D]/40 text-white shadow-2xl shadow-[#C7FF3D]/10 backdrop-blur-md">
                <div id="toastIconContainer" class="w-8 h-8 rounded-xl bg-[#C7FF3D]/20 text-[#C7FF3D] flex items-center justify-center text-sm font-bold">
                    <i id="toastIcon" class="fa-solid fa-check"></i>
                </div>
                <div>
                    <p id="toastTitle" class="text-xs font-bold text-white">Berhasil!</p>
                    <p id="toastMessage" class="text-[11px] text-gray-300">Role pengguna berhasil diperbarui.</p>
                </div>
            </div>
        </div>

    </main>

    <script>
        /* ── Role Configuration Dictionary ── */
        const ROLES_CONFIG = {
            superadmin: {
                id: 'superadmin',
                name: 'Super Admin',
                icon: 'fa-solid fa-shield-halved',
                badgePill: 'bg-[#C7FF3D]/10 text-[#C7FF3D] border-[#C7FF3D]/20'
            },
            pm: {
                id: 'pm',
                name: 'Project Manager',
                icon: 'fa-solid fa-user-tie',
                badgePill: 'bg-purple-500/10 text-purple-400 border-purple-500/20'
            },
            developer: {
                id: 'developer',
                name: 'Developer',
                icon: 'fa-solid fa-code',
                badgePill: 'bg-blue-500/10 text-blue-400 border-blue-500/20'
            },
            designer: {
                id: 'designer',
                name: 'UI/UX Designer',
                icon: 'fa-solid fa-pen-ruler',
                badgePill: 'bg-pink-500/10 text-pink-400 border-pink-500/20'
            },
            viewer: {
                id: 'viewer',
                name: 'Viewer',
                icon: 'fa-solid fa-eye',
                badgePill: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20'
            }
        };

        let currentEditingUserId = null;

        /* ── Helper: Generate Roles HTML for Table Cell ── */
        function renderRolesHtml(rolesArray, userId) {
            const badgesHtml = rolesArray.map(roleKey => {
                const cfg = ROLES_CONFIG[roleKey];
                if (!cfg) return '';
                return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold ${cfg.badgePill}">
                    <i class="${cfg.icon} text-[10px]"></i>
                    ${cfg.name}
                </span>`;
            }).join('');

            return badgesHtml + `
                <button type="button" onclick="openEditRoleModal(${userId})" class="w-5 h-5 rounded-md bg-white/5 hover:bg-white/10 text-gray-400 hover:text-[#C7FF3D] flex items-center justify-center transition text-[10px]" title="Ubah atau Tambah Role">
                    <i class="fa-solid fa-plus text-[9px]"></i>
                </button>
            `;
        }

        /* ── Edit Role Modal Functions ── */
        function openEditRoleModal(userId) {
            const row = document.getElementById('userRow_' + userId);
            if (!row) return;

            currentEditingUserId = userId;

            const name = row.getAttribute('data-name');
            const username = row.getAttribute('data-username');
            const email = row.getAttribute('data-email');
            const rolesStr = row.getAttribute('data-roles') || '';
            const status = row.getAttribute('data-status');
            const initial = row.getAttribute('data-initial') || name.charAt(0);
            const color = row.getAttribute('data-color') || 'purple';

            const userRoles = rolesStr.split(',').map(r => r.trim()).filter(Boolean);

            // Populate Banner
            document.getElementById('editRoleUserName').textContent = name;
            document.getElementById('editRoleUserUsername').textContent = '@' + username;
            document.getElementById('editRoleUserEmail').textContent = email;

            const avatarEl = document.getElementById('editRoleUserAvatar');
            avatarEl.textContent = initial.toUpperCase();
            
            // Set Avatar Colors
            avatarEl.className = 'w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm uppercase shrink-0 border ';
            if (color === 'neon') {
                avatarEl.className += 'bg-[#C7FF3D]/15 text-[#C7FF3D] border-[#C7FF3D]/30';
            } else if (color === 'purple') {
                avatarEl.className += 'bg-purple-500/15 text-purple-300 border-purple-500/30';
            } else if (color === 'pink') {
                avatarEl.className += 'bg-pink-500/15 text-pink-300 border-pink-500/30';
            } else if (color === 'blue') {
                avatarEl.className += 'bg-blue-500/15 text-blue-300 border-blue-500/30';
            } else {
                avatarEl.className += 'bg-gray-700/30 text-gray-400 border-white/10';
            }

            // Status Badge
            const statusBadge = document.getElementById('editRoleUserStatusBadge');
            if (status === 'inactive') {
                statusBadge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-red-500/10 text-red-400 border border-red-500/20';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Akun Nonaktif';
            } else {
                statusBadge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Akun Aktif';
            }

            // Sync Checkboxes
            const checkboxes = document.querySelectorAll('#editRoleModal input[name="editUserRoles"]');
            checkboxes.forEach(cb => {
                cb.checked = userRoles.includes(cb.value);
            });

            updateRolePreview();

            // Show Modal
            const modal = document.getElementById('editRoleModal');
            if (modal) modal.classList.remove('hidden');
        }

        function closeEditRoleModal() {
            const modal = document.getElementById('editRoleModal');
            if (modal) modal.classList.add('hidden');
            currentEditingUserId = null;
        }

        function updateRolePreview() {
            const checkedCbs = document.querySelectorAll('#editRoleModal input[name="editUserRoles"]:checked');
            const previewContainer = document.getElementById('selectedRolesPreview');
            const countEl = document.getElementById('selectedRolesCount');

            countEl.textContent = checkedCbs.length;

            if (checkedCbs.length === 0) {
                previewContainer.innerHTML = '<span class="text-amber-400 text-[11px] italic"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Pilih minimal 1 role</span>';
                return;
            }

            const badges = Array.from(checkedCbs).map(cb => {
                const cfg = ROLES_CONFIG[cb.value];
                if (!cfg) return '';
                return `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-semibold ${cfg.badgePill}">
                    <i class="${cfg.icon} text-[9px]"></i>
                    ${cfg.name}
                </span>`;
            }).join('');

            previewContainer.innerHTML = badges;
        }

        function saveUserRoles() {
            if (!currentEditingUserId) return;

            const checkedCbs = document.querySelectorAll('#editRoleModal input[name="editUserRoles"]:checked');
            if (checkedCbs.length === 0) {
                showToast('Perhatian', 'Pengguna harus memiliki minimal 1 peran (role)!', 'warning');
                return;
            }

            const selectedRoles = Array.from(checkedCbs).map(cb => cb.value);
            const row = document.getElementById('userRow_' + currentEditingUserId);
            if (!row) return;

            const userName = row.getAttribute('data-name');

            // Update row data-roles attribute
            row.setAttribute('data-roles', selectedRoles.join(','));

            // Re-render role badges in table
            const container = document.getElementById('userRolesContainer_' + currentEditingUserId);
            if (container) {
                container.innerHTML = renderRolesHtml(selectedRoles, currentEditingUserId);
            }

            // Close Modal
            closeEditRoleModal();

            // Show notification toast
            showToast('Role Berhasil Diperbarui', `Peran untuk ${userName} berhasil disimpan (${selectedRoles.length} role aktif).`, 'success');

            // Re-run filter in case role filtering was active
            filterUsers();
        }

        /* ── Modal Tambah User (Mock UI) ── */
        function openAddUserModal() {
            const modal = document.getElementById('addUserModal');
            if (modal) modal.classList.remove('hidden');
        }

        function closeAddUserModal() {
            const modal = document.getElementById('addUserModal');
            if (modal) modal.classList.add('hidden');
        }

        function submitNewUserMock() {
            const nameInput = document.getElementById('newUserName');
            const name = nameInput && nameInput.value.trim() ? nameInput.value.trim() : 'Pengguna Baru';
            const checkedCbs = document.querySelectorAll('#addUserModal input[name="newRoles"]:checked');
            const roleCount = checkedCbs.length;

            closeAddUserModal();
            showToast('Pengguna Ditambahkan', `${name} berhasil didaftarkan dengan ${roleCount} peran (multi-role).`, 'success');

            // Reset input
            if (nameInput) nameInput.value = '';
        }

        /* ── Search & Filter Logic ── */
        function filterUsers() {
            const searchVal = (document.getElementById('headerSearchInput')?.value || '').toLowerCase().trim();
            const roleFilter = document.getElementById('roleFilterSelect')?.value || '';
            const statusFilter = document.getElementById('statusFilterSelect')?.value || '';

            const rows = document.querySelectorAll('.user-table-row');

            rows.forEach(row => {
                const name = (row.getAttribute('data-name') || '').toLowerCase();
                const username = (row.getAttribute('data-username') || '').toLowerCase();
                const email = (row.getAttribute('data-email') || '').toLowerCase();
                const roles = (row.getAttribute('data-roles') || '').split(',');
                const status = (row.getAttribute('data-status') || '').toLowerCase();

                const matchSearch = !searchVal || name.includes(searchVal) || username.includes(searchVal) || email.includes(searchVal);
                const matchRole = !roleFilter || roles.includes(roleFilter);
                const matchStatus = !statusFilter || status === statusFilter;

                if (matchSearch && matchRole && matchStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function resetFilters() {
            const headerSearch = document.getElementById('headerSearchInput');
            const roleSelect = document.getElementById('roleFilterSelect');
            const statusSelect = document.getElementById('statusFilterSelect');

            if (headerSearch) headerSearch.value = '';
            if (roleSelect) roleSelect.value = '';
            if (statusSelect) statusSelect.value = '';

            filterUsers();
            showToast('Filter Direset', 'Menampilkan seluruh daftar pengguna.', 'info');
        }

        /* ── Toast Notification System ── */
        let toastTimeout = null;
        function showToast(title, message, type = 'success') {
            const toast = document.getElementById('toastNotification');
            const titleEl = document.getElementById('toastTitle');
            const msgEl = document.getElementById('toastMessage');
            const iconEl = document.getElementById('toastIcon');
            const iconContainer = document.getElementById('toastIconContainer');

            if (!toast) return;

            titleEl.textContent = title;
            msgEl.textContent = message;

            if (type === 'warning') {
                iconContainer.className = 'w-8 h-8 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-sm font-bold';
                iconEl.className = 'fa-solid fa-triangle-exclamation';
            } else if (type === 'info') {
                iconContainer.className = 'w-8 h-8 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center text-sm font-bold';
                iconEl.className = 'fa-solid fa-info';
            } else {
                iconContainer.className = 'w-8 h-8 rounded-xl bg-[#C7FF3D]/20 text-[#C7FF3D] flex items-center justify-center text-sm font-bold';
                iconEl.className = 'fa-solid fa-check';
            }

            toast.classList.remove('translate-y-[-150%]', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            if (toastTimeout) clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-[-150%]', 'opacity-0');
            }, 3500);
        }

        /* ── Close Modals on ESC Key or Click Outside ── */
        window.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddUserModal();
                closeEditRoleModal();
            }
        });

        window.addEventListener('click', function(e) {
            const addModal = document.getElementById('addUserModal');
            const editModal = document.getElementById('editRoleModal');
            if (e.target === addModal) closeAddUserModal();
            if (e.target === editModal) closeEditRoleModal();
        });

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