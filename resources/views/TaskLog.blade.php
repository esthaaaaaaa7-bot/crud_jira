<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Task Log</title>
    
    <!-- Fonts & Icons -->
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
        body { font-family: 'Inter', sans-serif; }
        .bg-gradient-glow {
            background-color: #000000;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.25) 0%, transparent 35%),
                radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.2) 0%, transparent 35%),
                radial-gradient(circle at 50% 50%, rgba(199, 255, 61, 0.1) 0%, transparent 60%);
        }
        .custom-scroll::-webkit-scrollbar { width: 6px; }
        .custom-scroll::-webkit-scrollbar-track { background: #111; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #2a2a2a; border-radius: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb:hover { background: #C7FF3D; }
    </style>
</head>

<body class="flex h-screen overflow-hidden bg-[#080808] text-gray-200 font-sans">

    <!-- BACKDROP MOBILE -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR ITENSFLOW -->
    <aside id="sidebar" class="fixed lg:relative inset-y-0 left-0 z-50 w-[200px] md:w-56 bg-[#080808] text-white flex flex-col p-5 shadow-lg border-r border-white/10 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
        
                <!-- LOGO --> 
        <div class="flex items-center gap-3 mx-4 px-0 md:px-4 pb-4 mb-4 mt-0 border-b border-white/30">
            <div class="w-8 h-8 rounded-[9px] flex items-center justify-center shrink-0">
                <img src="{{ asset('images/logo_itenas.png') }}" alt="ProSite Logo" class="w-8 h-8 rounded-[9px]">
            </div>
            <h2 class="text-md font-bold text-white tracking-wide">
                ItensFlow 
            </h2>
        </div>

        <!-- MENU -->
        <ul class="space-y-1 flex-1 mt-1">
            <li>
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition">
                    <i class="fa-solid fa-chart-line text-sm w-5 text-center"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition">
                    <i class="fa-regular fa-folder text-sm w-5 text-center"></i>
                    <span class="text-sm">Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/board') }}" class="active-nav flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a] transition">
                    <i class="fa-solid fa-table-columns text-sm w-5 text-center"></i>
                    <span class="text-sm">Boards</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition">
                    <i class="fa-solid fa-user-group text-sm w-5 text-center"></i>
                    <span class="text-sm">Team</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/setting') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition mt-2">
                    <i class="fa-solid fa-gear text-sm w-5 text-center"></i>
                    <span class="text-sm">Settings</span>
                </a>
            </li>
        </ul>
    </aside>

        <!-- MAIN CONTENT AREA (SAMA PERSIS STRUKTUR BOARD) -->
    <main class="flex-1 p-8 pt-0 overflow-y-auto bg-gradient-glow custom-scroll">
        <!-- TOP NAVBAR / BREADCRUMB -->
        <header class="flex items-center justify-between py-3 sm:py-4 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">
    
    <!-- KIRI: BURGER MENU MOBILE & BREADCRUMB -->
    <div class="flex items-center gap-6 sm:gap-2">
        <!-- Tombol Burger Mobile -->
        <button onclick="toggleSidebar()" 
            class="lg:hidden w-8 h-8 -ml-3 flex items-center justify-center rounded-xl 
            bg-[#151515] border border-white/10 text-gray-400 
            hover:text-white hover:bg-[#1a1a1a] transition">
            <i class="fa-solid fa-bars text-xs"></i>
        </button>

                    <!-- Breadcrumb Navigasi (Ukuran text-base persis seperti di Board) -->
        <div class="flex items-center gap-2"> 
            <!-- 1. Board -->
            <a href="{{ url('/board') }}" class="text-white hover:text-[#C7FF3D] text-base mx-1 sm:mx-2 transition flex items-center gap-1.5 font-medium cursor-pointer">
                <i class="fa-solid fa-arrow-left text-xs text-[#C7FF3D]"></i> Board
            </a>
            <p class="text-white/40 text-base rotate-90 sm:rotate-0">&#8250;</p>

            <!-- 2. Project Board -->
            <a href="{{ request('project_id') ? url('/projects/' . request('project_id')) : 'javascript:history.back()' }}" class="text-white hover:text-[#C7FF3D] text-base transition flex items-center font-medium cursor-pointer">
                {{ request('project', 'Project Board') }}
            </a>
            <p class="text-white/40 text-base rotate-90 sm:rotate-0">&#8250;</p>

            <!-- 3. Task Log -->
            <p class="text-[#C7FF3D] text-base font-semibold">
                Task Log
            </p>
        </div>
    </div>

    <!-- KANAN: ICONS & PROFIL DROPDOWN -->
    <div class="flex items-center -mr-4 gap-2">
        <!-- Lonceng Notifikasi -->
        <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                        border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
            <i class="fa-regular fa-bell text-sm"></i>
        </button>

        <!-- Toggle Mode Terang/Gelap (Matahari / Bulan) -->
        <button onclick="toggleTheme()" class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                        border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
            <i id="theme-icon" class="fa-regular fa-sun text-sm"></i>
        </button>

        <!-- User Profile Dropdown -->
        <div class="relative" id="profileDropdownContainer">
            <button id="profileDropdownBtn" onclick="toggleProfileDropdown(event)" type="button" class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition cursor-pointer">
                <i class="fa-regular fa-user text-sm"></i>
            </button>

            <!-- Menu Dropdown Pop-up -->
            <div id="profileDropdownMenu" class="hidden absolute right-0 mt-2 w-56 bg-[#151515] border border-white/10 rounded-2xl shadow-2xl p-2 z-50 transition-all">
                <!-- Info Akun User Login -->
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

                <!-- Menu Link Settings -->
                <div class="py-1 space-y-0.5">
                    <a href="{{ url('/setting') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-gray-300 hover:text-white hover:bg-white/5 transition">
                        <i class="fa-solid fa-gear text-xs text-gray-400 w-4 text-center"></i>
                        <span>Settings</span>
                    </a>
                </div>

                <!-- Tombol Logout -->
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

        <!--  KONTEN TASK LOG (SCROLLABLE) -->
        <main class="flex-1 overflow-y-auto custom-scroll p-6 lg:p-8">
            <div class="max-w-7xl mx-auto space-y-6">
                <!-- TOOLBAR ATAS : STATUS, SHARE, ACTIONS -->
                <div class="flex flex-wrap items-center justify-between gap-4 pb-2">
                    <!-- KIRI: EPIC & TASK KEY -->
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <span class="hover:text-white cursor-pointer transition">Add epic</span>
                        <span>/</span>
                        <div class="flex items-center gap-1.5 text-emerald-400 font-semibold bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/20">
                            <i class="fa-solid fa-square-check text-xs"></i>
                            <span>{{ request('key', 'TI-1') }}</span>
                        </div>
                    </div>
                    <!-- KANAN: ICONS & STATUS BUTTONS -->
                    <div class="flex items-center gap-2">
                        <!-- LOCK, EYE, SHARE, MORE, CLOSE -->
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hopver:text-white hover:bg-white/5 transition">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </button>
                    <button class="h-8 px-2.5 flex items-center gap-1.5 rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition text-xs">
                        <i class="fa-regular fa-eye text-xs"></i>
                        <span>2</span>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
                        <i class="fa-solid fa-share-nodes text-xs"></i>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
                        <i class="fa-solid fa-ellipsis text-xs"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
                            <i class="fa-solid fa-expand text-xs"></i>
                        </button>
                        <a href="javascript:history.back()" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition cursor-pointer">
                        <i class="fa-solid fa-xmark text-sm"></i>
                           </a> 
                        <div class="h-5 w-[1px] bg-white/10 mx-1"></div>
                                                                        @php
                            $statusParam = request('status', 'In Progress');
                            $statusConfig = [
                                'To Do'       => 'bg-[#22272b] border-[#343d46] text-gray-300',
                                'In Progress' => 'bg-[#1c2c4c] border-[#234273] text-[#579dff]',
                                'Review'      => 'bg-[#2e223d] border-[#4e356b] text-purple-400',
                                'Done'        => 'bg-[#143228] border-[#1f513f] text-emerald-400',
                            ];
                            $activeClass = $statusConfig[$statusParam] ?? $statusConfig['In Progress'];
                        @endphp

                        <!-- STATUS DROPDOWN INTERAKTIF -->
                        <div class="relative inline-block text-left" id="statusDropdownContainer">
                            <!-- Tombol Utama Status Dinamis Sesuai Kolom -->
                            <button id="statusBtn" type="button" onclick="toggleStatusDropdown(event)" class="flex items-center gap-2 border text-xs font-semibold px-3 py-1.5 rounded-lg hover:brightness-110 transition cursor-pointer {{ $activeClass }}">
                                <span id="statusText">{{ $statusParam }}</span>
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </button>

                            <!-- Menu Pilihan Status -->
                            <div id="statusMenu" class="hidden absolute right-0 mt-2 w-36 bg-[#161819] border border-white/10 rounded-xl shadow-2xl py-1.5 z-30">
                                <!-- 1. To Do -->
                                <button type="button" onclick="setStatus('To Do', 'bg-[#22272b] border-[#343d46] text-gray-300')" class="w-full text-left px-3 py-2 text-xs text-gray-300 hover:bg-white/5 flex items-center gap-2 transition cursor-pointer">
                                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                                    <span>To Do</span>
                                </button>
                                <!-- 2. In Progress -->
                                <button type="button" onclick="setStatus('In Progress', 'bg-[#1c2c4c] border-[#234273] text-[#579dff]')" class="w-full text-left px-3 py-2 text-xs text-[#579dff] hover:bg-white/5 flex items-center gap-2 transition cursor-pointer">
                                    <span class="w-2 h-2 rounded-full bg-[#579dff]"></span>
                                    <span>In Progress</span>
                                </button>
                                <!-- 3. Review -->
                                <button type="button" onclick="setStatus('Review', 'bg-[#2e223d] border-[#4e356b] text-purple-400')" class="w-full text-left px-3 py-2 text-xs text-purple-400 hover:bg-white/5 flex items-center gap-2 transition cursor-pointer">
                                    <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                                    <span>Review</span>
                                </button>
                                <!-- 4. Done -->
                                <button type="button" onclick="setStatus('Done', 'bg-[#143228] border-[#1f513f] text-emerald-400')" class="w-full text-left px-3 py-2 text-xs text-emerald-400 hover:bg-white/5 flex items-center gap-2 transition cursor-pointer">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                    <span>Done</span>
                                </button>
                            </div>
                        </div>
                        <!-- FLAG ICON -->
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg text-orange-400 hover:bg-white/5 transition">
                            <i class="fa-solid fa-flag text-xs"></i>
                        </button>

                        <!-- IMPROVE TASK (AI) -->
                        <button class="flex items-center gap-1.5 border border-white/15 bg-[#121413] text-white text-xs px-3 py-1.5 rounded-lg hover:border-[#C7FF3D] hover:text-[#C7FF3D] transition">
                            <i class="fa-solid fa-wand-magic-sparkles text-xs"></i>
                            <span>Improve Task</span>
                        </button>
                    </div>
                </div>
                <!-- GRID UTAMA (KIRI: 65%, KANAN: 35%) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- ================= KOLOM KIRI (TASK DETAIL & ACTIVITY) ================= -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- JUDUL TASK -->
                        <div>
                           <h1 class="text-2xl lg:text-3xl font-bold text-white tracking-tight leading-snug">
                          {{ request('title', 'Design UI mockups for mobile app') }}
                       </h1>
                        </div>
 
                        <!-- DESCRIPTION -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-white">Description</label>
                            <div class="bg-[#121413] border border-white/10 rounded-xl p-4 min-h-[100px] text-xs text-gray-400 hover:border-white/20 transition cursor-text">
                                Add a description...
                            </div>
                        </div>

                        <!-- ACTIVITY SECTION -->
                        <div class="pt-4 space-y-4">
                            <!-- HEADER ACTIVITY -->
                            <div class="flex items-center justify-between border-b border-white/10 pb-2">
                                <div class="flex items-center gap-6">
                                    <span class="text-sm font-semibold text-white flex items-center gap-1.5 cursor-pointer">
                                        <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                        Activity
                                    </span>
                                    <!-- TABS -->
                                    <div class="flex items-center gap-4 text-xs font-medium">
                                        <button class="text-gray-400 hover:text-white transition">All</button>
                                        <button class="text-white border-b-2 border-[#C7FF3D] pb-2 font-semibold">Comments</button>
                                        <button class="text-gray-400 hover:text-white transition">History</button>
                                        <button class="text-gray-400 hover:text-white transition">Work log</button>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:text-white text-xs">
                                    <i class="fa-solid fa-arrow-down-wide-short"></i>
                                </button>
                            </div>

                            <!-- COMMENT INPUT BOX -->
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-600 flex items-center justify-center text-xs font-bold text-white shrink-0 mt-1">
                                    SK
                                </div>
                                <div class="flex-1 bg-[#121413] border border-white/10 rounded-xl p-3.5 space-y-3 focus-within:border-[#C7FF3D] transition">
                                    <input type="text" placeholder="Add a comment..." class="w-full bg-transparent text-xs text-white placeholder-gray-500 outline-none">
                                    
                                    <!-- QUICK ACTION CHIPS -->
                                    <div class="flex flex-wrap items-center gap-2 pt-1">
                                        <button class="text-[11px] bg-[#1a1d1c] border border-white/10 px-2.5 py-1 rounded-lg text-gray-300 hover:border-white/30 transition">
                                            Suggest a reply...
                                        </button>
                                        <button class="text-[11px] bg-[#1a1d1c] border border-white/10 px-2.5 py-1 rounded-lg text-gray-300 hover:border-white/30 transition">
                                            Can I get more info...?
                                        </button>
                                        <button class="text-[11px] bg-[#1a1d1c] border border-white/10 px-2.5 py-1 rounded-lg text-gray-300 hover:border-white/30 transition">
                                            Status update...
                                        </button>
                                    </div>
                                    <p class="text-[10px] text-gray-500 pt-1">
                                        Pro tip: press <kbd class="bg-[#1a1d1c] px-1 py-0.5 rounded border border-white/10 text-gray-300">M</kbd> to comment
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ================= KOLOM KANAN (SIDEBAR DETAILS CARD) ================= -->
                    <div class="space-y-4">
                        
                        <!-- DETAILS ACCORDION CARD -->
                        <div class="bg-[#121413] border border-white/10 rounded-2xl p-5 space-y-4">
                            <!-- CARD TITLE -->
                            <div class="flex items-center justify-between cursor-pointer">
                                <h3 class="text-xs font-bold text-white uppercase tracking-wider flex items-center gap-2">
                                    <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                                    Details
                                </h3>
                            </div>

                            <!-- PROPERTIES LIST -->
                            <div class="space-y-3.5 text-xs">
                                
                                <!-- 1. ASSIGNEE -->
                                <div class="grid grid-cols-3 items-start">
                                    <span class="text-gray-400">Assignee</span>
                                    <div class="col-span-2 space-y-1">
                                        <div class="flex items-center gap-2">
                                            <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-bold text-white">AP</div>
                                            <span class="text-white font-medium">Adra Pb</span>
                                        </div>
                                        <button class="text-[11px] text-[#579dff] hover:underline block">Assign to me</button>
                                    </div>
                                </div>

                                <!-- 2. PARENT -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Parent</span>
                                    <span class="col-span-2 text-gray-300">None</span>
                                </div>

                                <!-- 3. DUE DATE -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Due date</span>
                                    <div class="col-span-2">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] bg-red-500/15 text-red-400 border border-red-500/20 font-medium">
                                            <i class="fa-regular fa-calendar text-[10px]"></i>
                                            Aug 6, 2026
                                        </span>
                                    </div>
                                </div>

                                <!-- 4. LABELS -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Labels</span>
                                    <div class="col-span-2">
                                        <span class="inline-block px-2.5 py-0.5 rounded text-[11px] bg-[#1a1d1c] border border-white/10 text-gray-300">
                                            taiktaktuko
                                        </span>
                                    </div>
                                </div>

                                <!-- 5. TEAM -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Team</span>
                                    <span class="col-span-2 text-gray-300">None</span>
                                </div>

                                <!-- 6. START DATE -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Start date</span>
                                    <span class="col-span-2 text-gray-300">None</span>
                                </div>

                                <!-- 7. REPORTER -->
                                <div class="grid grid-cols-3 items-center">
                                    <span class="text-gray-400">Reporter</span>
                                    <div class="col-span-2 flex items-center gap-2">
                                        <div class="w-5 h-5 rounded-full bg-red-600 flex items-center justify-center text-[10px] font-bold text-white">EA</div>
                                        <span class="text-white">Elvin alfabian ariestha</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- DEVELOPMENT CARD -->
                        <div class="bg-[#121413] border border-white/10 rounded-2xl p-4">
                            <button class="w-full flex items-center justify-between text-xs font-semibold text-gray-300 hover:text-white transition">
                                <span class="flex items-center gap-2">
                                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-500"></i>
                                    Development
                                </span>
                            </button>
                        </div>

                        <!-- TIMESTAMPS FOOTER -->
                        <div class="text-[11px] text-gray-500 space-y-1 px-1">
                            <p>Created July 22, 2026 at 2:33 PM</p>
                            <p>Updated July 24, 2026 at 10:22 AM</p>
                        </div>

                    </div>

                </div>

            </div>
        </main>
    </div>

    <!-- JAVASCRIPT TOGGLE SIDEBAR -->
    <script>
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

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }
        function toggleStatusDropdown(event) {
            if (event) event.stopPropagation();
            const menu = document.getElementById('statusMenu');
            menu.classList.toggle('hidden');
        }
        function setStatus(name, colorClasses) {
            const btn = document.getElementById('statusBtn');
            const text = document.getElementById('statusText');
            text.innerText = name;
            btn.className = `flex items-center gap-2 border text-xs font-semibold px-3 py-1.5 rounded-lg hover:brightness-110 transition cursor-pointer ${colorClasses}`;
            document.getElementById('statusMenu').classList.add('hidden');
        }
        window.addEventListener('click', function(e) {
            const container = document.getElementById('statusDropdownContainer');
            if (container && !container.contains(e.target)) {
                const menu = document.getElementById('statusMenu');
                if (menu) menu.classList.add('hidden');
            }

          const profileContainer = document.getElementById('profileDropdownContainer');
if (profileContainer && !profileContainer.contains(e.target)) {
    const profileMenu = document.getElementById('profileDropdownMenu');
    if (profileMenu) profileMenu.classList.add('hidden');
}

        });

        /* ── Profile Dropdown ── */
function toggleProfileDropdown(event) {
    if (event) event.stopPropagation();
    const menu = document.getElementById('profileDropdownMenu');
    if (menu) menu.classList.toggle('hidden');
}

    </script>
</body>
</html>
