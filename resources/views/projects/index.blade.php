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
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium transition duration-200 border border-[#2a2a2a]">
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
                <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200 mt-2">
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

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">All Projects</h2>
                <h1 class="text-xs sm:text-md text-white">Manage and track all ongoing work across projects.</h1>
            </div>

               <div class="flex flex-row gap-2">

                    <div class="flex items-center gap-1 border border-white/30 py-2 px-4 bg-[#c7ff3d] rounded-lg mt-3 hover:border-[#000000] transition-colors duration-200">
                      <i class="fa-solid fa-plus text-black text-xs"></i>
                      <button class="text-black font-black text-xs">Create Project</button>
                   </div>

                    <div class="flex items-center gap-1 border border-white/30 py-2 px-4 bg-[#000000] rounded-lg mt-3 hover:border-[#C7FF3D] transition-colors duration-200">
                      <i class="fa-solid fa-filter text-white text-xs"></i> 
                      <button class="text-white text-xs">Filter</button>
                    </div>

               </div>
                
        </div>

        <div class="bg-[#111111] border border-white/10 rounded-2xl mt-8"> 
                    
            <div class="overflow-x-auto">

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

                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                                <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>

                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs  font-bold bg-orange-500/20 text-orange-400 px-2 py-0.5 rounded-lg">High</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] font-bold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">In Progress</span>
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

                                   <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                            <button class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                               <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                               Edit
                                          </button>

                                          <button class="w-full flex items-center gap-2 px-4 py-2.5 
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

                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                                <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>
                                
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-red-500/20 text-red-400 px-2 py-0.5 rounded-lg">Critical</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                
                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">To Do</span>
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

                                   <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                            <button class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                               <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                               Edit
                                          </button>

                                          <button class="w-full flex items-center gap-2 px-4 py-2.5 
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

                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                                <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>
                                
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-red-500/20 text-red-400 px-2 py-0.5 rounded-lg">Critical</span>
                                </div>
                                
                            </td>

                            <td class="px-8 py-3">
                                
                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-[#2a2a2a] text-white px-2 py-0.5 rounded-lg">In Progress</span>
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

                                   <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                            <button class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                               <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                               Edit
                                          </button>

                                          <button class="w-full flex items-center gap-2 px-4 py-2.5 
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

                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                                <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>
                                
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-orange-500/20 text-orange-400 px-2 py-0.5 rounded-lg">High</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">
                                
                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-[#C7FF3D]/20 text-[#C7FF3D] px-2 py-0.5 rounded-lg">Done</span>
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

                                   <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                            <button class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                               <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                               Edit
                                          </button>

                                          <button class="w-full flex items-center gap-2 px-4 py-2.5 
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

                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 
                                                flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                                <i class="fa-regular fa-user text-xs sm:text-sm"></i>
                                    </div>

                                    <span class="text-white text-xs sm:text-sm">John Doe</span>
                                </div>
                                
                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-green-500/20 text-green-400 px-2 py-0.5 rounded-lg">Low</span>
                                </div>

                            </td>

                            <td class="px-8 py-3">

                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-[#C7FF3D]/20 text-[#C7FF3D] px-2 py-0.5 rounded-lg">Done</span>
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

                                   <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 
                                               bg-[#1a1a1a] border border-white/10 rounded-xl 
                                               shadow-xl z-50 overflow-hidden">

                                            <button class="w-full flex items-center gap-2 px-4 py-2.5 
                                                           text-xs text-white hover:bg-white/5 transition">
                                               <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i>
                                               Edit
                                          </button>

                                          <button class="w-full flex items-center gap-2 px-4 py-2.5 
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
                    <button class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8249;</button>
                    <button class="w-8 h-8 flex items-center justify-center bg-[#1a1a1a] border border-white/10 rounded-lg text-white text-xs transition">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">3</button>
                    <span class="w-8 h-8 flex items-center justify-center rounded-lg text-white">...</span>
                    <button class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8250;</button>
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


    </script>

</body>

</html>


   