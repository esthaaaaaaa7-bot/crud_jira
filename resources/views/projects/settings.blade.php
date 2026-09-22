<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Setting</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_itenas.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
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
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
                    <i class="fa-regular fa-folder text-sm w-5 text-center"></i>
                    <span class="text-sm">Projects</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/boards') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
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
                <a href="{{ url('/setting') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
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
        
    <div class="mb-6">
        <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
            <span>Projects</span>
            <i class="fa-solid fa-greater-than text-[10px] text-gray-600"></i>
            <span class="text-[#C7FF3D] font-medium">Q4 Marketing Campaign</span>
            <i class="fa-solid fa-greater-than text-[10px] text-gray-600"></i>
            <span class="text-[#C7FF3D] font-medium">Settings</span>
        </div>
    
        <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Settings</h1>

    </div> 

    <div class="max-w-2xl bg-[#121212] border border-[#262626] rounded-2xl p-6 sm:p-8 shadow-2xl">
        <form action="#" method="POST">
            @csrf
            
    <div class="mb-5">
        <label class="block text-sm font-semibold text-white mb-2"> Timezone </label>
          <div class="relative">
                        <select name="timezone" class="w-full bg-[#0a0a0a] border border-[#2d2d2d] rounded-xl px-4 py-3 text-sm text-gray-200 appearance-none focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                            <option value="Asia/Jakarta" selected>Asia/Jakarta</option>
                            <option value="Asia/Makassar">Asia/Makassar</option>
                            <option value="Asia/Jayapura">Asia/Jayapura</option>
                            <option value="UTC">UTC (Universal Coordinated Time)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
    </div>
 <div class="mb-5">
    <label class="block text-sm font-semibold text-white mb-2">Language/Bahasa</label>
    <div class="relative">
        <select name="language" class="w-full bg-[#0a0a0a] border border-[#2d2d2d] rounded-xl px-4 py-3 text-sm text-gray-200 appearance-none focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                            <option value="indonesian" >Bahasa indonesia</option>
                            <option value="english" >English (United States)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
    </div>
    </div>
    <div class="border-t-[2px] border-[#383838] my-6"></div>

    <div class="mb-6">
        <label class="block text-sm font-semibold text-white mb-2">Watch work items automatically</label>
        <div class="relative mb-2">
            <select name="watch-items" class="w-full bg-[#0a0a0a] border border-[#2d2d2d] rounded-xl px-4 py-3 text-sm text-gray-200 appearance-none focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
                <option value="global" selected>Use global settings</option>
                <option value="Always">ALways watch items i created or comment ona</option>
                <option value="Never">Never watch items automatically</option>
            </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
            <i class="fa-solid fa-chevron-down text-xs"></i>
            </div>
    </div>

<p class="text-xs text-gray-400 leading-relaxed">Control how you watch items. When you Watch an item, you will be notified of change according to your <a href="#" class="text-[#C7FF3D] hover:underline">Notification settings</a>. Note that you may still receive notification about items you items you are not watching based
on other settings.</p>

    </div>

<div class="border-t-[2px] border-[#383838] my-6"></div> 

<div class="mb-8">
     <label class="block text-sm font-semibold text-white mb-2">ProSite homepage</label>
     <div class="relative mb-2">
         <select name="homepage" class="w-full bg-[#0a0a0a] border border-[#2d2d2d] rounded-xl px-4 py-3 text-sm text-gray-200 appearance-none focus:outline-none focus:border-[#C7FF3D] transition cursor-pointer">
            <option value="for_you" selected>For you</option>
            <option value="dashboard">Dashboard</option>
            <option value="projects">Projects</option>
         </select>
         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
            <i class="fa-solid fa-chevron-down text-xs"></i>
            </div>
    </div>
   <p class="text-xs text-gray-400 leading-relaxed">
      Select which page you would like to start on when you visit ProSite. 'For you' highlights work assigned to you or recently updated.
   </p>
   
    <div class="flex items-center justify-end gap-3 pt-2">
        <a href="{{ url('/projects') }}" 
            class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-300 hover:text-white hover:bg-[#1a1a1a] transition">
            Cancel
        </a>
        <button type="button" 
            class="bg-[#C7FF3D] text-black font-semibold text-sm px-6 py-2.5 rounded-xl hover:bg-[#d4ff33] transition-colors shadow-lg shadow-[#C7FF3D]/10">
            Save settings
        </button>
    </div>
</div>




            
        
            
        