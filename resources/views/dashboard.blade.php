<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItensFlow - Dashboard</title>
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
            width: 10px;
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

        <ul class="space-y-1 flex-1 mt-1">

            <li>
                <a href="{{ url('/dashboard') }}" class="active-nav flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
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
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-user-group text-sm w-5 text-center"></i>
                    <span class="text-sm">Team</span>
                </a>
            </li>


            <li>
                <a href="{{ url('/setting') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2 cursor-pointer">
                    <i class="fa-solid fa-gear text-sm w-5 text-center"></i>
                    <span class="text-sm">Settings</span>
                </a>
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

        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-8">

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[10px] font-bold text-white tracking-widest uppercase">Total Projects</h3>
                    <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] border border-[#303030] flex items-center justify-center text-white">
                        <i class="fa-regular fa-folder"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $totalProjects }}</h2>
                    <p class="text-xs text-[#C7FF3D] font-medium">+{{ $newProjectsThisMonth }} Bulan ini</p>
                </div>
            </div>

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[10px] font-bold text-white tracking-widest uppercase">Active Tasks</h3>
                    <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] flex items-center justify-center text-gray-400">
                        <i class="fa-regular fa-circle-check"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $activeTasks }}</h2>
                    @php
                    $totalSemuaTask = $activeTasks + $completedTasks;
                    $persenAktif=$totalSemuaTask> 0 ? round(($activeTasks / $totalSemuaTask) * 100) : 0;
                    @endphp
                    <p class="text-xs text-[#C7FF3D] font-medium">{{ $persenAktif }}% Dari total Task</p>
                </div>
            </div>

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[10px] font-bold text-white tracking-widest uppercase">Completed Tasks</h3>
                    <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-award"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $completedTasks }}</h2>
                    @php
                    $totalSemuaTask = $activeTasks + $completedTasks;
                    @endphp
                    <p class="text-xs text-[#C7FF3D] font-medium">{{ $completedTasks }}/{{ $totalSemuaTask }} Task</p>
                </div>
            </div>

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[10px] font-bold text-white tracking-widest uppercase">Overdue Tasks</h3>
                    <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $overdueTasks }}</h2>
                    @if($overdueTasks > 0)
                    <p class="text-xs text-red-500 font-medium">Perlu tindakan segera</p>
                    @else
                    <p class="text-xs text-[#C7FF3D] font-medium">Semua tepat waktu</p>
                    @endif

                </div>
            </div>

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-[#C7FF3D]/50 transition cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[10px] font-bold text-white tracking-widest uppercase">Team Members</h3>
                    <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $teamMembers }}</h2>
                    <p class="text-xs text-[#C7FF3D] font-medium">{{ $totalTeams }} Team</p>
                </div>
            </div>

        </div>

        <div class="flex flex-col xl:flex-row gap-6 mt-8 pb-8">

            <div class="flex-1">

                <h2 class="text-lg font-bold text-white mb-4">Development Board</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                    @foreach ($statuses as $status)
                    @php
                    // Ambil task milik user untuk status ini (kosong kalau tidak ada)
                    $tasks = $myTasks->get($status->id, collect());
                    @endphp
                    <div>

                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full {{ $loop->last ? 'bg-[#C7FF3D]' : 'bg-white' }}"></span>
                                <span class="text-sm font-semibold text-white">{{ $status->nama_status }}</span>
                            </div>
                            <span class="text-xs bg-[#1a1a1a] border border-white/10 text-gray-400 px-2 py-0.5 rounded-full">{{ $tasks->count() }}</span>
                        </div>

                        @forelse ($tasks as $task)
                        @php
                        // Overdue = deadline sudah lewat & task belum Done (sama seperti kartu statistik Overdue Tasks)
                        $isOverdue = $task->deadline
                            && \Carbon\Carbon::parse($task->deadline)->lt(\Carbon\Carbon::today())
                            && $task->status_id != 4;
                        $taskBadgeClass = $isOverdue ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400';
                        @endphp
                        <a href="{{ route('tasks.show', $task->id) }}" class="block bg-[#151515] border border-white/10 rounded-xl p-4 mb-3 hover:border-white/30 transition cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-bold {{ $taskBadgeClass }} px-2 py-0.5 rounded">{{ $isOverdue ? 'Overdue' : 'Active' }}</span>
                                <span class="text-[10px] text-gray-500">{{ $task->formatted_key }}</span>
                            </div>
                            <p class="text-sm text-white pb-4 border-b border-white/10 font-medium mb-3 leading-snug">{{ $task->judul_task }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center">
                                        <i class="fa-solid fa-user text-[9px] text-gray-400"></i>
                                    </div>
                                    <span class="text-[10px] text-gray-500">{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('M d') : '-' }}</span>
                                </div>
                                <span class="text-[10px] bg-[#1a1a1a] text-gray-400 px-2 py-0.5 rounded">{{ $task->project->nama_project ?? '-' }}</span>
                            </div>
                        </a>
                        @empty
                        <p class="text-xs text-gray-500">Tidak ada task</p>
                        @endforelse

                    </div>
                    @endforeach

                </div>
            </div>

            <div class="w-full xl:w-72 flex flex-col gap-4">

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-5">
                    <h3 class="text-sm font-bold text-white mb-4">Team Workload</h3>
                    @php
                    // Hitung nilai tertinggi sekali saja, sebelum loop dimulai
                    $maxTasks = $teamWorkload->max('assigned_tasks_count') ?: 1;
                    @endphp
                    @forelse ($teamWorkload as $member)
                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-white font-medium">{{ $member->name }}</span>
                            <span class="text-gray-400">{{ $member->assigned_tasks_count }} tasks</span>
                        </div>
                        @php
                        $percentage = ($member->assigned_tasks_count / $maxTasks) * 100;
                        @endphp
                        <div class="w-full bg-[#000000] rounded-full h-1.5">
                            <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-500">Belum ada anggota tim.</p>
                    @endforelse

                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-5">
                    <h3 class="text-sm font-bold text-white mb-4" id="recent-activity">Recent Activity</h3>

                    <div class="flex flex-col gap-4">
                        @forelse ($recentActivities as $activity)
                        <div>
                            <p class="text-xs text-white font-medium">
                                {{ $activity->user->name }} mengubah
                                "{{ $activity->task->judul_task }}"
                                @if ($activity->fromStatus)
                                dari {{ $activity->fromStatus->nama_status }} →
                                @endif
                                {{ $activity->toStatus->nama_status }}
                            </p>
                            <p class="text-[10px] text-gray-500 mt-0.5">
                                {{ $activity->created_at->diffForHumans() }}
                            </p>
                        </div>
                        @empty
                        <p class="text-xs text-gray-500">Belum ada aktivitas.</p>
                        @endforelse
                    </div>

                    {{-- Pagination controls --}}
                    @if ($recentActivities->lastPage() > 1)
                    <div class="flex items-center justify-between mt-5 pt-4 border-t border-white/10">
                        {{-- Prev --}}
                        @if ($recentActivities->onFirstPage())
                            <span class="text-[11px] text-white/20 flex items-center gap-1 cursor-not-allowed">
                                <i class="fa-solid fa-chevron-left text-[10px]"></i> Prev
                            </span>
                        @else
                            <a href="{{ $recentActivities->previousPageUrl() }}#recent-activity"
                                class="text-[11px] text-gray-400 hover:text-white flex items-center gap-1 transition">
                                <i class="fa-solid fa-chevron-left text-[10px]"></i> Prev
                            </a>
                        @endif

                        {{-- Page numbers --}}
                        <div class="flex items-center gap-1">
                            @foreach ($recentActivities->getUrlRange(1, $recentActivities->lastPage()) as $page => $url)
                                @if ($page == $recentActivities->currentPage())
                                    <span class="w-6 h-6 flex items-center justify-center rounded-lg bg-[#C7FF3D] text-black text-[11px] font-bold">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}#recent-activity"
                                        class="w-6 h-6 flex items-center justify-center rounded-lg text-gray-400 hover:bg-white/10 hover:text-white text-[11px] transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        {{-- Next --}}
                        @if ($recentActivities->hasMorePages())
                            <a href="{{ $recentActivities->nextPageUrl() }}#recent-activity"
                                class="text-[11px] text-gray-400 hover:text-white flex items-center gap-1 transition">
                                Next <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        @else
                            <span class="text-[11px] text-white/20 flex items-center gap-1 cursor-not-allowed">
                                Next <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </span>
                        @endif
                    </div>

                    {{-- Info halaman --}}
                    <p class="text-[10px] text-gray-600 text-center mt-2">
                        Page {{ $recentActivities->currentPage() }} of {{ $recentActivities->lastPage() }}
                        · {{ $recentActivities->total() }} total activities
                    </p>
                    @endif
                </div>
            </div>
        </div>


    </main>

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
    </script>

</body>

</html>