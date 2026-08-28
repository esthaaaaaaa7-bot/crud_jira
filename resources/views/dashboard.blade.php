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


        .bg-gradient-glow {
            background-color: #000000;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 50% 50%, rgba(199, 255, 61, 0.15) 0%, transparent 60%);
        }
    </style>


</head>

<body class="flex h-screen bg-[#080808] font-sans">

    <aside class="w-64 bg-[#080808] text-white flex flex-col p-5 shadow-lg border-r border-white/10">

        <div class="flex items-center gap-3 px-2 pb-4 mb-6 mt-2">

            <div class="w-8 h-8 bg-[#C7FF3D] rounded-[9px] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                    <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                    <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                    <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                </svg>
            </div>

            <h2 class="text-xl font-bold text-white tracking-wide">
                ProSite
            </h2>
        </div>

        <ul class="space-y-1 flex-1 mt-4">

            <li>
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 py-2.5 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
                    <i class="fa-solid fa-chart-line text-lg w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 py-2.5 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-regular fa-folder text-lg w-5 text-center"></i>
                    <span>Projects</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-3 py-2.5 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-table-columns text-lg w-5 text-center"></i>
                    <span>Boards</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-3 py-2.5 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-regular fa-square-check text-lg w-5 text-center"></i>
                    <span>Tasks</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-3 py-2.5 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-user-group text-lg w-5 text-center"></i>
                    <span>Team</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-3 py-2.5 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
                    <i class="fa-solid fa-gear text-lg w-5 text-center"></i>
                    <span>Settings</span>
                </a>
            </li>

        </ul>


    </aside>

    <main class="flex-1 p-8 pt-0 overflow-y-auto bg-gradient-glow">

        <header class="flex items-center justify-between pt-5 pb-6 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">

            <div class="relative w-96">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50"></i>
                <input type="text" placeholder="Search anything, tasks, issues..."
                    class="w-full bg-[#151515] border border-white/10 text-sm text-white placeholder-white/50 
                              rounded-lg pl-11 pr-4 py-2.5 focus:outline-none focus:border-[#C7FF3D] transition">
            </div>

            <div class="flex items-center gap-5">
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-bell text-xl"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-sun text-xl"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-user text-xl"></i>
                </button>
            </div>


        </header>

        <div class="grid grid-cols-5 gap-4 mt-8">

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
                    <p class="text-xs text-[#C7FF3D] font-medium">{{ $completedTasks }}/{{ $totalSemuaTask}} Complete</p>
                </div>
            </div>

            <div class="bg-[#151515] border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-red-500/50 transition cursor-pointer">
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

        <div class="flex gap-6 mt-8 pb-8">

            <div class="flex-1">

                <h2 class="text-lg font-bold text-white mb-4">Development Board</h2>

                <div class="grid grid-cols-4 gap-4">

                    <div>

                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                                <span class="text-sm font-semibold text-white">To Do</span>
                            </div>
                            <span class="text-xs bg-[#1a1a1a] border border-white/10 text-gray-400 px-2 py-0.5 rounded-full">5</span>
                        </div>

                        <div class="bg-[#151515] border border-white/10 rounded-xl p-4 mb-3 hover:border-white/30 transition cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-bold bg-orange-500/20 text-orange-400 px-2 py-0.5 rounded">High</span>
                                <span class="text-[10px] text-gray-500">PRJ-142</span>
                            </div>
                            <p class="text-sm text-white pb-4 border-b border-white/10 font-medium mb-3 leading-snug">Implement OAuth2 Authentication System</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center">
                                        <i class="fa-solid fa-user text-[9px] text-gray-400"></i>
                                    </div>
                                    <span class="text-[10px] text-gray-500">Oct 24</span>
                                </div>
                                <span class="text-[10px] bg-[#1a1a1a] text-gray-400 px-2 py-0.5 rounded">Security</span>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                                <span class="text-sm font-semibold text-white">In Progress</span>
                            </div>
                            <span class="text-xs bg-[#1a1a1a] border border-white/10 text-gray-400 px-2 py-0.5 rounded-full">4</span>
                        </div>

                        <div class="bg-[#151515] border border-white/10 rounded-xl p-4 mb-3 hover:border-white/30 transition cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-bold bg-red-500/20 text-red-400 px-2 py-0.5 rounded">Critical</span>
                                <span class="text-[10px] text-gray-500">PRJ-138</span>
                            </div>
                            <p class="text-sm text-white pb-4 border-b border-white/10 font-medium mb-3 leading-snug">Design System UI Component Library</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center">
                                        <i class="fa-solid fa-user text-[9px] text-gray-400"></i>
                                    </div>
                                    <span class="text-[10px] text-gray-500">Oct 21</span>
                                </div>
                                <span class="text-[10px] bg-[#1a1a1a] text-gray-400 px-2 py-0.5 rounded">Frontend</span>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                                <span class="text-sm font-semibold text-white">Review</span>
                            </div>
                            <span class="text-xs bg-[#1a1a1a] border border-white/10 text-gray-400 px-2 py-0.5 rounded-full">3</span>
                        </div>

                        <div class="bg-[#151515] border border-white/10 rounded-xl p-4 mb-3 hover:border-white/30 transition cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-bold bg-orange-500/20 text-orange-400 px-2 py-0.5 rounded">High</span>
                                <span class="text-[10px] text-gray-500">PRJ-155</span>
                            </div>
                            <p class="text-sm text-white pb-4 border-b border-white/10 font-medium mb-3 leading-snug">API Rate Limiting & Gateway Config</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center">
                                        <i class="fa-solid fa-user text-[9px] text-gray-400"></i>
                                    </div>
                                    <span class="text-[10px] text-gray-500">Oct 19</span>
                                </div>
                                <span class="text-[10px] bg-[#1a1a1a] text-gray-400 px-2 py-0.5 rounded">Backend</span>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-[#C7FF3D]"></span>
                                <span class="text-sm font-semibold text-white">Done</span>
                            </div>
                            <span class="text-xs bg-[#1a1a1a] border border-white/10 text-gray-400 px-2 py-0.5 rounded-full">6</span>
                        </div>

                        <div class="bg-[#151515] border border-white/10 rounded-xl p-4 mb-3 hover:border-white/30 transition cursor-pointer">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-bold bg-green-500/20 text-green-400 px-2 py-0.5 rounded">Low</span>
                                <span class="text-[10px] text-gray-500">PRJ-161</span>
                            </div>
                            <p class="text-sm text-white pb-4 border-b border-white/10 font-medium mb-3 leading-snug">PostgreSQL Database Migration Script</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center">
                                        <i class="fa-solid fa-user text-[9px] text-gray-400"></i>
                                    </div>
                                    <span class="text-[10px] text-gray-500">Oct 15</span>
                                </div>
                                <span class="text-[10px] bg-[#1a1a1a] text-gray-400 px-2 py-0.5 rounded">Database</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="w-72 flex flex-col gap-4">

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-5">
                    <h3 class="text-sm font-bold text-white mb-4">Team Workload</h3>

                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-white font-medium">John D.</span>
                            <span class="text-gray-400">12 tasks</span>
                        </div>
                        <div class="w-full bg-[#000000] rounded-full h-1.5">
                            <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-white font-medium">Sarah J.</span>
                            <span class="text-gray-400">8 tasks</span>
                        </div>
                        <div class="w-full bg-[#000000] rounded-full h-1.5">
                            <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-white font-medium">Michael K.</span>
                            <span class="text-gray-400">4 tasks</span>
                        </div>
                        <div class="w-full bg-[#000000] rounded-full h-1.5">
                            <div class="bg-[#C7FF3D] h-1.5 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#151515] border border-white/10 rounded-2xl p-5">
                    <h3 class="text-sm font-bold text-white mb-4">Recent Activity</h3>

                    <div class="flex flex-col gap-4">
                        <div>
                            <p class="text-xs text-white font-medium">John D. pushed to branch main</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">2 mins ago</p>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Sarah J. completed PRJ-138</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">1 hr ago</p>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Sprint review scheduled</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">3 hrs ago</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </main>

</body>

</html>