<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Warna kustom hijau neon sesuai gambar */
        .bg-neon {
            background-color: #ccff00;
        }

        .text-neon {
            color: #ccff00;
        }

        .border-neon {
            border-color: #ccff00;
        }
    </style>
</head>

<body class="bg-[#0e100f] text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#090b0a] border-r border-[#171c19] flex flex-col justify-between select-none flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="bg-neon rounded-xl flex items-center justify-center flex-shrink-0" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-white">ProSite</span>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#17201b] text-white font-medium text-sm">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-folder text-base"></i> Project
                    <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;">
                            <rect x="3" y="3" width="5" height="18" rx="1" />
                            <rect x="10" y="3" width="5" height="12" rx="1" />
                            <rect x="17" y="3" width="4" height="8" rx="1" />
                        </svg> Board
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                        <i class="fa-regular fa-square-check text-base"></i> Task
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                        <i class="fa-regular fa-user text-base"></i> Team
                    </a>
                    @if((session('user')->id_jabatan ?? 0) == 1)
                    <a href="{{ url('/users') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                        <i class="fa-solid fa-user-gear text-base"></i> User
                    </a>
                    @endif
            </nav>
        </div>

        <!-- Settings di Bawah Sidebar -->
        <div class="px-3 pb-6">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                <i class="fa-solid fa-gear text-base"></i> Settings
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-[#0e100f]">

        <!-- TOPBAR -->
        @include('partials.topbar', [
            'left' => '<div class="relative" style="width:380px;">
                <span style="position:absolute;top:50%;left:16px;transform:translateY(-50%);color:#6b7280;pointer-events:none;">
                    <i class="fa-solid fa-magnifying-glass" style="font-size:13px;"></i>
                </span>
                <input type="text" placeholder="Search anything, tasks, issues..."
                    style="width:100%;background:#131916;color:#d1d5db;font-size:13px;
                           padding:9px 16px 9px 42px;border-radius:20px;
                           border:1px solid #1f2622;outline:none;font-family:inherit;"
                    onfocus="this.style.borderColor=\'#ccff00\'"
                    onblur="this.style.borderColor=\'#1f2622\'">
            </div>'
        ])

        <!-- DASHBOARD CONTAINER -->
        <main class="flex-1 overflow-y-auto p-8 bg-[#0e100f]">

            <!-- STATS CARDS ROW -->
            <div class="grid grid-cols-5 gap-5 mb-8">
                <!-- Card 1 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">TOTAL PROJECTS</span>
                        <i class="fa-regular fa-folder text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">{{ $totalProjects }}</h3>
                        <p class="text-xs text-neon font-medium mt-1">+2 this mo</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">ACTIVE TASKS</span>
                        <i class="fa-regular fa-square-check text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">{{ $activeTasks }}</h3>
                        <p class="text-xs text-neon font-medium mt-1">+14% vs last wk</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">COMPLETED TASKS</span>
                        <i class="fa-solid fa-layer-group text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">{{ $completedTasks }}</h3>
                        <p class="text-xs text-neon font-medium mt-1">82% target</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">OVERDUE TASKS</span>
                        <i class="fa-solid fa-triangle-exclamation text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">{{ $overdueTasks }}</h3>
                        <p class="text-xs text-rose-500 font-medium mt-1">+3 since yesterday</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">TEAM MEMBERS</span>
                        <i class="fa-regular fa-user text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">{{ $teamMembers }}</h3>
                        <p class="text-xs text-neon font-medium mt-1">3 teams</p>
                    </div>
                </div>
            </div>

            <!-- BOARD SECTION -->
            <div class="grid grid-cols-4 gap-6">

                <!-- MAIN KANBAN BOARD -->
                <div class="col-span-3">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-xl font-bold text-white">Development Board</h2>
                    </div>

                    <!-- Columns Grid -->
                    <div class="grid grid-cols-4 gap-4">

                        <!-- COLUMN 1: To Do -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-gray-400"></span>
                                    <span class="font-semibold text-gray-300">To Do</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">5</span>
                            </div>

                            <!-- Card 1 -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c2211] text-amber-400 text-[10px] font-semibold px-2 py-0.5 rounded">High</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-142</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Implement OAuth2 Authentication System</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 24</span>
                                    </div>
                                    <span class="bg-[#15231c] text-neon text-[10px] px-2 py-0.5 rounded-md font-medium">Security</span>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#15231c] text-neon text-[10px] font-semibold px-2 py-0.5 rounded">Low</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-145</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Setup Docker Multi-Stage Builds</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 28</span>
                                    </div>
                                    <span class="bg-[#241e15] text-amber-500 text-[10px] px-2 py-0.5 rounded-md font-medium">DevOps</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2: In Progress -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                    <span class="font-semibold text-gray-300">In Progress</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">4</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c1515] text-rose-400 text-[10px] font-semibold px-2 py-0.5 rounded">Critical</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-138</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Design System UI Component Library</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 21</span>
                                    </div>
                                    <span class="bg-[#141b24] text-blue-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Frontend</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 3: Review -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                    <span class="font-semibold text-gray-300">Review</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">3</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c2211] text-amber-400 text-[10px] font-semibold px-2 py-0.5 rounded">High</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-155</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">API Rate Limiting & Gateway Config</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 19</span>
                                    </div>
                                    <span class="bg-[#201824] text-purple-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Backend</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 4: Done -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-neon"></span>
                                    <span class="font-semibold text-gray-300">Done</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">6</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#15231c] text-neon text-[10px] font-semibold px-2 py-0.5 rounded">Low</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-161</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">PostgreSQL Database Migration Script</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 15</span>
                                    </div>
                                    <span class="bg-[#152124] text-cyan-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Database</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT SIDE PANELS -->
                <div class="col-span-1 flex flex-col gap-6">

                    <!-- Team Workload Card -->
                    <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">Team Workload</h3>

                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">John D.</span>
                                    <span class="text-gray-500">12 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 85%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">Sarah J.</span>
                                    <span class="text-gray-500">8 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 60%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">Michael K.</span>
                                    <span class="text-gray-500">4 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity Card -->
                    <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">Recent Activity</h3>

                        <div class="space-y-4 text-xs">
                            <div>
                                <p class="text-gray-300 leading-normal">John D. pushed to branch main</p>
                                <span class="text-gray-500 text-[11px]">2 mins ago</span>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-normal">Sarah J. completed PRJ-138</p>
                                <span class="text-gray-500 text-[11px]">1 hr ago</span>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-normal">Sprint review scheduled</p>
                                <span class="text-gray-500 text-[11px]">3 hrs ago</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

</body>

</html>