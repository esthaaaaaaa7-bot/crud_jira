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
        <div class="flex items-center gap-3 mx-2 pb-4 mb-4 border-b border-white/20">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0">
                <img src="{{ asset('images/logo_itenas.png') }}" alt="Logo" class="w-8 h-8 rounded-lg">
            </div>
            <h2 class="text-md font-bold text-white tracking-wide">ItensFlow</h2>
        </div>

        <!-- NEW PROJECT BUTTON -->
        <a href="{{ url('/projects') }}" class="w-full bg-[#C7FF3D] text-black font-semibold text-xs py-2.5 px-4 rounded-xl flex items-center justify-center gap-2 mb-4 hover:bg-[#b8f52e] transition">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>New Project</span>
        </a>

        <!-- MENU -->
        <ul class="space-y-1 flex-1">
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
                <a href="{{ url('/board') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a] transition">
                    <i class="fa-solid fa-table-columns text-sm w-5 text-center"></i>
                    <span class="text-sm">Board</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition">
                    <i class="fa-regular fa-square-check text-sm w-5 text-center"></i>
                    <span class="text-sm">Tasks</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition">
                    <i class="fa-solid fa-user-group text-sm w-5 text-center"></i>
                    <span class="text-sm">Team</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition mt-2">
                    <i class="fa-solid fa-gear text-sm w-5 text-center"></i>
                    <span class="text-sm">Settings</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- MAIN CONTENT AREA-->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gradient-glow">
        <!-- TOP NAVBAR / BREADCRUMB -->
        <header class="flex items-center justify-between py-3.5 px-8 border-b border-white/10 bg-black/40 backdrop-blur-md sticky top-0 z-20">
            <!-- BREADCRUMB & BURGER MENU -->
            <div class="flex items-center gap-3">
                <button onclick="togglesidebar()" class="lg:hidden w-8 h-8 flex items-center justify-center rounded-xl bg-[#151515] border borde-white/10 text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-bars text-xs"></i>
                </button>
                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <a href="{{url('/board') }}" class="hover:text-white transition">Boards</a>
                    <span>&rsaquo;
                    </span>
                    <span class="text-gray-300">Sprint 42 Board</span> 
                    <span>&rsaquo;
                    </span>
                    <span class="text-[#C7FF3D] font-medium">{{ request('title', 'Task Log') }}</span>
                </div>
            </div>
             
            <!-- SEARCH & ICONS -->
            <div class="flex items-center gap-3">
                <div class="relative w-48 md:w-64">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-white/40 text-xs"></i>
                    <input type="text" placeholder="search..." class="w-full bg-[#151515] border border-white/10 rounded-xl pl-9 pr-4 py-1.5 text-xs text-white placeholder-white/40 focus:outline-none focus:border-[#C7FF3D] transition">
                </div>
                <button class="w-8 h-8 flex-items-center justify-center rounded-xl bg-[#151515] border border-white/10 text-gray-400 hover:text-white transition">
                    <i class="fa-reguler fa-sun text-xs"></i>
                </button>
                <!-- UBAH MENJADI: -->
                <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-amber-600 to-amber-400 flex items-center justify-center text-xs font-bold text-white border border-white/20">
                    EA
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
                        <a href="{{ url('/board') }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </a>
                        <div class="h-5 w-[1px] bg-white/10 mx-1"></div>
                        <!-- STATUS DROPDOWN (IN PROGRESS) -->
                        <button class="flex items-center gap-2 bg-[#1c2c4c] border border-[#234273] text-[#579dff] text-xs font-semibold px-3 py-1.5 rounded-lg hover:brightness-110 transition">
                            <span>In Progress</span>
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
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
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }
    </script>
</body>
</html>
