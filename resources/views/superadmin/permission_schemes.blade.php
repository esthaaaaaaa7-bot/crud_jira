<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ItensFlow - Permission Matrix</title>
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

        /* Toggle switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 38px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #262626;
            transition: .3s;
            border-radius: 34px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 2px;
            bottom: 2px;
            background-color: #888888;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: rgba(199, 255, 61, 0.2);
            border-color: #C7FF3D;
        }

        input:checked + .slider:before {
            transform: translateX(18px);
            background-color: #C7FF3D;
        }

        input:disabled + .slider {
            opacity: 0.6;
            cursor: not-allowed;
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
                    <input type="text" placeholder="Search permissions, modules, keys..."
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
        <div class="space-y-6 pb-12">

            <!-- Welcome & Header Action -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Permission Matrix</h1>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#C7FF3D]/10 text-[#C7FF3D] border border-[#C7FF3D]/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C7FF3D]"></span>
                            16 Izin Aktif
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-400">Atur hak akses (*granular permissions*) untuk setiap peran di ItensFlow secara langsung.</p>
                </div>

                <div class="flex items-center gap-2.5">
                    <a href="{{ url('/admin/roles') }}" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-[#151515] border border-white/10 text-xs font-semibold text-gray-300 hover:text-white hover:bg-[#1a1a1a] transition">
                        <i class="fa-solid fa-arrow-left text-xs text-gray-400"></i>
                        <span>Kembali ke Roles</span>
                    </a>
                    <button type="button" onclick="showSaveToast()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        <span>Simpan Perubahan Matriks</span>
                    </button>
                </div>
            </div>

            <!-- Permission Matrix Table Card -->
            <div class="bg-[#151515] border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a1a1a] border-b border-white/10 text-xs text-gray-300">
                                <th class="py-4 px-6 font-bold uppercase tracking-wider text-[11px] text-gray-400 w-1/3 min-w-[280px]">
                                    Modul & Wewenang Fitur
                                </th>
                                <th class="py-4 px-4 text-center min-w-[110px]">
                                    <div class="flex flex-col items-center">
                                        <span class="text-xs font-bold text-[#C7FF3D]">Super Admin</span>
                                        <span class="text-[10px] text-gray-400">Locked / Full</span>
                                    </div>
                                </th>
                                <th class="py-4 px-4 text-center min-w-[110px]">
                                    <div class="flex flex-col items-center">
                                        <span class="text-xs font-bold text-purple-400">Project Manager</span>
                                        <span class="text-[10px] text-gray-400">19 Izin</span>
                                    </div>
                                </th>
                                <th class="py-4 px-4 text-center min-w-[110px]">
                                    <div class="flex flex-col items-center">
                                        <span class="text-xs font-bold text-blue-400">Developer</span>
                                        <span class="text-[10px] text-gray-400">12 Izin</span>
                                    </div>
                                </th>
                                <th class="py-4 px-4 text-center min-w-[110px]">
                                    <div class="flex flex-col items-center">
                                        <span class="text-xs font-bold text-pink-400">UI/UX Designer</span>
                                        <span class="text-[10px] text-gray-400">11 Izin</span>
                                    </div>
                                </th>
                                <th class="py-4 px-4 text-center min-w-[110px]">
                                    <div class="flex flex-col items-center">
                                        <span class="text-xs font-bold text-emerald-400">Viewer / Klien</span>
                                        <span class="text-[10px] text-gray-400">4 Izin</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-white/5 text-xs">

                            <!-- GROUP 1: MANAJEMEN PROYEK -->
                            <tr class="bg-[#121212]/80 font-bold text-gray-300 border-t border-b border-white/10">
                                <td colspan="6" class="py-2.5 px-6 text-[11px] uppercase tracking-wider text-[#C7FF3D] flex items-center gap-2">
                                    <i class="fa-solid fa-folder-tree text-xs"></i> 1. Modul Manajemen Proyek
                                </td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Membuat Proyek Baru</p>
                                    <p class="text-[11px] text-gray-400">Dapat menginisiasi workspace proyek baru & menentukan nama repositori.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Mengubah Detail Proyek</p>
                                    <p class="text-[11px] text-gray-400">Mengedit deskripsi, tanggal target selesai, dan status proyek.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Menghapus Proyek Permanen</p>
                                    <p class="text-[11px] text-gray-400">Menghapus seluruh proyek beserta database task dan board terkait.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <!-- GROUP 2: TUGAS & KANBAN BOARD -->
                            <tr class="bg-[#121212]/80 font-bold text-gray-300 border-t border-b border-white/10">
                                <td colspan="6" class="py-2.5 px-6 text-[11px] uppercase tracking-wider text-[#C7FF3D] flex items-center gap-2">
                                    <i class="fa-solid fa-table-columns text-xs"></i> 2. Modul Tugas & Kanban Board
                                </td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Membuat Task Baru</p>
                                    <p class="text-[11px] text-gray-400">Menambahkan kartu issue baru pada kanban board proyek.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Menggeser Status Kolom Board</p>
                                    <p class="text-[11px] text-gray-400">Drag & drop task antar kolom status (To Do, In Progress, Review, Done).</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Menugaskan Task (Assignee)</p>
                                    <p class="text-[11px] text-gray-400">Menetapkan anggota pelaksana pada suatu task.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Memberi Komentar & Log Diskusi</p>
                                    <p class="text-[11px] text-gray-400">Menulis catatan perkembangan, saran, atau pertanyaan di halaman detail task.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <!-- GROUP 3: TIM & KOLABORASI -->
                            <tr class="bg-[#121212]/80 font-bold text-gray-300 border-t border-b border-white/10">
                                <td colspan="6" class="py-2.5 px-6 text-[11px] uppercase tracking-wider text-[#C7FF3D] flex items-center gap-2">
                                    <i class="fa-solid fa-users-gear text-xs"></i> 3. Modul Tim & Kolaborasi
                                </td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Mengundang Anggota ke Proyek</p>
                                    <p class="text-[11px] text-gray-400">Menambahkan anggota tim baru ke dalam daftar kolaborator proyek.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Mengeluarkan Anggota dari Tim</p>
                                    <p class="text-[11px] text-gray-400">Mencabut akses anggota proyek tertentu.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <!-- GROUP 4: SISTEM & ACCESS CONTROL -->
                            <tr class="bg-[#121212]/80 font-bold text-gray-300 border-t border-b border-white/10">
                                <td colspan="6" class="py-2.5 px-6 text-[11px] uppercase tracking-wider text-[#C7FF3D] flex items-center gap-2">
                                    <i class="fa-solid fa-shield-halved text-xs"></i> 4. Modul Sistem & Access Control (Super Admin)
                                </td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Akses Dashboard Superadmin</p>
                                    <p class="text-[11px] text-gray-400">Membuka menu konsol Super Admin & statistik global sistem.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Mengelola Akun Pengguna (User Management)</p>
                                    <p class="text-[11px] text-gray-400">Membuat akun baru, mereset password, dan menonaktifkan pengguna.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-3.5 px-6">
                                    <p class="font-semibold text-white">Mengatur Role & Matriks Izin</p>
                                    <p class="text-[11px] text-gray-400">Membuat peran baru dan mengubah konfigurasi permission.</p>
                                </td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                                <td class="py-3.5 px-4 text-center"><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Footer Save Action Bar -->
                <div class="p-4 bg-[#1a1a1a]/80 border-t border-white/10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-xs text-gray-400">
                        <i class="fa-solid fa-circle-info text-[#C7FF3D] mr-1"></i>
                        Perubahan izin akan langsung berdampak pada akun user yang menyandang role terkait saat sesi login berikutnya.
                    </p>
                    <button type="button" onclick="showSaveToast()" class="px-5 py-2.5 rounded-xl bg-[#C7FF3D] text-black text-xs font-bold hover:bg-[#b0f024] transition shadow-lg shadow-[#C7FF3D]/10">
                        Simpan Perubahan Matriks
                    </button>
                </div>
            </div>

        </div>

    </main>

    <!-- Success Toast Notification -->
    <div id="saveToast" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#151515] border border-[#C7FF3D]/40 rounded-2xl px-5 py-3.5 shadow-2xl flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-[#C7FF3D]/20 text-[#C7FF3D] flex items-center justify-center text-sm">
                <i class="fa-solid fa-check"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-white">Matriks Izin Berhasil Disimpan!</p>
                <p class="text-[11px] text-gray-400">Pengaturan permission baru telah diperbarui.</p>
            </div>
        </div>
    </div>

    <script>
        /* ── Toast Notification ── */
        function showSaveToast() {
            const toast = document.getElementById('saveToast');
            if (toast) {
                toast.classList.remove('translate-y-24', 'opacity-0');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0');
                }, 3000);
            }
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
