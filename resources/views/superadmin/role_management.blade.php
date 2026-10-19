<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ItensFlow - Role Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>

<body class="flex h-screen overflow-hidden bg-[#080808] font-sans">

    <div id="sidebar-backdrop"
        class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm"
        onclick="toggleSidebar()">
    </div>

    <!-- Sidebar -->
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

    <!-- Main Content Area -->
    <main class="flex-1 p-8 pt-0 overflow-y-auto custom-scroll bg-gradient-glow">

        <!-- Top Header -->
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
                    <input type="text" id="roleHeaderSearch" oninput="filterRoleCards()" placeholder="Search roles, permissions, settings..."
                        class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 
                                rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
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

                        <div class="py-1 space-y-0.5">
                            <a href="{{ url('/setting') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-gray-300 hover:text-white hover:bg-white/5 transition">
                                <i class="fa-solid fa-gear text-xs text-gray-400 w-4 text-center"></i>
                                <span>Settings</span>
                            </a>
                        </div>

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
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Role Management</h1>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C7FF3D]"></span>
                            5 Roles Terdaftar
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-400">Kelola kelompok peran, deskripsi tugas, dan alokasi wewenang hak akses tim ItensFlow.</p>
                </div>

                <div class="flex items-center gap-2.5">
                    <a href="{{ url('/admin/permissions') }}" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-[#151515] border border-white/10 text-xs font-semibold text-gray-300 hover:text-white hover:bg-[#1a1a1a] transition">
                        <i class="fa-solid fa-sliders text-xs text-[#C7FF3D]"></i>
                        <span>Matriks Permissions</span>
                    </a>
                    <button type="button" onclick="openAddRoleModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Role Baru</span>
                    </button>
                </div>
            </div>

            <!-- Metric Stats Row -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Total Roles</p>
                        <h3 class="text-2xl font-extrabold text-white">5</h3>
                        <p class="text-[10px] text-[#C7FF3D] mt-1 font-medium">1 Sistem • 4 Kustom</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D]">
                        <i class="fa-solid fa-user-tag text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Pengguna Terdaftar</p>
                        <h3 class="text-2xl font-extrabold text-white">128</h3>
                        <p class="text-[10px] text-gray-400 mt-1 font-medium">Terbagi dalam 5 role</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-blue-400">
                        <i class="fa-solid fa-users text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Akses Tertinggi</p>
                        <h3 class="text-2xl font-extrabold text-white">Super Admin</h3>
                        <p class="text-[10px] text-amber-400 mt-1 font-medium">4 Akun dengan Full Access</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-amber-400">
                        <i class="fa-solid fa-crown text-sm"></i>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-4 flex items-center justify-between hover:border-[#C7FF3D]/40 transition">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Role Paling Umum</p>
                        <h3 class="text-2xl font-extrabold text-white">Developer</h3>
                        <p class="text-[10px] text-purple-400 mt-1 font-medium">84 Anggota (65.6%)</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-purple-400">
                        <i class="fa-solid fa-chart-pie text-sm"></i>
                    </div>
                </div>
            </div>

            <!-- Toolbar / Filter Bar -->
            <div class="bg-[#151515] border border-white/10 rounded-2xl p-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    
                    <!-- Left: Section Title -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-[#1a1a1a] border border-white/10 flex items-center justify-center text-[#C7FF3D] text-xs">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-white flex items-center gap-2">
                                Filter Kategori Role
                                <span class="text-[10px] font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 px-2 py-0.5 rounded-full border border-[#C7FF3D]/20 hidden sm:inline">
                                    5 Peran Aktif
                                </span>
                            </h3>
                            <p class="text-[11px] text-gray-400">Pilah kartu peran berdasarkan kategori sistem bawaan atau kustom tim</p>
                        </div>
                    </div>

                    <!-- Right: Filters & Reset Button -->
                    <div class="flex items-center gap-2">
                        <div class="relative">
                            <select id="roleTypeFilter" onchange="filterRoleCards()" class="appearance-none bg-[#1a1a1a] border border-white/10 text-xs text-gray-300 rounded-xl pl-3.5 pr-8 py-2.5 focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                                <option value="">Semua Tipe Role</option>
                                <option value="system">Role Bawaan Sistem</option>
                                <option value="custom">Role Kustom / Tim</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Reset Filter -->
                        <button type="button" onclick="resetRoleFilter()" class="px-3.5 py-2.5 rounded-xl bg-[#1a1a1a] border border-white/10 text-gray-400 hover:text-white hover:bg-[#202020] transition text-xs flex items-center gap-1.5" title="Reset Filter">
                            <i class="fa-solid fa-arrows-rotate text-[11px]"></i>
                            <span>Reset</span>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Role Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Role Card 1: Super Admin -->
                <div class="role-card bg-[#151515] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition group relative overflow-hidden"
                    data-role-name="Super Admin" data-role-type="system" data-role-desc="akses mutlak modul aplikasi kontrol basis data user management">
                    <div class="absolute -top-10 -right-10 w-28 h-28 bg-[#C7FF3D]/10 rounded-full blur-2xl group-hover:bg-[#C7FF3D]/20 transition pointer-events-none"></div>

                    <div>
                        <!-- Top Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] text-lg">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20 uppercase tracking-wider">
                                <i class="fa-solid fa-lock text-[9px]"></i> Sistem Bawaan
                            </span>
                        </div>

                        <!-- Role Info -->
                        <h3 class="text-lg font-bold text-white mb-1.5">Super Admin</h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-5">
                            Memiliki akses mutlak ke seluruh modul aplikasi, kontrol basis data, pengelolaan pengguna, dan perizinan sistem.
                        </p>

                        <!-- Members Count & Avatars -->
                        <div class="flex items-center justify-between py-3 border-y border-white/5 mb-5 text-xs">
                            <div class="text-gray-400">
                                Anggota: <span class="font-bold text-white ml-1">4 Akun</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-[#C7FF3D]/20 border-2 border-[#151515] flex items-center justify-center text-[10px] font-bold text-[#C7FF3D]">A</div>
                                <div class="w-7 h-7 rounded-full bg-[#202020] border-2 border-[#151515] flex items-center justify-center text-[10px] text-gray-300">D</div>
                                <div class="w-7 h-7 rounded-full bg-[#1a1a1a] border-2 border-[#151515] flex items-center justify-center text-[9px] text-gray-400">+2</div>
                            </div>
                        </div>

                        <!-- Permissions Progress -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center text-xs mb-1.5">
                                <span class="text-gray-400 font-medium">Cakupan Izin</span>
                                <span class="text-[#C7FF3D] font-bold">24 / 24 (100%)</span>
                            </div>
                            <div class="w-full bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <!-- Permission Tags -->
                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Full Control</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">User Management</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">DB Migrations</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Access Settings</span>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <a href="{{ url('/user/management') }}" class="text-xs text-gray-400 hover:text-white transition flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-users text-[11px]"></i> Lihat Anggota
                        </a>
                        <a href="{{ url('/admin/permissions') }}" class="text-xs text-[#C7FF3D] hover:underline font-semibold flex items-center gap-1">
                            <span>Matriks Izin</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Role Card 2: Project Manager -->
                <div class="role-card bg-[#151515] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-purple-500/50 transition group relative overflow-hidden"
                    data-role-name="Project Manager" data-role-type="custom" data-role-desc="membuat proyek baru sprint tugas task assignments deadline alokasi tim">
                    <div class="absolute -top-10 -right-10 w-28 h-28 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition pointer-events-none"></div>

                    <div>
                        <!-- Top Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-400 text-lg">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-purple-500/10 text-purple-400 border border-purple-500/20 uppercase tracking-wider">
                                Manajemen
                            </span>
                        </div>

                        <!-- Role Info -->
                        <h3 class="text-lg font-bold text-white mb-1.5">Project Manager</h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-5">
                            Membuat proyek baru, mengatur alokasi tim, membagi tugas (*task assignments*), serta memantau deadline pengerjaan.
                        </p>

                        <!-- Members Count & Avatars -->
                        <div class="flex items-center justify-between py-3 border-y border-white/5 mb-5 text-xs">
                            <div class="text-gray-400">
                                Anggota: <span class="font-bold text-white ml-1">8 Akun</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-purple-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] font-bold text-purple-300">B</div>
                                <div class="w-7 h-7 rounded-full bg-blue-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] text-blue-300">R</div>
                                <div class="w-7 h-7 rounded-full bg-[#1a1a1a] border-2 border-[#151515] flex items-center justify-center text-[9px] text-gray-400">+6</div>
                            </div>
                        </div>

                        <!-- Permissions Progress -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center text-xs mb-1.5">
                                <span class="text-gray-400 font-medium">Cakupan Izin</span>
                                <span class="text-purple-400 font-bold">19 / 24 (79%)</span>
                            </div>
                            <div class="w-full bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-purple-500 h-1.5 rounded-full" style="width: 79%"></div>
                            </div>
                        </div>

                        <!-- Permission Tags -->
                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Create Projects</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Assign Tasks</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Manage Team</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Reports</span>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <button type="button" class="text-xs text-gray-400 hover:text-white transition flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-pen-to-square text-[11px]"></i> Edit Role
                        </button>
                        <a href="{{ url('/admin/permissions') }}" class="text-xs text-purple-400 hover:underline font-semibold flex items-center gap-1">
                            <span>Atur Izin</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Role Card 3: Developer -->
                <div class="role-card bg-[#151515] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-blue-500/50 transition group relative overflow-hidden"
                    data-role-name="Developer" data-role-type="custom" data-role-desc="mengerjakan task proyek kanban board komentar teknis log work">
                    <div class="absolute -top-10 -right-10 w-28 h-28 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition pointer-events-none"></div>

                    <div>
                        <!-- Top Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 rounded-xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center text-blue-400 text-lg">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/20 uppercase tracking-wider">
                                Tim Teknis
                            </span>
                        </div>

                        <!-- Role Info -->
                        <h3 class="text-lg font-bold text-white mb-1.5">Developer</h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-5">
                            Mengerjakan task proyek, memindahkan kartu status kanban board (*To Do → In Progress → Done*), dan menulis komentar teknis.
                        </p>

                        <!-- Members Count & Avatars -->
                        <div class="flex items-center justify-between py-3 border-y border-white/5 mb-5 text-xs">
                            <div class="text-gray-400">
                                Anggota: <span class="font-bold text-white ml-1">84 Akun</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-blue-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] font-bold text-blue-300">A</div>
                                <div class="w-7 h-7 rounded-full bg-emerald-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] text-emerald-300">F</div>
                                <div class="w-7 h-7 rounded-full bg-[#1a1a1a] border-2 border-[#151515] flex items-center justify-center text-[9px] text-gray-400">+82</div>
                            </div>
                        </div>

                        <!-- Permissions Progress -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center text-xs mb-1.5">
                                <span class="text-gray-400 font-medium">Cakupan Izin</span>
                                <span class="text-blue-400 font-bold">12 / 24 (50%)</span>
                            </div>
                            <div class="w-full bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>

                        <!-- Permission Tags -->
                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">View Board</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Update Task</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Add Comments</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Log Work</span>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <button type="button" class="text-xs text-gray-400 hover:text-white transition flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-pen-to-square text-[11px]"></i> Edit Role
                        </button>
                        <a href="{{ url('/admin/permissions') }}" class="text-xs text-blue-400 hover:underline font-semibold flex items-center gap-1">
                            <span>Atur Izin</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Role Card 4: UI/UX Designer -->
                <div class="role-card bg-[#151515] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-pink-500/50 transition group relative overflow-hidden"
                    data-role-name="UI/UX Designer" data-role-type="custom" data-role-desc="merancang mockup antarmuka wireframe prototype aset desain review">
                    <div class="absolute -top-10 -right-10 w-28 h-28 bg-pink-500/10 rounded-full blur-2xl group-hover:bg-pink-500/20 transition pointer-events-none"></div>

                    <div>
                        <!-- Top Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 rounded-xl bg-pink-500/15 border border-pink-500/30 flex items-center justify-center text-pink-400 text-lg">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-pink-500/10 text-pink-400 border border-pink-500/20 uppercase tracking-wider">
                                Desain
                            </span>
                        </div>

                        <!-- Role Info -->
                        <h3 class="text-lg font-bold text-white mb-1.5">UI/UX Designer</h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-5">
                            Merancang mockup antarmuka, mengunggah wireframe/prototype aset desain, serta memandu review tampilan aplikasi.
                        </p>

                        <!-- Members Count & Avatars -->
                        <div class="flex items-center justify-between py-3 border-y border-white/5 mb-5 text-xs">
                            <div class="text-gray-400">
                                Anggota: <span class="font-bold text-white ml-1">24 Akun</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-pink-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] font-bold text-pink-300">S</div>
                                <div class="w-7 h-7 rounded-full bg-amber-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] text-amber-300">N</div>
                                <div class="w-7 h-7 rounded-full bg-[#1a1a1a] border-2 border-[#151515] flex items-center justify-center text-[9px] text-gray-400">+22</div>
                            </div>
                        </div>

                        <!-- Permissions Progress -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center text-xs mb-1.5">
                                <span class="text-gray-400 font-medium">Cakupan Izin</span>
                                <span class="text-pink-400 font-bold">11 / 24 (45%)</span>
                            </div>
                            <div class="w-full bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-pink-500 h-1.5 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>

                        <!-- Permission Tags -->
                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">View Board</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Upload Assets</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Add Comments</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Design Review</span>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <button type="button" class="text-xs text-gray-400 hover:text-white transition flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-pen-to-square text-[11px]"></i> Edit Role
                        </button>
                        <a href="{{ url('/admin/permissions') }}" class="text-xs text-pink-400 hover:underline font-semibold flex items-center gap-1">
                            <span>Atur Izin</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Role Card 5: Viewer -->
                <div class="role-card bg-[#151515] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-emerald-500/50 transition group relative overflow-hidden"
                    data-role-name="Viewer Klien" data-role-type="custom" data-role-desc="akses pemantau read-only stakeholder laporan progres progress timeline">
                    <div class="absolute -top-10 -right-10 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition pointer-events-none"></div>

                    <div>
                        <!-- Top Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-lg">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase tracking-wider">
                                Read Only
                            </span>
                        </div>

                        <!-- Role Info -->
                        <h3 class="text-lg font-bold text-white mb-1.5">Viewer / Klien</h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-5">
                            Akses pemantau (*read-only*) untuk stakeholder proyek guna mengecek laporan progres tanpa wewenang mengubah data atau status.
                        </p>

                        <!-- Members Count & Avatars -->
                        <div class="flex items-center justify-between py-3 border-y border-white/5 mb-5 text-xs">
                            <div class="text-gray-400">
                                Anggota: <span class="font-bold text-white ml-1">8 Akun</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-emerald-500/20 border-2 border-[#151515] flex items-center justify-center text-[10px] font-bold text-emerald-300">K</div>
                                <div class="w-7 h-7 rounded-full bg-gray-600/30 border-2 border-[#151515] flex items-center justify-center text-[10px] text-gray-300">P</div>
                                <div class="w-7 h-7 rounded-full bg-[#1a1a1a] border-2 border-[#151515] flex items-center justify-center text-[9px] text-gray-400">+6</div>
                            </div>
                        </div>

                        <!-- Permissions Progress -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center text-xs mb-1.5">
                                <span class="text-gray-400 font-medium">Cakupan Izin</span>
                                <span class="text-emerald-400 font-bold">4 / 24 (16%)</span>
                            </div>
                            <div class="w-full bg-[#202020] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 16%"></div>
                            </div>
                        </div>

                        <!-- Permission Tags -->
                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">View Projects</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">View Board</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-[#1a1a1a] text-gray-300 border border-white/5">Activity Feed</span>
                        </div>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <button type="button" class="text-xs text-gray-400 hover:text-white transition flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-pen-to-square text-[11px]"></i> Edit Role
                        </button>
                        <a href="{{ url('/admin/permissions') }}" class="text-xs text-emerald-400 hover:underline font-semibold flex items-center gap-1">
                            <span>Atur Izin</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Add New Role Action Card -->
                <div onclick="openAddRoleModal()" class="border-2 border-dashed border-white/15 hover:border-[#C7FF3D]/60 rounded-2xl p-6 flex flex-col items-center justify-center text-center cursor-pointer group bg-[#151515]/40 hover:bg-[#151515] transition min-h-[350px]">
                    <div class="w-14 h-14 rounded-2xl bg-[#1a1a1a] group-hover:bg-[#C7FF3D] border border-white/10 group-hover:border-[#C7FF3D] flex items-center justify-center text-gray-400 group-hover:text-black text-xl transition-all duration-300 mb-4 group-hover:scale-110 shadow-lg">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2 group-hover:text-[#C7FF3D] transition">Buat Role Kustom Baru</h3>
                    <p class="text-xs text-gray-400 max-w-[220px] leading-relaxed mb-4">
                        Tambahkan peran baru (seperti QA Tester, Product Owner, DevOps) dan sesuaikan wewenang khususnya.
                    </p>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#C7FF3D] bg-[#C7FF3D]/10 px-3 py-1.5 rounded-xl border border-[#C7FF3D]/20">
                        <i class="fa-solid fa-wand-magic-sparkles text-[10px]"></i> Mulai Buat
                    </span>
                </div>

            </div>

        </div>

        <!-- Modal Tambah Role Baru (Mock UI) -->
        <div id="addRoleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm hidden p-4">
            <div class="bg-[#151515] border border-white/10 rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl relative transform transition-all">
                
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-[#C7FF3D]/15 border border-[#C7FF3D]/30 flex items-center justify-center text-[#C7FF3D] text-xs">
                            <i class="fa-solid fa-user-tag"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Buat Role Kustom Baru</h3>
                            <p class="text-[11px] text-gray-400">Definisikan nama jabatan dan wewenang peran baru</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeAddRoleModal()" class="w-7 h-7 rounded-lg bg-[#1a1a1a] text-gray-400 hover:text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>

                <!-- Modal Body / Form -->
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Nama Role</label>
                        <input type="text" placeholder="misal: QA Tester, DevOps Engineer"
                            class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Kode Role / Slug</label>
                            <input type="text" placeholder="misal: qa_tester"
                                class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition font-mono">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Salin Template Izin Dari</label>
                            <select class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                                <option value="developer">Developer (Standar)</option>
                                <option value="pm">Project Manager</option>
                                <option value="viewer">Viewer (Read Only)</option>
                                <option value="empty">Kosong (Atur Manual Nanti)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Deskripsi Tanggung Jawab Role</label>
                        <textarea rows="3" placeholder="Tuliskan tugas dan tanggung jawab utama posisi ini di ItensFlow..."
                            class="w-full bg-[#1a1a1a] border border-white/10 rounded-xl p-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Warna Aksen Badge</label>
                        <div class="flex items-center gap-3">
                            <label class="flex items-center gap-2 text-xs text-gray-300 cursor-pointer">
                                <input type="radio" name="badge_color" checked class="text-[#C7FF3D] focus:ring-0">
                                <span class="w-3.5 h-3.5 rounded-full bg-[#C7FF3D]"></span> Neon
                            </label>
                            <label class="flex items-center gap-2 text-xs text-gray-300 cursor-pointer">
                                <input type="radio" name="badge_color" class="text-purple-500 focus:ring-0">
                                <span class="w-3.5 h-3.5 rounded-full bg-purple-500"></span> Ungu
                            </label>
                            <label class="flex items-center gap-2 text-xs text-gray-300 cursor-pointer">
                                <input type="radio" name="badge_color" class="text-blue-500 focus:ring-0">
                                <span class="w-3.5 h-3.5 rounded-full bg-blue-500"></span> Biru
                            </label>
                            <label class="flex items-center gap-2 text-xs text-gray-300 cursor-pointer">
                                <input type="radio" name="badge_color" class="text-pink-500 focus:ring-0">
                                <span class="w-3.5 h-3.5 rounded-full bg-pink-500"></span> Pink
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-[#1a1a1a]/80 border-t border-white/10 flex items-center justify-end gap-2.5">
                    <button type="button" onclick="closeAddRoleModal()" class="px-4 py-2 rounded-xl bg-transparent hover:bg-white/5 text-xs text-gray-400 hover:text-white transition">
                        Batal
                    </button>
                    <button type="button" onclick="closeAddRoleModal()" class="px-4 py-2 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        Simpan Role Baru
                    </button>
                </div>

            </div>
        </div>

    </main>

    <script>
        /* ── Filter Role Cards Logic ── */
        function filterRoleCards() {
            const searchVal = (document.getElementById('roleHeaderSearch')?.value || '').toLowerCase().trim();
            const typeVal = document.getElementById('roleTypeFilter')?.value || '';

            const cards = document.querySelectorAll('.role-card');
            cards.forEach(card => {
                const name = (card.getAttribute('data-role-name') || '').toLowerCase();
                const desc = (card.getAttribute('data-role-desc') || '').toLowerCase();
                const type = card.getAttribute('data-role-type') || '';

                const matchSearch = !searchVal || name.includes(searchVal) || desc.includes(searchVal);
                const matchType = !typeVal || type === typeVal;

                if (matchSearch && matchType) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function resetRoleFilter() {
            const filter = document.getElementById('roleTypeFilter');
            const search = document.getElementById('roleHeaderSearch');
            if (filter) filter.value = '';
            if (search) search.value = '';
            filterRoleCards();
        }

        /* ── Modal Tambah Role ── */
        function openAddRoleModal() {
            const modal = document.getElementById('addRoleModal');
            if (modal) modal.classList.remove('hidden');
        }
        function closeAddRoleModal() {
            const modal = document.getElementById('addRoleModal');
            if (modal) modal.classList.add('hidden');
        }

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
