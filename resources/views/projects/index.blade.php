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
                <a href="#"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-user-group text-sm w-5 text-center"></i>
                    <span class="text-sm">Team</span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
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

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">All Projects</h2>
                <h1 class="text-xs sm:text-md text-white">Manage and track all ongoing work across projects.</h1>
            </div>

            <div class="flex flex-row gap-2 items-start">
                <div onclick="openCreateModal()"
                    class="flex items-center gap-1 border border-white/30 py-2 px-4 bg-[#c7ff3d] rounded-lg mt-3 hover:border-[#000000] transition-colors duration-200 cursor-pointer">
                    <i class="fa-solid fa-plus text-black text-xs"></i>
                    <button class="text-black font-black text-xs">Create Project</button>
                </div>

                <!-- Filter Button & Dropdown -->
                <div class="relative mt-3" id="proj-filter-wrapper">
                    <button
                        id="proj-btn-filter"
                        onclick="toggleProjFilter()"
                        class="flex items-center gap-2 border border-white/30 py-2 px-4 bg-[#000000] rounded-lg hover:border-[#C7FF3D] transition-colors duration-200">
                        <i class="fa-solid fa-filter text-white text-xs"></i>
                        <span class="text-white text-xs">Filter</span>
                        <i class="fa-solid fa-chevron-down text-white/40 text-[10px] transition-transform duration-200" id="proj-filter-chevron"></i>
                    </button>

                    <!-- Main Dropdown -->
                    <div
                        id="proj-filter-dropdown"
                        class="hidden absolute right-0 top-full mt-2 w-52 bg-[#111] border border-white/10 rounded-xl shadow-2xl z-50">

                        <!-- By Assign Trigger -->
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

                        <!-- Assign Sub -->
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

                        <!-- Priority Trigger -->
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

                        <!-- Priority Sub -->
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

                        <!-- Status Trigger -->
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

                        <!-- Status Sub -->
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

                        <!-- Due Date Sub -->
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

                        <!-- Clear Filter -->
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

                <table class="w-full min-w-max text-sm text-left">

                    <thead>

                        <tr class="border-b border-white/10">

                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Project Name</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Project</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Assignee</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Priority</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Status</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Due Date</th>
                            <th class="px-8 py-4 text-white text-sm sm:text-md font-semibold">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-b border-white/10 hover:bg-white/5 transition">

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Design System Update</p>
                                <p class="text-[10px] sm:text-xs text-white mt-0.5">TSK-1042</p>
                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Q4 Marketing Campaign</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>

                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                   <span class="flex items-center gap-1 text-red-500 text-xs font-semibold">
                                        <i class="fa-solid fa-angle-up"></i> High
                                    </span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span
                                        class="text-[10px] sm:text-xs font-bold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">In
                                        Progress</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Oct 24, 2023</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="relative inline-block">

                                    <button onclick="toggleDropdown(this)"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg 
                                                 text-white hover:bg-white/10 hover:text-white transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>

                                    </button>

                                    <div
                                        class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                            Edit
                                        </button>

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-red-400 hover:bg-white/5 transition">
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                    </div>

                                </div>

                            </td>


                        </tr>

                    </tbody>

                    <tbody>

                        <tr class = "border-b border-white/10 hover:bg-white/5 transition">

                            <td class ="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Design System Update</p>
                                <p class="text-[10px] sm:text-xs text-white mt-0.5">TSK-1042</p>
                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Q4 Marketing Campaign</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="flex items-center gap-1 text-red-500 text-xs font-semibold">
                                        <i class="fa-solid fa-angle-up"></i> High
                                    </span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span
                                        class="text-[10px] sm:text-xs font-semibold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">To
                                        Do</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Oct 24, 2023</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="relative inline-block">

                                    <button onclick="toggleDropdown(this)"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg 
                                                 text-white hover:bg-white/10 hover:text-white transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>

                                    </button>

                                    <div
                                        class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                            Edit
                                        </button>

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-red-400 hover:bg-white/5 transition">
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                    <tbody>

                        <tr class = "border-b border-white/10 hover:bg-white/5 transition">

                            <td class ="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Design System Update</p>
                                <p class="text-[10px] sm:text-xs text-white mt-0.5">TSK-1042</p>
                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Q4 Marketing Campaign</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="flex items-center gap-1 text-orange-400 text-xs font-semibold">
                                        <i class="fa-solid fa-minus"></i> Medium
                                    </span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span
                                        class="text-[10px] sm:text-xs font-semibold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">In
                                        Progress</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Oct 24, 2023</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="relative inline-block">

                                    <button onclick="toggleDropdown(this)"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg 
                                                 text-white hover:bg-white/10 hover:text-white transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>

                                    </button>

                                    <div
                                        class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                            Edit
                                        </button>

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-red-400 hover:bg-white/5 transition">
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                    <tbody>

                        <tr class = "border-b border-white/10 hover:bg-white/5 transition">

                            <td class ="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Design System Update</p>
                                <p class="text-[10px] sm:text-xs text-white mt-0.5">TSK-1042</p>
                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Q4 Marketing Campaign</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="flex items-center gap-1 text-green-500 text-xs font-semibold">
                                        <i class="fa-solid fa-angle-down"></i> Low
                                    </span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span
                                        class="text-[10px] sm:text-xs font-semibold bg-[#C7FF3D]/20 text-[#C7FF3D] px-2 py-0.5 rounded-lg">Done</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Oct 24, 2023</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="relative inline-block">

                                    <button onclick="toggleDropdown(this)"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg 
                                                 text-white hover:bg-white/10 hover:text-white transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>

                                    </button>

                                    <div
                                        class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                            Edit
                                        </button>

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-red-400 hover:bg-white/5 transition">
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                    <tbody>

                        <tr class = "border-b border-white/10 hover:bg-white/5 transition">

                            <td class ="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Design System Update</p>
                                <p class="text-[10px] sm:text-xs text-white mt-0.5">TSK-1042</p>
                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Q4 Marketing Campaign</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="flex items-center gap-1 text-orange-400 text-xs font-semibold">
                                        <i class="fa-solid fa-minus"></i> Medium
                                    </span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span
                                        class="text-[10px] sm:text-xs font-semibold bg-[#C7FF3D]/20 text-[#C7FF3D] px-2 py-0.5 rounded-lg">Done</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">Oct 24, 2023</p>
                            </td>

                            <td class="px-8 py-3">

                                <div class="relative inline-block">

                                    <button onclick="toggleDropdown(this)"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg 
                                                 text-white hover:bg-white/10 hover:text-white transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>

                                    </button>

                                    <div
                                        class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                            Edit
                                        </button>

                                        <button
                                            class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-red-400 hover:bg-white/5 transition">
                                            <i class="fa-solid fa-trash"></i>
                                            Hapus
                                        </button>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between items-center my-2 gap-4 shrink-0">

                <p class="text-white text-xs mx-8">Showing 1 to 5 of 34 projects</p>

                <div class="flex flex-row gap-1 items-center mx-6">
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8249;</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-[#1a1a1a] border border-white/10 rounded-lg text-white text-xs transition">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">3</button>
                    <span class="w-8 h-8 flex items-center justify-center rounded-lg text-white">...</span>
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8250;</button>
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

            function openCreateModal() {
                const modal = document.getElementById('createProjectModal');
                modal.classList.remove('hidden');
            }

            function closeCreateModal() {
                const modal = document.getElementById('createProjectModal');
                modal.classList.add('hidden');
            }

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

            /* ── Project Filter Dropdown ── */
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
            });
        </script>

        <div id="createProjectModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm hidden p-4">
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
                                class="w-full mt-1.5 pl-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white 
                                rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition"
                                placeholder="e.g. Q4 Marketing Campaign" required>
                        </div>

                        <div>
                            <label for="modal_project_code"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                Project description
                            </label>
                            <textarea name="deskripsi" id="modal_project_desc" rows="3"
                                class="w-full mt-1.5 pl-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white 
                                rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition"
                                placeholder="Briefly describe the goals and scope..."></textarea>

                        </div>

                        <div class="space-y-2">
                            <label for="modal_project_name"
                                class="block text-[11px] font-semibold tracking-wider text-white uppercase">
                                Deadline
                            </label>
                            <input type="date" name="deadline" id="modal_deadline" placeholder="dd-mm-yyyy"
                                class="w-full mt-1.5 pl-4 py-2.5 bg-[#000000] border border-white/20 text-xs text-white placeholder-white [color-scheme:dark]
                                rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition"
                                required>
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

</body>

</html>
