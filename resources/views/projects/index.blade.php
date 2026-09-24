<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Projects</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .bg-gradient-glow {
            background-color: #000000;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
                radial-gradient(circle at 50% 50%, rgba(199, 255, 61, 0.15) 0%, transparent 60%);
        }

        .custom-scroll::-webkit-scrollbar {
            height: 5px;
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

    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm"
        onclick="toggleSidebar()">
    </div>

    <aside id="sidebar"
        class="fixed lg:relative inset-y-0 left-0 z-50 w-[200px] md:w-56 bg-[#080808] text-white flex flex-col p-5 shadow-lg 
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
                <a href="{{ url('/dashboard') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-chart-line text-sm w-5 text-center"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/projects') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
                    <i class="fa-regular fa-folder text-sm w-5 text-center"></i>
                    <span class="text-sm">Projects</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/board') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-table-columns text-sm w-5 text-center"></i>
                    <span class="text-sm">Boards</span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-regular fa-square-check text-sm w-5 text-center"></i>
                    <span class="text-sm">Tasks</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
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

    <main class="flex-1 p-8 pt-0 overflow-y-auto bg-gradient-glow">

        <header
            class="flex items-center justify-between py-3 sm:py-4 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">

            <div class="flex flex-1 items-center gap-6 sm:gap-2">

                <button onclick="toggleSidebar()"
                    class="lg:hidden w-8 h-8 -ml-3 flex items-center justify-center rounded-xl 
                   bg-[#151515] border border-white/10 text-gray-400 
                   hover:text-white hover:bg-[#1a1a1a] transition">
                    <i class="fa-solid fa-bars text-xs"></i>
                </button>

                <div class="relative w-full max-w-[150px] md:max-w-[280px] lg:max-w-xs xl:max-w-sm -ml-4 sm:-ml-0">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-xs"></i>
                    <input type="text" placeholder="Search anything, tasks, issues..."
                        class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 
                                rounded-xl pl-9  pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
                </div>

            </div>


            <div class="flex items-center -mr-4 gap-2">
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-bell text-sm"></i>
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-sun text-sm"></i>
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-xl bg-[#111111] border 
                                border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] relative transition">
                    <i class="fa-regular fa-user text-sm"></i>
                </button>
            </div>


        </header>

        @if (session('success'))
            <div id="flash-message" class="mb-6 flex items-center justify-between p-4 bg-[#151515] border border-[#C7FF3D]/40 rounded-xl text-white text-xs shadow-lg">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-[#C7FF3D] text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="document.getElementById('flash-message').remove()" class="text-white/40 hover:text-white transition cursor-pointer">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">All Projects</h2>
                <h1 class="text-xs sm:text-md text-white">Manage and track all ongoing work across projects.</h1>
            </div>

            <div class="flex flex-row gap-2">
                <button type="button" onclick="openCreateModal()" id="btn-create-project" class="flex items-center gap-1.5 border border-white/30 py-2 px-4 bg-[#c7ff3d] rounded-lg mt-3 hover:border-[#000000] hover:bg-[#dfff6f] transition-colors duration-200 cursor-pointer">
                    <i class="fa-solid fa-plus text-black text-xs"></i>
                    <span class="text-black font-black text-xs">Create Project</span>
                </button>

            
                <div class="relative mt-3" id="proj-filter-wrapper">
                    <button
                        id="proj-btn-filter"
                        onclick="toggleProjFilter()"
                        class="flex items-center gap-2 border border-white/30 py-2 px-4 bg-[#000000] rounded-lg hover:border-[#C7FF3D] transition-colors duration-200">
                        <i class="fa-solid fa-filter text-white text-xs"></i>
                        <span class="text-white text-xs">Filter</span>
                        <i class="fa-solid fa-chevron-down text-white/40 text-[10px] transition-transform duration-200" id="proj-filter-chevron"></i>
                    </button>

                 
                    <div
                        id="proj-filter-dropdown"
                        class="hidden absolute right-0 top-full mt-2 w-52 bg-[#111] border border-white/10 rounded-xl shadow-2xl z-50">

                      
                        <div
                            id="proj-assign-trigger"
                            onclick="toggleProjAssignSub(event)"
                            class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group rounded-t-xl">
                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-user text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white text-xs">By Assign</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="proj-assign-chevron"></i>
                        </div>

                    
                        <div id="proj-assign-sub" class="hidden border-t border-white/5 bg-[#0a0a0a]">
                            <div onclick="selectProjFilter('assign_elvin')" class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                <div class="w-5 h-5 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">E</div>
                                <span class="text-white/80 group-hover:text-white text-xs transition">Elvin Alfabian</span>
                            </div>
                            <div onclick="selectProjFilter('assign_ibom')" class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">I</div>
                                <span class="text-white/80 group-hover:text-white text-xs transition">Ibom Gans</span>
                            </div>
                            <div onclick="selectProjFilter('assign_syafiq')" class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <div class="w-5 h-5 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">S</div>
                                <span class="text-white/80 group-hover:text-white text-xs transition">Syafiq Khayru</span>
                            </div>
                        </div>

                    
                        <div
                            id="proj-priority-trigger"
                            onclick="toggleProjPrioritySub(event)"
                            class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-flag text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white text-xs">Priority</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="proj-priority-chevron"></i>
                        </div>

                    
                        <div id="proj-priority-sub" class="hidden border-t border-white/5 bg-[#0a0a0a]">
                            <div onclick="selectProjFilter('priority_high')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                <i class="fa-solid fa-angle-up text-red-500 text-xs"></i>
                                <span class="text-red-500 text-xs font-semibold">High</span>
                            </div>
                            <div onclick="selectProjFilter('priority_medium')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                <span class="text-orange-400 text-xs font-semibold">Medium</span>
                            </div>
                            <div onclick="selectProjFilter('priority_low')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <i class="fa-solid fa-angle-down text-green-500 text-xs"></i>
                                <span class="text-green-500 text-xs font-semibold">Low</span>
                            </div>
                        </div>

                        
                        <div
                            id="proj-status-trigger"
                            onclick="toggleProjStatusSub(event)"
                            class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-layer-group text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white text-xs">By Status</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="proj-status-chevron"></i>
                        </div>

                    
                        <div id="proj-status-sub" class="hidden border-t border-white/5 bg-[#0a0a0a]">
                            <div onclick="selectProjFilter('status_todo')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                                <span class="text-gray-300 text-xs">To Do</span>
                            </div>
                            <div onclick="selectProjFilter('status_inprogress')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                                <span class="text-gray-300 text-xs">In Progress</span>
                            </div>
                            <div onclick="selectProjFilter('status_review')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                                <span class="text-gray-300 text-xs">Review</span>
                            </div>
                            <div onclick="selectProjFilter('status_done')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <span class="w-2 h-2 rounded-full bg-[#C7FF3D] shrink-0"></span>
                                <span class="text-[#C7FF3D] text-xs">Done</span>
                            </div>
                        </div>

                        <!-- Due Date Trigger -->
                        <div
                            id="proj-duedate-trigger"
                            onclick="toggleProjDueDateSub(event)"
                            class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-calendar text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white text-xs">Due Date</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="proj-duedate-chevron"></i>
                        </div>

                        
                        <div id="proj-duedate-sub" class="hidden border-t border-white/5 bg-[#0a0a0a]">
                            <div onclick="selectProjFilter('duedate_newest')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                <i class="fa-solid fa-arrow-up text-white/40 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white/80 text-xs">Terbaru ke Terlama</span>
                            </div>
                            <div onclick="selectProjFilter('duedate_oldest')" class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <i class="fa-solid fa-arrow-down text-white/40 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                <span class="text-white/80 text-xs">Terlama ke Terbaru</span>
                            </div>
                        </div>

                    
                        <div
                            onclick="clearProjFilter()"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-red-500/10 cursor-pointer transition group border-t border-white/10 rounded-b-xl">
                            <i class="fa-solid fa-xmark text-red-400/70 text-xs group-hover:text-red-400 transition"></i>
                            <span class="text-red-400/70 text-xs group-hover:text-red-400 transition">Clear Filter</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="bg-[#111111] border border-white/10 rounded-2xl mt-8">

            <div class="overflow-x-auto custom-scroll">

                <table class="w-full text-sm text-left">

                    <thead>

                        <tr class="border-b border-white/10">

                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Project Name</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Description</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Reporter</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Priority</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Status</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Due Date</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition">
                            
                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">{{ $project->nama_project }}</p>
                                <p class="text-[10px] sm:text-xs text-[#C7FF3D] font-mono mt-0.5">{{ $project->key }}</p>
                            </td>

        
                            <td class="px-8 py-3">
                                <p class="text-white text-xs sm:text-sm line-clamp-1">
                                    {{ $project->deskripsi ?? '-' }}
                                </p>
                            </td>

                            
                            <td class="px-8 py-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs"></i>
                                    </div>
                                    <span class="text-white text-xs sm:text-sm">{{ session('user')->name ?? 'Owner' }}</span>
                                </div>
                            </td>

                        
                            <td class="px-8 py-3">
                                <div class="flex items-center">
                                    @php
                                    $pVal = $project->priority ?? 'Medium';
                                    $priorityClass = match($pVal) {
                                        'Low' => 'bg-green-500/15 text-green-400 border border-green-500/30',
                                        'Medium' => 'bg-yellow-500/15 text-yellow-400 border border-yellow-500/30',
                                        'High' => 'bg-red-500/15 text-red-400 border border-red-500/30',
                                        'Highest' => 'bg-red-600/20 text-red-500 border border-red-500/40',
                                        'Lowest' => 'bg-green-600/20 text-green-500 border border-green-500/40',
                                        default => 'bg-yellow-500/15 text-yellow-400 border border-yellow-500/30',
                                    };
                                    $priorityIcon = match($pVal) {
                                        'Low' => 'fa-solid fa-angle-down text-green-400',
                                        'Medium' => 'fa-solid fa-minus text-yellow-400',
                                        'High' => 'fa-solid fa-angle-up text-red-400',
                                        'Highest' => 'fa-solid fa-angles-up text-red-500',
                                        'Lowest' => 'fa-solid fa-angles-down text-green-500',
                                        default => 'fa-solid fa-minus text-yellow-400',
                                    };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 text-[10px] sm:text-xs font-semibold {{ $priorityClass }} px-2.5 py-1 rounded-lg">
                                        <i class="{{ $priorityIcon }} text-[11px]"></i>
                                        <span>{{ $pVal }}</span>
                                    </span>
                                </div>
                            </td>
                            <td class="px-8 py-3">
                                <div class="flex items-center">
                                    @php
                                    $projStatus = $project->status ?? 'To Do';
                                    $statusBadgeClass = match($projStatus) {
                                        'In Progress' => 'bg-blue-500/15 text-blue-400 border border-blue-500/30',
                                        'Review' => 'bg-amber-500/15 text-amber-400 border border-amber-500/30',
                                        'Done' => 'bg-[#C7FF3D]/15 text-[#C7FF3D] border border-[#C7FF3D]/30',
                                        'Active' => 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30',
                                        default => 'bg-zinc-500/15 text-zinc-300 border border-zinc-500/30',
                                    };
                                    $statusIcon = match($projStatus) {
                                        'In Progress' => 'fa-solid fa-circle-half-stroke text-blue-400',
                                        'Review' => 'fa-regular fa-clock text-amber-400',
                                        'Done' => 'fa-solid fa-circle-check text-[#C7FF3D]',
                                        'Active' => 'fa-solid fa-circle-dot text-emerald-400',
                                        default => 'fa-regular fa-circle text-zinc-400',
                                    };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 text-[10px] sm:text-xs font-semibold {{ $statusBadgeClass }} px-2.5 py-1 rounded-lg">
                                        <i class="{{ $statusIcon }} text-[10px]"></i>
                                        <span>{{ $projStatus }}</span>
                                    </span>
                                </div>
                            </td>

                           
                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">
                                    {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('M d, Y') : '-' }}
                                </p>
                            </td>

               
                            <td class="px-8 py-3">
                                <div class="relative inline-block">
                                    <button onclick="toggleDropdown(this)" class="w-8 h-8 flex items-center justify-center rounded-lg text-white hover:bg-white/10 transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-40 bg-[#1a1a1a] border border-white/10 rounded-xl shadow-xl z-50 overflow-hidden py-1">

                                        
                                        <a href="{{ url('/board?project_id='.$project->id) }}" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-table-columns text-[#C7FF3D]"></i>
                                            <span>Buka Board</span>
                                        </a>

                                        
                                        <button type="button"
                                            onclick="openEditModal(this)"
                                            data-id="{{ $project->id }}"
                                            data-name="{{ $project->nama_project }}"
                                            data-desc="{{ $project->deskripsi ?? '' }}"
                                            data-priority="{{ $project->priority ?? 'Medium' }}"
                                            data-status="{{ $project->status ?? 'To Do' }}"
                                            data-deadline="{{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('Y-m-d') : '' }}"
                                            class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-white hover:bg-white/5 transition text-left cursor-pointer">
                                            <i class="fa-solid fa-pen-to-square text-amber-400"></i>
                                            <span>Edit</span>
                                        </button>

                                        <div class="border-t border-white/10 my-1"></div>

                
                                        <form action="{{ url('/projects/'.$project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project {{ $project->nama_project }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-red-400 hover:bg-red-500/10 transition text-left">
                                                <i class="fa-solid fa-trash"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                    
                        <tr>
                            <td colspan="7" class="px-8 py-10 text-center text-gray-400 text-xs">
                                <i class="fa-regular fa-folder-open text-2xl mb-2 block text-gray-500"></i>
                                Belum ada project. Klik tombol <strong>Create Project</strong> di atas untuk membuat proyek baru.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="flex justify-between items-center my-2">

                    <p class="text-white text-xs mx-8">Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{ $projects->total() }}</p>

                    <div class="flex flex-row gap-1 items-center mx-6">
                        @if ($projects->onFirstPage())
                        <span class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white/30 text-xs cursor-not-allowed">&#8249;</span>
                        @else
                        <a href="{{ $projects->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8249;</a>
                        @endif
                        @for ($i = 1; $i <= $projects->lastPage(); $i++)
                            @if ($i == $projects->currentPage())
                            {{-- Halaman aktif → dikasih style highlight --}}
                            <button class="w-8 h-8 flex items-center justify-center bg-[#1a1a1a] border border-white/10 rounded-lg text-white text-xs transition">{{ $i }}</button>
                            @else
                            {{-- Halaman lain → bisa diklik, ada link --}}
                            <a href="{{ $projects->url($i) }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">{{ $i }}</a>
                            @endif
                        @endfor

                        @if ($projects->hasMorePages())
                        <a href="{{ $projects->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8250;</a>
                        @else
                        <span class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white/30 text-xs cursor-not-allowed">&#8250;</span>
                        @endif
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

            /* ── Custom Priority Dropdown Helper ── */
            const priorityConfig = {
                High: {
                    icon: 'fa-solid fa-angle-up text-red-500 text-xs',
                    color: 'text-red-500 font-semibold',
                    label: 'High'
                },
                Medium: {
                    icon: 'fa-solid fa-minus text-orange-400 text-xs',
                    color: 'text-orange-400 font-semibold',
                    label: 'Medium'
                },
                Low: {
                    icon: 'fa-solid fa-angle-down text-green-500 text-xs',
                    color: 'text-green-500 font-semibold',
                    label: 'Low'
                }
            };

            function setCreatePriority(val) {
                const config = priorityConfig[val] || priorityConfig['Medium'];
                document.getElementById('modal_priority').value = val;
                document.getElementById('create_priority_selected').innerHTML = `
                    <i class="${config.icon}"></i>
                    <span class="${config.color} text-xs">${config.label}</span>
                `;
            }

            function selectCreatePriority(val) {
                setCreatePriority(val);
                closeCreatePriorityDropdown();
            }

            function toggleCreatePriorityDropdown(e) {
                if (e) e.stopPropagation();
                const dd = document.getElementById('create-priority-dropdown');
                const chevron = document.getElementById('create_priority_chevron');
                const isHidden = dd.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            }

            function closeCreatePriorityDropdown() {
                const dd = document.getElementById('create-priority-dropdown');
                const chevron = document.getElementById('create_priority_chevron');
                if (dd) dd.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function setEditPriority(val) {
                const config = priorityConfig[val] || priorityConfig['Medium'];
                document.getElementById('edit_priority').value = val;
                document.getElementById('edit_priority_selected').innerHTML = `
                    <i class="${config.icon}"></i>
                    <span class="${config.color} text-xs">${config.label}</span>
                `;
            }

            function selectEditPriority(val) {
                setEditPriority(val);
                closeEditPriorityDropdown();
            }

            function toggleEditPriorityDropdown(e) {
                if (e) e.stopPropagation();
                const dd = document.getElementById('edit-priority-dropdown');
                const chevron = document.getElementById('edit_priority_chevron');
                const isHidden = dd.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            }

            function closeEditPriorityDropdown() {
                const dd = document.getElementById('edit-priority-dropdown');
                const chevron = document.getElementById('edit_priority_chevron');
                if (dd) dd.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function openCreateModal() {
                setCreatePriority('Medium');
                closeCreatePriorityDropdown();
                const modal = document.getElementById('createProjectModal');
                modal.classList.remove('hidden');
            }

            function closeCreateModal() {
                closeCreatePriorityDropdown();
                const modal = document.getElementById('createProjectModal');
                modal.classList.add('hidden');
            }

            function openEditModal(btn) {
                const id = btn.getAttribute('data-id');
                const name = btn.getAttribute('data-name') || '';
                const desc = btn.getAttribute('data-desc') || '';
                const priority = btn.getAttribute('data-priority') || 'Medium';
                const status = btn.getAttribute('data-status') || 'To Do';
                const deadline = btn.getAttribute('data-deadline') || '';

                const form = document.getElementById('editProjectForm');
                form.action = `{{ url('/projects') }}/${id}`;

                document.getElementById('edit_nama_project').value = name;
                document.getElementById('edit_deskripsi').value = desc;
                setEditPriority(priority);
                document.getElementById('edit_status').value = status;
                document.getElementById('edit_deadline').value = deadline;

                // Close any open dropdown menus
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
                closeCreatePriorityDropdown();
                closeEditPriorityDropdown();

                const modal = document.getElementById('editProjectModal');
                modal.classList.remove('hidden');
            }

            function closeEditModal() {
                closeEditPriorityDropdown();
                const modal = document.getElementById('editProjectModal');
                modal.classList.add('hidden');
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCreateModal();
                    closeEditModal();
                }
            });

            function toggleDropdown(btn) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== btn.nextElementSibling) {
                        menu.classList.add('hidden');
                    }
                });

                const menu = btn.nextElementSibling;
                menu.classList.toggle('hidden');
            }
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.relative')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.add('hidden');
                    });
                }
            });

    
            function toggleProjFilter() {
                const dd = document.getElementById('proj-filter-dropdown');
                const chevron = document.getElementById('proj-filter-chevron');
                const isHidden = dd.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
                if (isHidden) { closeProjAssignSub(); closeProjPrioritySub(); closeProjStatusSub(); closeProjDueDateSub(); }
            }

            function toggleProjAssignSub(e) {
                e.stopPropagation();
                const sub = document.getElementById('proj-assign-sub');
                const chevron = document.getElementById('proj-assign-chevron');
                const isHidden = sub.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
                closeProjPrioritySub(); closeProjStatusSub(); closeProjDueDateSub();
            }
            function closeProjAssignSub() {
                const sub = document.getElementById('proj-assign-sub');
                const chevron = document.getElementById('proj-assign-chevron');
                if (sub) sub.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function toggleProjPrioritySub(e) {
                e.stopPropagation();
                const sub = document.getElementById('proj-priority-sub');
                const chevron = document.getElementById('proj-priority-chevron');
                const isHidden = sub.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
                closeProjAssignSub(); closeProjStatusSub(); closeProjDueDateSub();
            }
            function closeProjPrioritySub() {
                const sub = document.getElementById('proj-priority-sub');
                const chevron = document.getElementById('proj-priority-chevron');
                if (sub) sub.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function toggleProjStatusSub(e) {
                e.stopPropagation();
                const sub = document.getElementById('proj-status-sub');
                const chevron = document.getElementById('proj-status-chevron');
                const isHidden = sub.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
                closeProjAssignSub(); closeProjPrioritySub(); closeProjDueDateSub();
            }
            function closeProjStatusSub() {
                const sub = document.getElementById('proj-status-sub');
                const chevron = document.getElementById('proj-status-chevron');
                if (sub) sub.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function toggleProjDueDateSub(e) {
                e.stopPropagation();
                const sub = document.getElementById('proj-duedate-sub');
                const chevron = document.getElementById('proj-duedate-chevron');
                const isHidden = sub.classList.toggle('hidden');
                chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
                closeProjAssignSub(); closeProjPrioritySub(); closeProjStatusSub();
            }
            function closeProjDueDateSub() {
                const sub = document.getElementById('proj-duedate-sub');
                const chevron = document.getElementById('proj-duedate-chevron');
                if (sub) sub.classList.add('hidden');
                if (chevron) chevron.style.transform = '';
            }

            function selectProjFilter(type) {
                const label = {
                    assign_elvin: 'Assign: Elvin Alfabian',
                    assign_ibom: 'Assign: Ibom Gans',
                    assign_syafiq: 'Assign: Syafiq Khayru',
                    priority_highest: 'Priority: Highest',
                    priority_high: 'Priority: High',
                    priority_medium: 'Priority: Medium',
                    priority_low: 'Priority: Low',
                    priority_lowest: 'Priority: Lowest',
                    status_todo: 'Status: To Do',
                    status_inprogress: 'Status: In Progress',
                    status_review: 'Status: Review',
                    status_done: 'Status: Done',
                    duedate_newest: 'Due Date ↑',
                    duedate_oldest: 'Due Date ↓'
                }[type] || 'Filter';

                const btn = document.getElementById('proj-btn-filter');
                btn.querySelector('span').textContent = label;
                btn.classList.add('border-[#C7FF3D]');
                btn.classList.remove('border-white/30');

                document.getElementById('proj-filter-chevron').style.transform = '';
                document.getElementById('proj-filter-dropdown').classList.add('hidden');
                closeProjAssignSub(); closeProjPrioritySub(); closeProjStatusSub(); closeProjDueDateSub();
            }

            function clearProjFilter() {
                const btn = document.getElementById('proj-btn-filter');
                btn.querySelector('span').textContent = 'Filter';
                btn.classList.remove('border-[#C7FF3D]');
                btn.classList.add('border-white/30');
                document.getElementById('proj-filter-dropdown').classList.add('hidden');
                document.getElementById('proj-filter-chevron').style.transform = '';
                closeProjAssignSub(); closeProjPrioritySub(); closeProjStatusSub(); closeProjDueDateSub();
            }

            document.addEventListener('click', function(e) {
                const wrapper = document.getElementById('proj-filter-wrapper');
                if (wrapper && !wrapper.contains(e.target)) {
                    document.getElementById('proj-filter-dropdown').classList.add('hidden');
                    document.getElementById('proj-filter-chevron').style.transform = '';
                    closeProjAssignSub(); closeProjPrioritySub(); closeProjStatusSub(); closeProjDueDateSub();
                }

                const createWrap = document.getElementById('create-priority-wrapper');
                if (createWrap && !createWrap.contains(e.target)) {
                    closeCreatePriorityDropdown();
                }

                const editWrap = document.getElementById('edit-priority-wrapper');
                if (editWrap && !editWrap.contains(e.target)) {
                    closeEditPriorityDropdown();
                }
            });
        </script>

        <div id="createProjectModal"
            onclick="if(event.target === this) closeCreateModal()"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden p-4">
            <div class="w-full max-w-lg bg-[#151515] border border-white/20 rounded-2xl p-6 shadow-2xl relative">
                <h2 class="text-lg font-bold text-white mb-1">Create New Project</h2>
                <p class="text-xs text-white mb-6"> Set up a new workspace for your team. You can modify these detail
                    later </p>

                <form action="{{ url('/projects') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="modal_project_name"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                Project Name
                            </label>
                            <input type="text" name="nama_project" id="modal_project_name"
                                class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 
                                rounded-lg focus:outline-none focus:border-[#C7FF3D] transition"
                                placeholder="e.g. Q4 Marketing Campaign" required>
                        </div>

                        <div>
                            <label for="modal_project_code"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                Project description
                            </label>
                            <textarea name="deskripsi" id="modal_project_desc" rows="3"
                                class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 
                                rounded-lg focus:outline-none focus:border-[#C7FF3D] transition resize-none"
                                placeholder="Briefly describe the goals and scope..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="relative z-30" id="create-priority-wrapper">
                                <label class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                    Priority
                                </label>
                                <input type="hidden" name="priority" id="modal_priority" value="Medium">
                                <button type="button"
                                    onclick="toggleCreatePriorityDropdown(event)"
                                    id="create_priority_btn"
                                    class="flex items-center justify-between w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white rounded-lg focus:outline-none focus:border-[#C7FF3D] hover:border-white/40 transition cursor-pointer">
                                    <div class="flex items-center gap-2.5" id="create_priority_selected">
                                        <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                        <span class="text-orange-400 text-xs font-semibold">Medium</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-down text-white/40 text-[10px] transition-transform duration-200" id="create_priority_chevron"></i>
                                </button>
                                
                                <div id="create-priority-dropdown"
                                    class="hidden absolute left-0 top-full mt-1.5 w-full bg-[#111111] border border-white/10 rounded-xl shadow-2xl z-50 overflow-hidden py-1">
                                    <div class="flex items-center gap-2.5 px-4 py-2 border-b border-white/5 text-white/60">
                                        <i class="fa-solid fa-flag text-[#C7FF3D] text-xs"></i>
                                        <span class="text-xs font-medium text-white/80">Priority</span>
                                    </div>
                                    <div onclick="selectCreatePriority('High')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition">
                                        <i class="fa-solid fa-angle-up text-red-500 text-xs"></i>
                                        <span class="text-red-500 text-xs font-semibold">High</span>
                                    </div>
                                    <div onclick="selectCreatePriority('Medium')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition border-t border-white/5">
                                        <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                        <span class="text-orange-400 text-xs font-semibold">Medium</span>
                                    </div>
                                    <div onclick="selectCreatePriority('Low')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition border-t border-white/5">
                                        <i class="fa-solid fa-angle-down text-green-500 text-xs"></i>
                                        <span class="text-green-500 text-xs font-semibold">Low</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="modal_deadline"
                                    class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                    Deadline
                                </label>
                                <input type="date" name="deadline" id="modal_deadline" placeholder="dd-mm-yyyy"
                                    class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 [color-scheme:dark]
                                    rounded-lg focus:outline-none focus:border-[#C7FF3D] transition"
                                    required>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t border-[#1f2622]">

                            <button type="button" onclick="closeCreateModal()"
                                class="px-5 py-2 text-xs font-semibold text-white hover:bg-[#1a1d1d] transition-colors cursor-pointer">
                                Cancel
                            </button>

                            <button type="submit"
                                class="px-5 py-2 text-xs font-semibold bg-[#C7FF3D] text-black font-semibold rounded-xl hover:bg-[#dfff6f] cursor-pointer"><i
                                    class="fa-solid fa-check"></i> Oke
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        
        <div id="editProjectModal"
            onclick="if(event.target === this) closeEditModal()"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden p-4">
            <div class="w-full max-w-lg bg-[#151515] border border-white/20 rounded-2xl p-6 shadow-2xl relative">
                <h2 class="text-lg font-bold text-white mb-1">Edit Project</h2>
                <p class="text-xs text-white/60 mb-6">Update your workspace details. You can modify these details later</p>

                <form id="editProjectForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="edit_nama_project"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                PROJECT NAME
                            </label>
                            <input type="text" name="nama_project" id="edit_nama_project"
                                class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 
                                rounded-lg focus:outline-none focus:border-[#C7FF3D] transition"
                                placeholder="e.g. Q4 Marketing Campaign" required>
                        </div>

                        <div>
                            <label for="edit_deskripsi"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                PROJECT DESCRIPTION
                            </label>
                            <textarea name="deskripsi" id="edit_deskripsi" rows="3"
                                class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 
                                rounded-lg focus:outline-none focus:border-[#C7FF3D] transition resize-none"
                                placeholder="Briefly describe the goals and scope..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="edit_status"
                                    class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                    STATUS
                                </label>
                                <div class="relative mt-1.5">
                                    <select name="status" id="edit_status"
                                        class="w-full px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white 
                                        rounded-lg appearance-none focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer pr-9">
                                        <option value="To Do" class="bg-[#151515] text-white">To Do</option>
                                        <option value="In Progress" class="bg-[#151515] text-white">In Progress</option>
                                        <option value="Review" class="bg-[#151515] text-white">Review</option>
                                        <option value="Done" class="bg-[#151515] text-white">Done</option>
                                        <option value="Active" class="bg-[#151515] text-white">Active</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-white/50 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div class="relative z-30" id="edit-priority-wrapper">
                                <label class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                    PRIORITY
                                </label>
                                <input type="hidden" name="priority" id="edit_priority" value="Medium">
                                <button type="button"
                                    onclick="toggleEditPriorityDropdown(event)"
                                    id="edit_priority_btn"
                                    class="flex items-center justify-between w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white rounded-lg focus:outline-none focus:border-[#C7FF3D] hover:border-white/40 transition cursor-pointer">
                                    <div class="flex items-center gap-2.5" id="edit_priority_selected">
                                        <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                        <span class="text-orange-400 text-xs font-semibold">Medium</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-down text-white/40 text-[10px] transition-transform duration-200" id="edit_priority_chevron"></i>
                                </button>

                        
                                <div id="edit-priority-dropdown"
                                    class="hidden absolute left-0 top-full mt-1.5 w-full bg-[#111111] border border-white/10 rounded-xl shadow-2xl z-50 overflow-hidden py-1">
                                    <div class="flex items-center gap-2.5 px-4 py-2 border-b border-white/5 text-white/60">
                                        <i class="fa-solid fa-flag text-[#C7FF3D] text-xs"></i>
                                        <span class="text-xs font-medium text-white/80">Priority</span>
                                    </div>
                                    <div onclick="selectEditPriority('High')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition">
                                        <i class="fa-solid fa-angle-up text-red-500 text-xs"></i>
                                        <span class="text-red-500 text-xs font-semibold">High</span>
                                    </div>
                                    <div onclick="selectEditPriority('Medium')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition border-t border-white/5">
                                        <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                        <span class="text-orange-400 text-xs font-semibold">Medium</span>
                                    </div>
                                    <div onclick="selectEditPriority('Low')" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 cursor-pointer transition border-t border-white/5">
                                        <i class="fa-solid fa-angle-down text-green-500 text-xs"></i>
                                        <span class="text-green-500 text-xs font-semibold">Low</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="edit_deadline"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                DEADLINE
                            </label>
                            <input type="date" name="deadline" id="edit_deadline" placeholder="dd/mm/yyyy"
                                class="w-full mt-1.5 px-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white/40 [color-scheme:dark]
                                rounded-lg focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t border-[#1f2622] mt-6">
                            <button type="button" onclick="closeEditModal()"
                                class="px-5 py-2 text-xs font-semibold text-white hover:bg-[#1a1d1d] transition-colors cursor-pointer rounded-xl">
                                Cancel
                            </button>

                            <button type="submit"
                                class="px-5 py-2 text-xs font-semibold bg-[#C7FF3D] text-black font-semibold rounded-xl hover:bg-[#dfff6f] transition cursor-pointer flex items-center gap-1.5">
                                <i class="fa-solid fa-check"></i> Oke
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>
