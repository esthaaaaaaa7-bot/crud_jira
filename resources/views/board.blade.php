<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Board</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
          
          .flatpickr-calendar {
    background: #151515 !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    border-radius: 12px !important;
    box-shadow: 0 20px 60px rgba(0,0,0,0.5) !important;
}
.flatpickr-day.selected {
    background: #C7FF3D !important;
    border-color: #C7FF3D !important;
    color: #000 !important;
}
.flatpickr-day:hover {
    background: rgba(199,255,61,0.2) !important;
}
.flatpickr-months, .flatpickr-weekdays, .flatpickr-day {
    color: white !important;
}
.flatpickr-day.today {
    border-color: #C7FF3D !important;
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
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
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
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
                    <i class="fa-solid fa-gear text-sm w-5 text-center"></i>
                    <span class="text-sm">Settings</span>
                </a>
            </li>

        </ul>


    </aside>

    <main class="flex-1 p-8 pt-0 overflow-y-auto bg-gradient-glow custom-scroll">

        <header class="flex items-center justify-between py-3 sm:py-4 mb-8 border-b border-white/10 -mx-8 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">

            <div class="flex items-center gap-6 sm:gap-2">

                <button onclick="toggleSidebar()" 
                    class="lg:hidden w-8 h-8 -ml-3 flex items-center justify-center rounded-xl 
                   bg-[#151515] border border-white/10 text-gray-400 
                   hover:text-white hover:bg-[#1a1a1a] transition">
                <i class="fa-solid fa-bars text-xs"></i>
                </button>

                 <div class="flex flex-col sm:flex-row items-center gap-2"> 
                    
                 <div class="flex flex-row items-center gap-2"> 

                    <p class="text-white text-xs sm:text-base mx-2">Board</p>
                    <p class="text-white text-xs sm:text-base rotate-90 sm:rotate-0">&#8250;</p>

                </div>

                     <p class="text-[#C7FF3D] text-xs sm:text-base">Q4 Marketing Campaign</p>

                </div>

            </div>


            <div class="flex items-center -mr-4 gap-2">
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

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">Q4 Marketing Campaign</h2>
                <h1 class="text-xs sm:text-base text-white">Manage deliverables and assets for the upcoming launch.</h1>
            </div>

         <div class="flex flex-row gap-2 relative self-end sm:self-auto">

                    <div class="relative mt-3" id="filter-wrapper">
                        <button
                            id="btn-filter"
                            onclick="toggleFilterDropdown()"
                            class="flex items-center gap-2 border border-white/30 py-2 px-4 bg-[#000000] rounded-lg hover:border-[#C7FF3D] transition-colors duration-200">
                            <i class="fa-solid fa-filter text-white text-xs"></i>
                            <span class="text-white text-xs">Filter</span>
                            <i class="fa-solid fa-chevron-down text-white/40 text-[10px] transition-transform duration-200" id="filter-chevron"></i>
                        </button>

                        <div
                            id="filter-dropdown"
                            class="hidden absolute right-0 top-full mt-2 w-52 bg-[#111] border border-white/10 rounded-xl shadow-2xl z-50">

                            <div
                                id="filter-assign-trigger"
                                onclick="toggleAssignSub(event)"
                                class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group rounded-t-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fa-regular fa-user text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                    <span class="text-white text-xs">By Assign</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="assign-chevron"></i>
                            </div>

                            <div
                                id="assign-sub"
                                class="hidden border-t border-white/5 bg-[#0a0a0a]">
                                <div
                                    onclick="selectFilter('assign_elvin')"
                                    class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                    <div class="w-5 h-5 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">E</div>
                                    <span class="text-white/80 group-hover:text-white text-xs transition">Elvin Alfabian</span>
                                </div>
                                <div
                                    onclick="selectFilter('assign_ibom')"
                                    class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">I</div>
                                    <span class="text-white/80 group-hover:text-white text-xs transition">Ibom Gans</span>
                                </div>
                                <div
                                    onclick="selectFilter('assign_syafiq')"
                                    class="flex items-center gap-2.5 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <div class="w-5 h-5 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">S</div>
                                    <span class="text-white/80 group-hover:text-white text-xs transition">Syafiq Khayru</span>
                                </div>
                            </div>

                            <div
                                id="filter-priority-trigger"
                                onclick="togglePrioritySub(event)"
                                class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-flag text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                    <span class="text-white text-xs">Priority</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="priority-chevron"></i>
                            </div>

                            <div
                                id="priority-sub"
                                class="hidden border-t border-white/5 bg-[#0a0a0a]">
                                <div
                                    onclick="selectFilter('priority_highest')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                    <i class="fa-solid fa-angles-up text-red-500 text-xs"></i>
                                    <span class="text-red-500 text-xs font-semibold">Highest</span>
                                </div>
                                <div
                                    onclick="selectFilter('priority_high')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <i class="fa-solid fa-angle-up text-red-500 text-xs"></i>
                                    <span class="text-red-500 text-xs font-semibold">High</span>
                                </div>
                                <div
                                    onclick="selectFilter('priority_medium')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                    <span class="text-orange-400 text-xs font-semibold">Medium</span>
                                </div>
                                <div
                                    onclick="selectFilter('priority_low')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <i class="fa-solid fa-angle-down text-green-500 text-xs"></i>
                                    <span class="text-green-500 text-xs font-semibold">Low</span>
                                </div>
                                <div
                                    onclick="selectFilter('priority_lowest')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <i class="fa-solid fa-angles-down text-green-500 text-xs"></i>
                                    <span class="text-green-500 text-xs font-semibold">Lowest</span>
                                </div>
                            </div>

                            <div
                                id="filter-duedate-trigger"
                                onclick="toggleDueDateSub(event)"
                                class="flex items-center justify-between gap-3 px-4 py-3 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                <div class="flex items-center gap-3">
                                    <i class="fa-regular fa-calendar text-white/50 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                    <span class="text-white text-xs">Due Date</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-white/30 text-[10px] transition-transform duration-200" id="duedate-chevron"></i>
                            </div>

                            <div
                                id="duedate-sub"
                                class="hidden border-t border-white/5 bg-[#0a0a0a]">
                                <div
                                    onclick="selectFilter('duedate_newest')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group">
                                    <i class="fa-solid fa-arrow-up text-white/40 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                    <span class="text-white/80 text-xs">Terbaru ke Terlama</span>
                                </div>
                                <div
                                    onclick="selectFilter('duedate_oldest')"
                                    class="flex items-center gap-3 pl-10 pr-4 py-2.5 hover:bg-white/5 cursor-pointer transition group border-t border-white/5">
                                    <i class="fa-solid fa-arrow-down text-white/40 text-xs group-hover:text-[#C7FF3D] transition"></i>
                                    <span class="text-white/80 text-xs">Terlama ke Terbaru</span>
                                </div>
                            </div>

                            <div
                                onclick="clearFilter()"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-red-500/10 cursor-pointer transition group border-t border-white/10 rounded-b-xl">
                                <i class="fa-solid fa-xmark text-red-400/70 text-xs group-hover:text-red-400 transition"></i>
                                <span class="text-red-400/70 text-xs group-hover:text-red-400 transition">Clear Filter</span>
                            </div>

                        </div>
                    </div>
               </div>
                
        </div>

        <div class="flex flex-row items-start gap-4 mt-6 overflow-x-auto pb-4 custom-scroll">

            <div class="w-[295px] bg-[#151515] border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shrink-0">
    
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                        <p class="text-white text-sm font-semibold">To Do</p>
                        <span class="text-xs bg-white/10 text-white/60 px-2 py-0.5 rounded-full">2</span>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/40 text-sm"></i>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-orange-400 text-xs font-semibold">
                            <i class="fa-solid fa-minus"></i> Medium
                        </span>
                        <span class="text-white/40 text-xs">#PRO-102</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-red-500 text-xs font-semibold">
                            <i class="fa-solid fa-angles-up"></i> Highest
                        </span>
                        <span class="text-white/40 text-xs">#PRO-102</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <button onclick="openInlineTask('c1')" id="btn-c1"
                    class="w-full text-white/40 text-xs border border-white/10 rounded-xl py-2 hover:border-[#C7FF3D] hover:text-white transition mt-1">
                    + Add Task
                </button>

                <div id="form-c1" class="hidden bg-[#000000] border-2 border-[#C7FF3D]/40 rounded-xl p-3 mt-1">
                    <textarea rows="3" placeholder="What needs to be done?"
                        oninput="toggleSubmitBtn('c1', this.value)"
                        class="w-full bg-transparent text-xs text-white placeholder-white/40 focus:outline-none resize-none mb-2">
                    </textarea>
                    <input type="date" id="c1-date" onchange="setDate('c1', this.value)" class="absolute opacity-0 w-0 h-0 pointer-events-none">
                    <div id="c1-assign" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setAssign('c1', 'Elvin Alfabian')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">E</div>
                                <span class="text-white text-xs">Elvin Alfabian</span>
                            </div>
                            <div onclick="setAssign('c1', 'Ibom Gans')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">I</div>
                                <span class="text-white text-xs">Ibom Gans</span>
                            </div>
                            <div onclick="setAssign('c1', 'Syafiq Khayru')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">S</div>
                                <span class="text-white text-xs">Syafiq Khayru</span>
                            </div>
                        </div>
                    </div>
                    <div id="c1-priority" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setPriority('c1', 'highest', 'fa-angles-up', 'text-red-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-up text-red-500 text-xs"></i><span class="text-red-500 text-xs font-semibold">Highest</span></div>
                            <div onclick="setPriority('c1', 'high', 'fa-angle-up', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-up text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">High</span></div>
                            <div onclick="setPriority('c1', 'medium', 'fa-minus', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-minus text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">Medium</span></div>
                            <div onclick="setPriority('c1', 'low', 'fa-angle-down', 'text-gray-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Low</span></div>
                            <div onclick="setPriority('c1', 'lowest', 'fa-angles-down', 'text-gray-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Lowest</span></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex items-center gap-3">
                            <i onclick="openDatePicker('c1')" class="fa-regular fa-calendar text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c1-assign')" class="fa-regular fa-user text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c1-priority')" class="fa-solid fa-flag text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="closeInlineTask('c1')" class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg hover:bg-red-500/30 hover:text-red-400 transition text-white/40 text-xs"><i class="fa-solid fa-xmark"></i></button>
                            <button id="btn-submit-c1" onclick="submitTask('c1')" disabled class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg transition text-white/20 text-xs cursor-not-allowed"><i class="fa-solid fa-arrow-turn-down rotate-90"></i></button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-[295px] bg-[#151515] border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shrink-0">
    
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                        <p class="text-white text-sm font-semibold">In Progres</p>
                        <span class="text-xs bg-white/10 text-white/60 px-2 py-0.5 rounded-full">3</span>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/40 text-sm"></i>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-orange-400 text-xs font-semibold">
                            <i class="fa-solid fa-minus"></i> Medium
                        </span>
                        <span class="text-white/40 text-xs">#PRO-102</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-red-500 text-xs font-semibold">
                            <i class="fa-solid fa-angle-up"></i> High
                        </span>
                        <span class="text-white/40 text-xs">#PRO-105</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-green-500 text-xs font-semibold">
                            <i class="fa-solid fa-angle-down"></i> Low
                        </span>
                        <span class="text-white/40 text-xs">#PRO-106</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <button onclick="openInlineTask('c2')" id="btn-c2"
                    class="w-full text-white/40 text-xs border border-white/10 rounded-xl py-2 hover:border-[#C7FF3D] hover:text-white transition mt-1">
                    + Add Task
                </button>

                <div id="form-c2" class="hidden bg-[#000000] border-2 border-[#C7FF3D]/40 rounded-xl p-3 mt-1">
                    <textarea rows="3" placeholder="What needs to be done?"
                        oninput="toggleSubmitBtn('c2', this.value)"
                        class="w-full bg-transparent text-xs text-white placeholder-white/40 focus:outline-none resize-none mb-2">
                    </textarea>
                    <input type="date" id="c2-date" onchange="setDate('c2', this.value)" class="absolute opacity-0 w-0 h-0 pointer-events-none">
                    <div id="c2-assign" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setAssign('c2', 'Elvin Alfabian')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">E</div>
                                <span class="text-white text-xs">Elvin Alfabian</span>
                            </div>
                            <div onclick="setAssign('c2', 'Ibom Gans')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">I</div>
                                <span class="text-white text-xs">Ibom Gans</span>
                            </div>
                            <div onclick="setAssign('c2', 'Syafiq Khayru')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">S</div>
                                <span class="text-white text-xs">Syafiq Khayru</span>
                            </div>
                        </div>
                    </div>
                    <div id="c2-priority" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setPriority('c2', 'highest', 'fa-angles-up', 'text-red-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-up text-red-500 text-xs"></i><span class="text-red-500 text-xs font-semibold">Highest</span></div>
                            <div onclick="setPriority('c2', 'high', 'fa-angle-up', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-up text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">High</span></div>
                            <div onclick="setPriority('c2', 'medium', 'fa-minus', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-minus text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">Medium</span></div>
                            <div onclick="setPriority('c2', 'low', 'fa-angle-down', 'text-gray-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Low</span></div>
                            <div onclick="setPriority('c2', 'lowest', 'fa-angles-down', 'text-gray-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Lowest</span></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex items-center gap-3">
                            <i onclick="openDatePicker('c2')" class="fa-regular fa-calendar text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c2-assign')" class="fa-regular fa-user text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c2-priority')" class="fa-solid fa-flag text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="closeInlineTask('c2')" class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg hover:bg-red-500/30 hover:text-red-400 transition text-white/40 text-xs"><i class="fa-solid fa-xmark"></i></button>
                            <button id="btn-submit-c2" onclick="submitTask('c2')" disabled class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg transition text-white/20 text-xs cursor-not-allowed"><i class="fa-solid fa-arrow-turn-down rotate-90"></i></button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-[295px] bg-[#151515] border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shrink-0">
    
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                        <p class="text-white text-sm font-semibold">Review</p>
                        <span class="text-xs bg-white/10 text-white/60 px-2 py-0.5 rounded-full">1</span>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/40 text-sm"></i>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-green-500 text-xs font-semibold">
                            <i class="fa-solid fa-angles-down"></i> Lowest
                        </span>
                        <span class="text-white/40 text-xs">#PRO-102</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <button onclick="openInlineTask('c3')" id="btn-c3"
                    class="w-full text-white/40 text-xs border border-white/10 rounded-xl py-2 hover:border-[#C7FF3D] hover:text-white transition mt-1">
                    + Add Task
                </button>

                <div id="form-c3" class="hidden bg-[#000000] border-2 border-[#C7FF3D]/40 rounded-xl p-3 mt-1">
                    <textarea rows="3" placeholder="What needs to be done?"
                        oninput="toggleSubmitBtn('c3', this.value)"
                        class="w-full bg-transparent text-xs text-white placeholder-white/40 focus:outline-none resize-none mb-2">
                    </textarea>
                    <input type="date" id="c3-date" onchange="setDate('c3', this.value)" class="absolute opacity-0 w-0 h-0 pointer-events-none">
                    <div id="c3-assign" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setAssign('c3', 'Elvin Alfabian')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">E</div>
                                <span class="text-white text-xs">Elvin Alfabian</span>
                            </div>
                            <div onclick="setAssign('c3', 'Ibom Gans')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">I</div>
                                <span class="text-white text-xs">Ibom Gans</span>
                            </div>
                            <div onclick="setAssign('c3', 'Syafiq Khayru')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">S</div>
                                <span class="text-white text-xs">Syafiq Khayru</span>
                            </div>
                        </div>
                    </div>
                    <div id="c3-priority" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            <div onclick="setPriority('c3', 'highest', 'fa-angles-up', 'text-red-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-up text-red-500 text-xs"></i><span class="text-red-500 text-xs font-semibold">Highest</span></div>
                            <div onclick="setPriority('c3', 'high', 'fa-angle-up', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-up text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">High</span></div>
                            <div onclick="setPriority('c3', 'medium', 'fa-minus', 'text-orange-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-minus text-orange-400 text-xs"></i><span class="text-orange-400 text-xs font-semibold">Medium</span></div>
                            <div onclick="setPriority('c3', 'low', 'fa-angle-down', 'text-gray-400')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angle-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Low</span></div>
                            <div onclick="setPriority('c3', 'lowest', 'fa-angles-down', 'text-gray-500')" class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition"><i class="fa-solid fa-angles-down text-green-500 text-xs"></i><span class="text-green-500 text-xs font-semibold">Lowest</span></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex items-center gap-3">
                            <i onclick="openDatePicker('c3')" class="fa-regular fa-calendar text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c3-assign')" class="fa-regular fa-user text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('c3-priority')" class="fa-solid fa-flag text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="closeInlineTask('c3')" class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg hover:bg-red-500/30 hover:text-red-400 transition text-white/40 text-xs"><i class="fa-solid fa-xmark"></i></button>
                            <button id="btn-submit-c3" onclick="submitTask('c3')" disabled class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg transition text-white/20 text-xs cursor-not-allowed"><i class="fa-solid fa-arrow-turn-down rotate-90"></i></button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-[295px] bg-[#151515] border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shrink-0">
    
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#C7FF3D]"></span>
                        <p class="text-white text-sm font-semibold">Done</p>
                        <span class="text-xs bg-white/10 text-white/60 px-2 py-0.5 rounded-full">4</span>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/40 text-sm"></i>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-orange-400 text-xs font-semibold">
                            <i class="fa-solid fa-minus"></i> Medium
                        </span>
                        <span class="text-white/40 text-xs">#PRO-102</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-red-500 text-xs font-semibold">
                            <i class="fa-solid fa-angle-up"></i> High
                        </span>
                        <span class="text-white/40 text-xs">#PRO-105</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-green-500 text-xs font-semibold">
                            <i class="fa-solid fa-angle-down"></i> Low
                        </span>
                        <span class="text-white/40 text-xs">#PRO-106</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <div class="bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 text-green-500 text-xs font-semibold">
                            <i class="fa-solid fa-angles-down"></i> Lowest
                        </span>
                        <span class="text-white/40 text-xs">#PRO-106</span>
                    </div>
                    <p class="text-white text-sm font-semibold">Draft initial landing page copy</p>
                    <p class="text-white/50 text-xs">Create the hero section and feature highlights for the main product</p>
                    <div class="flex items-center justify-between mt-1">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                            <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                <i class="fa-regular fa-calendar text-xs"></i> 18 Sept 2026
                            </span>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">S</div>
                    </div>
                </div>

                <button onclick="openInlineTask('todo')" id="btn-todo"
                    class="w-full text-white/40 text-xs border border-white/10 rounded-xl py-2 hover:border-[#C7FF3D] hover:text-white transition mt-1">
                    + Add Task
                </button>

                <div id="form-todo" class="hidden bg-[#000000] border-2 border-[#C7FF3D]/40 rounded-xl p-3 mt-1">

                    <textarea rows="3" placeholder="What needs to be done?"
                        oninput="toggleSubmitBtn('todo', this.value)"
                        class="w-full bg-transparent text-xs text-white placeholder-white/40 focus:outline-none resize-none mb-2">
                    </textarea>

                    
                    <input type="date" id="todo-date" 
                        onchange="setDate('todo', this.value)"
                        class="absolute opacity-0 w-0 h-0 pointer-events-none">

                    <div id="todo-assign" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
                            
                            <div onclick="setAssign('todo', 'Elvin Alfabian')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-blue-500 ...">E</div>
                                <span class="text-white text-xs">Elvin Alfabian</span>
                            </div>

                            <div onclick="setAssign('todo', 'Ibom Gans')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-green-500 ...">I</div>
                                <span class="text-white text-xs">Ibom Gans</span>
                            </div>

                            <div onclick="setAssign('todo', 'Syafiq Khayru')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <div class="w-6 h-6 rounded-full bg-purple-500 ...">S</div>
                                <span class="text-white text-xs">Syafiq Khayru</span>
                            </div>


                        </div>
                    </div>

                    <div id="todo-priority" class="hidden mb-2">
                        <div class="bg-[#111] border border-white/10 rounded-lg overflow-hidden">
        
                            <div onclick="setPriority('todo', 'highest', 'fa-angles-up', 'text-red-500')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <i class="fa-solid fa-angles-up text-red-500 text-xs"></i>
                                <span class="text-red-500 text-xs font-semibold">Highest</span>
                            </div>

                            <div onclick="setPriority('todo', 'high', 'fa-angle-up', 'text-orange-400')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <i class="fa-solid fa-angle-up text-orange-400 text-xs"></i>
                                <span class="text-orange-400 text-xs font-semibold">High</span>
                            </div>

                            <div onclick="setPriority('todo', 'medium', 'fa-minus', 'text-orange-400')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <i class="fa-solid fa-minus text-orange-400 text-xs"></i>
                                <span class="text-orange-400 text-xs font-semibold">Medium</span>
                            </div>

                            <div onclick="setPriority('todo', 'low', 'fa-angle-down', 'text-gray-400')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <i class="fa-solid fa-angle-down text-green-500 text-xs"></i>
                                <span class="text-green-500 text-xs font-semibold">Low</span>
                            </div>

                            <div onclick="setPriority('todo', 'lowest', 'fa-angles-down', 'text-gray-500')"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-white/5 cursor-pointer transition">
                                <i class="fa-solid fa-angles-down text-green-500 text-xs"></i>
                                <span class="text-green-500 text-xs font-semibold">Lowest</span>
                            </div>

                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-1">
                        <div class="flex items-center gap-3">
                            <i onclick="openDatePicker('todo')" 
                               class="fa-regular fa-calendar text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('todo-assign')" 
                               class="fa-regular fa-user text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                            <i onclick="toggleField('todo-priority')" 
                               class="fa-solid fa-flag text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition"></i>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="closeInlineTask('todo')"
                                class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg hover:bg-red-500/30 hover:text-red-400 transition text-white/40 text-xs">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <button id="btn-submit-todo" onclick="submitTask('todo')" disabled
                                class="w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg transition text-white/20 text-xs cursor-not-allowed">
                                <i class="fa-solid fa-arrow-turn-down rotate-90"></i>
                            </button>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <script>

        /* ── Filter Dropdown ── */
        function toggleFilterDropdown() {
            const dd = document.getElementById('filter-dropdown');
            const chevron = document.getElementById('filter-chevron');
            const isHidden = dd.classList.toggle('hidden');
            chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            // Close sub-dropdowns when main closes
            if (isHidden) {
                closeAssignSub();
                closePrioritySub();
                closeDueDateSub();
            }
        }

        function toggleAssignSub(e) {
            e.stopPropagation();
            const sub = document.getElementById('assign-sub');
            const chevron = document.getElementById('assign-chevron');
            const isHidden = sub.classList.toggle('hidden');
            chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            // Close other subs if open
            closePrioritySub();
            closeDueDateSub();
        }

        function closeAssignSub() {
            const sub = document.getElementById('assign-sub');
            const chevron = document.getElementById('assign-chevron');
            if (sub) sub.classList.add('hidden');
            if (chevron) chevron.style.transform = '';
        }

        function toggleDueDateSub(e) {
            e.stopPropagation();
            const sub = document.getElementById('duedate-sub');
            const chevron = document.getElementById('duedate-chevron');
            const isHidden = sub.classList.toggle('hidden');
            chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            // Close other subs if open
            closeAssignSub();
            closePrioritySub();
        }

        function closeDueDateSub() {
            const sub = document.getElementById('duedate-sub');
            const chevron = document.getElementById('duedate-chevron');
            if (sub) sub.classList.add('hidden');
            if (chevron) chevron.style.transform = '';
        }

        function togglePrioritySub(e) {
            e.stopPropagation();
            const sub = document.getElementById('priority-sub');
            const chevron = document.getElementById('priority-chevron');
            const isHidden = sub.classList.toggle('hidden');
            chevron.style.transform = isHidden ? '' : 'rotate(180deg)';
            // Close other subs if open
            closeAssignSub();
            closeDueDateSub();
        }

        function closePrioritySub() {
            const sub = document.getElementById('priority-sub');
            const chevron = document.getElementById('priority-chevron');
            if (sub) sub.classList.add('hidden');
            if (chevron) chevron.style.transform = '';
        }

        function selectFilter(type) {
            const label = {
                assign_elvin: 'Assign: Elvin Alfabian',
                assign_ibom: 'Assign: Ibom Gans',
                assign_syafiq: 'Assign: Syafiq Khayru',
                priority_highest: 'Priority: Highest',
                priority_high: 'Priority: High',
                priority_medium: 'Priority: Medium',
                priority_low: 'Priority: Low',
                priority_lowest: 'Priority: Lowest',
                duedate_newest: 'Due Date ↑',
                duedate_oldest: 'Due Date ↓'
            }[type] || 'Filter';

            const btn = document.getElementById('btn-filter');
            btn.querySelector('span').textContent = label;
            btn.classList.add('border-[#C7FF3D]');
            btn.classList.remove('border-white/30');

            document.getElementById('filter-chevron').style.transform = '';
            document.getElementById('filter-dropdown').classList.add('hidden');
            closeAssignSub();
            closeDueDateSub();
            closePrioritySub();
        }

        function clearFilter() {
            const btn = document.getElementById('btn-filter');
            btn.querySelector('span').textContent = 'Filter';
            btn.classList.remove('border-[#C7FF3D]');
            btn.classList.add('border-white/30');
            document.getElementById('filter-dropdown').classList.add('hidden');
            document.getElementById('filter-chevron').style.transform = '';
            closeAssignSub();
            closeDueDateSub();
            closePrioritySub();
        }

        // Close filter when clicking outside
        document.addEventListener('click', function(e) {
            const wrapper = document.getElementById('filter-wrapper');
            if (wrapper && !wrapper.contains(e.target)) {
                document.getElementById('filter-dropdown').classList.add('hidden');
                document.getElementById('filter-chevron').style.transform = '';
                closeAssignSub();
                closeDueDateSub();
                closePrioritySub();
            }
        });

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        function openInlineTask(col) {
            document.getElementById('btn-' + col).classList.add('hidden');
            document.getElementById('form-' + col).classList.remove('hidden');
        }
        function closeInlineTask(col) {
            document.getElementById('form-' + col).classList.add('hidden');
            document.getElementById('btn-' + col).classList.remove('hidden');
        }

        function toggleField(id) {
            const el = document.getElementById(id);
            el.classList.toggle('hidden');
            if (!el.classList.contains('hidden')) {
                el.focus();
                if (el.type === 'date') el.showPicker(); 
            }
        }

        function setPriority(col, value, icon, color) {
            const flagIcon = document.querySelector(`#form-${col} .fa-flag`);
            flagIcon.className = `fa-solid fa-flag text-sm cursor-pointer hover:text-[#C7FF3D] transition ${color}`;
    
            document.getElementById(`${col}-priority`).classList.add('hidden');
        }



        function setAssign(col, name) {
            const form = document.getElementById('form-' + col);
            form.dataset.assigned = name;

            const userIcon = document.querySelector(`#form-${col} .fa-user`);
            userIcon.className = `fa-regular fa-user text-sm cursor-pointer hover:text-[#C7FF3D] transition text-[#C7FF3D]`;
    
            document.getElementById(`${col}-assign`).classList.add('hidden');
        }

        function toggleSubmitBtn(col, value) {
            const btn = document.getElementById('btn-submit-' + col);
            if (value.trim()) {
                btn.disabled = false;
                btn.className = 'w-7 h-7 flex items-center justify-center bg-[#C7FF3D] rounded-lg hover:bg-[#dfff6f] transition text-black text-xs cursor-pointer';
            } else {
                btn.disabled = true;
                btn.className = 'w-7 h-7 flex items-center justify-center bg-white/10 rounded-lg transition text-white/20 text-xs cursor-not-allowed';
            }
        }


        function submitTask(col) {
            const form = document.getElementById('form-' + col);
            const textarea = form.querySelector('textarea');
            const dateInput = document.getElementById(col + '-date');
            const text = textarea.value.trim();

            if (!text) return;

            const dateVal = dateInput.value 
                ? new Date(dateInput.value).toLocaleDateString('en-GB', {day:'numeric', month:'short', year:'numeric'})
                : '—';

            const assignedName = form.dataset.assigned || '—';
            const assignedInitial = (assignedName && assignedName !== '—') ? assignedName[0].toUpperCase() : 'S';

            const card = document.createElement('div');
            card.className = 'bg-[#000000] border border-white/10 rounded-xl p-3 flex flex-col gap-2';
            card.innerHTML = `
                             <div class="flex items-center justify-between">
                                 <span class="flex items-center gap-1 text-white/40 text-xs font-semibold">
                                     <i class="fa-solid fa-flag"></i> New
                                </span>
                                <span class="text-white/40 text-xs">#PRO-NEW</span>
                            </div>
                            <p class="text-white text-sm font-semibold">${text}</p>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-[9px] text-white/40 uppercase tracking-wider font-semibold">Due date</span>
                                    <span class="flex items-center gap-1.5 text-white font-medium text-xs">
                                        <i class="fa-regular fa-calendar text-xs"></i> ${dateVal}
                                    </span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white">${assignedInitial}</div>
                            </div>
                        `;

            const btn = document.getElementById('btn-' + col);
            btn.parentNode.insertBefore(card, btn);

            textarea.value = '';
            form.dataset.assigned = '';
            closeInlineTask(col);
            toggleSubmitBtn(col, '');
            
            const flagIcon = form.querySelector('.fa-flag');
            const userIcon = form.querySelector('.fa-user');
            const calIcon = form.querySelector('.fa-calendar');
            if (flagIcon) flagIcon.className = 'fa-solid fa-flag text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition';
            if (userIcon) userIcon.className = 'fa-regular fa-user text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition';
            if (calIcon) calIcon.className = 'fa-regular fa-calendar text-white/40 text-sm cursor-pointer hover:text-[#C7FF3D] transition';
            
            if (dateInput.value && fpInstances[col]) fpInstances[col].clear();
        }

        const fpInstances = {};

        function openDatePicker(col) {
            const input = document.getElementById(col + '-date');
    
            if (!fpInstances[col]) {
                fpInstances[col] = flatpickr(input, {
                    dateFormat: "Y-m-d",
                    theme: "dark",
                    onClose: function(selectedDates, dateStr) {
                        if (dateStr) setDate(col, dateStr);
                    }
                });
            }
            fpInstances[col].open();
        }

        function setDate(col, value) {
            if (!value) return;
            const calIcon = document.querySelector(`#form-${col} .fa-calendar`);
            calIcon.className = `fa-regular fa-calendar text-sm cursor-pointer hover:text-[#C7FF3D] transition text-[#C7FF3D]`;
        }

        </script>

    </main>
 
</body>    