<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_itenas.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="{{ asset('js/app.js') }}"></script>

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
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
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
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
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
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
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

    <main class="flex-1 p-8 pt-0 overflow-y-auto bg-gradient-glow">

        <header class="flex items-center justify-between py-3 sm:py-4 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">

            <div class="flex items-center gap-3 flex-1">

                <button onclick="toggleSidebar()" 
                    class="lg:hidden w-8 h-8 flex items-center justify-center rounded-xl 
                   bg-[#151515] border border-white/10 text-gray-400 
                   hover:text-white hover:bg-[#1a1a1a] transition">
                <i class="fa-solid fa-bars text-xs"></i>
                </button>

                <div class="relative w-full max-w-[150px] md:max-w-[280px] lg:max-w-xs xl:max-w-sm -ml-2">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-xs"></i>
                    <input type="text" placeholder="Search anything, tasks, issues..."
                        class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 
                                rounded-xl pl-9  pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
                </div>

            </div>


            <div class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-bell text-sm"></i>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-sun text-sm"></i>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-user text-sm"></i>
                </button>
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

            <div class="w-full xl:w-72 flex flex-col gap-4">

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