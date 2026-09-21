<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Dashboard</title>

    <!-- Script Deteksi Tema (Mencegah Layar Kedip saat Reload/Pindah Halaman) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-glow {
            background-color: #000000;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.3) 0%, transparent 30%);
            radial-gradient(circle at 50% 50%, rgba(199, 255, 61, 0.15) 0%, transparent 60%);
        }

        .bg-neon {
            background-color: #C7FF3D;
        }

        .text-neon {
            color: #C7FF3D;
        }

        .border-neon {
            border-color: #C7FF3D;
        }
    </style>

</head>

<body class="flex h-screen overflow-hidden bg-[#080808] font-sans">
    <!-- BACKDROP GELAP -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm" onclick="toggleSidebar()">
    </div>
    <!-- SIDEBAR PERSIS ITENSFLOW -->
    <aside id="sidebar" class="fixed lg:relative inset-y-0 left-0 z-50 w-[200px] md:w-56 bg-[#080808] text-white flex flex-col p-5 shadow-lg border-r border-white/10 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <!-- LOGO & BRAND (ItensFlow) -->
        <div class="flex items-center gap-3 mx-4 px-0 md:px-4 pb-4 mb-4 border-b border-white/30">
            <div class="w-8 h-8 rounded-[9px] flex items-center justify-center shrink-0">
                <img src="{{ asset('images/logo_itenas.png') }}" alt="ItensFlow Logo" class="w-8 h-8 rounded-[9px]">
            </div>
            <h2 class="text-md font-bold text-white tracking-wide">
                ItensFlow
            </h2>
        </div>

        <!-- DAFTAR MENU NAVIGASI -->
        <ul class="space-y-1 flex-1 mt-1">
            <li>
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-chart-line text-sm w-5 text-center"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-regular fa-folder text-sm w-5 text-center"></i>
                    <span class="text-sm">Projects</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-table-columns text-sm w-5 text-center"></i>
                    <span class="text-sm">Boards</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-regular fa-square-check text-sm w-5 text-center"></i>
                    <span class="text-sm">Tasks</span>
                </a>
            </li>

            <li>
                <!-- MENU TEAM (SEDANG AKTIF) -->
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a] transition duration-200">
                    <i class="fa-solid fa-user-group text-sm w-5 text-center"></i>
                    <span class="text-sm">Team</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/setting') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
                    <i class="fa-solid fa-gear text-sm w-5 text-center"></i>
                    <span class="text-sm">Settings</span>
                </a>
            </li>
        </ul>
    </aside>
    <!--MAIN CONTENT-->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gradient-glow">
        <!-- HEADER -->
        <header class="flex items-center justify-between py-3 sm:py-4 mb-4 border-b border-white/10 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">
            <!-- SEARCH BAR MENU -->
            <div class="flex items-center gap-3 flex-1">
                <!-- TOMBOL HAMBURGER -->
                <button onclick="toggleSidebar()" class="lg:hidden w-8 h-8 flex items-center justify-center rounded-xl bg-[#151515] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] transition">
                    <i class="fa-solid fa-bars text-xs"></i>
                </button>
                <!-- SEARCH BAR -->
                <div class="flex items-center gap-3 flex-1">
                    <div class="relative w-full max-w-[150px] md:max-w-[280px] lg:max-w-xs xl:max-w-sm">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-xs"></i>
                        <input type="text" placeholder="search anything, task, issues..." class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
                    </div>
                </div>
                <!-- RIGHT ACTION -->
                <div class="flex items-center gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                        <i class="fa-regular fa-bell text-sm"></i>
                    </button>
                    <a href="{{ url('/setting') }}" class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                        <i class="fa-solid fa-gear text-sm"></i>
                    </a>
                    <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border border-white/10 text-gray-400 hover:text-white hover:bg[#1a1a1a] relative transition">
                        <i class="fa-regular fa-user text-sm"></i>
                    </button>
                </div>
        </header>
        <!-- SUB HEADER (JUDUL TEAMS & TOMBOL CREATE TEAM) -->
        <div class="flex items-center justify-between px-8 pt-6 pb-2">
            <h1 class="text-2xl font-bold text-white tracking-tight">Teams</h1>
            <button onclick="openmodal()" class="bg-neon text-black font-semibold text-xs px-4 py-2 rounded-lg hover:opacity-90 transition shadow-sm">
                Create Team
            </button>
        </div>
        <main class="flex-1 overflow-y-auto p-8">
            <div class="flex flex-col items-center justify-center h-full text-center max-w-lg mx-auto">
                <div class="relative mb-6">
                    <div class="w-32 h-32 bg-gray-200 dark:bg-[#1a211d] rounded-3xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-users text-5xl text-gray-500 dark:text-gray-400"></i>
                    </div>
                    <div class="absolute -bottom-2 right-2 w-10 h-10 bg-neon rounded-full flex items-center justify-center text-black font-bold shadow-md border-4 border-gray-50 dark:border-[#0e100f]">
                        <i class="fa-solid fa-plus text-sm"></i>
                    </div>
                </div>
                <!-- JUDUL -->
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    Bring everyone into one team
                </h2>
                <!-- DESKRIIPSI -->
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-8 max-w-sm leading-relaxed">
                    Don't go it alone-create a team to start connecting work across apps and celebrating your collective success.
                </p>
                <!-- TOMBOL -->
                <button onclick="openmodal()" class="bg-neon text-black font-semibold text-sm px-6 py-2.5 rounded-xl hover:opacity-90 transition shadoww-sm">
                    Create Team
                </button>
            </div>
        </main>
        <!-- MODAL POP UP -->
        <div id="createTeamModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
            <!-- KOTAK KARTU MODAL -->
            <div class="bg-[#121614] border border-[#232d27] w-full max-w-lg rounded-2xl p-7 shadow-2xl relative text-left">
                <!-- HEADER MODAL -->
                <div class="flex items-center gap-3 mb-1">
                    <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-white transition">
                        <i class="fa-solid fa-arrow-left text-sm"></i>
                    </button>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-users text-white text-base"></i>
                        <h3 class="text-lg font-bold text-white tracking-wide">Team</h3>
                    </div>
                </div>
                <!-- SUBTITLE REQUIRED FIELDS -->
                <p class="text-[11px] text-gray-400 mb-5 ml-7">
                    Required fields are marked with an arterisk
                    <span class="text-red-500"></span>
                </p>
                <!-- FORM FIELDS -->
                <div class="border-t border-[#1f2622] pt-5 space-y-4">
                    <!-- INPUT NAMA TIM -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Name<span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Enter team name" class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl px-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                    </div>
                    <!-- INPUT ADD TEAM MEMBER -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">
                            Add team members <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Type name or email address..." class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl px-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                    </div>
                    <!-- CAPTHA & PRIVACY NOTICE -->
                    <p class="text-[10px] text-gray-500 leading-relaxed pt-1">
                        This site is protected by reCAPTHA and teh google
                        <a href="#" class="text-[#C7FF3D] hover:underline">Privacy Policy</a> and
                        <a href="#" class="text-[#C7FF3D] hover:underline">Terms of service</a> appply.
                    </p>
                    <!-- TOMBOL AKSI -->
                    <div class="flex justify-end items-center gap-3 pt-4 border-t border-[#1f2622]">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-xs font-semibold text-white hover:bg-white/5 rounded-xl transition cursor-pointer">
                            Cancel
                        </button>
                        <button type="button" class="px-5 py-2 text-xs font-bold bg-[#C7FF3D] text-black rounded-xl hover:bg-[#b8f52e] transition shadow-sm cursor-pointer">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebar-backdrop');
                sidebar.classList.toggle('-translate-x-full');
                backdrop.classList.toggle('hidden');
            }

            function openmodal() {
                const modal = document.getElementById('createTeamModal');
                modal.classList.remove('hidden');
            }

            function closeModal() {
                const modal = document.getElementById('createTeamModal');
                modal.classList.add('hidden');
            }
        </script>
</body>

</html>