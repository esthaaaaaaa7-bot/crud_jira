<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ItensFlow - Team</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_itenas.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }

        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
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

        .bg-neon {
            background-color: #C7FF3D;
        }

        .text-neon {
            color: #C7FF3D;
        }

        .border-neon {
            border-color: #C7FF3D;
        }
    </style>

</head>

<body class="flex h-screen overflow-hidden bg-[#080808] font-sans">
    <!-- BACKDROP GELAP -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden backdrop-blur-sm" onclick="toggleSidebar()">
    </div>
    <!-- SIDEBAR PERSIS ITENSFLOW -->
    <aside id="sidebar" class="fixed lg:relative inset-y-0 left-0 z-50 w-[200px] md:w-56 bg-[#080808] text-white flex flex-col p-5 shadow-lg border-r border-white/10 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <!-- LOGO & BRAND (ItensFlow) -->
        <div class="flex items-center gap-3 mx-4 px-0 md:px-4 pb-4 mb-4 border-b border-white/30">
            <div class="w-8 h-8 rounded-[9px] flex items-center justify-center shrink-0">
                <img src="{{ asset('images/logo_itenas.png') }}" alt="ItensFlow Logo" class="w-8 h-8 rounded-[9px]">
            </div>
            <h2 class="text-md font-bold text-white tracking-wide">
                ItensFlow
            </h2>
        </div>

        <!-- DAFTAR MENU NAVIGASI -->
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
                <a href="{{ url('/board') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg text-gray-400 hover:bg-[#1a1a1a] hover:text-white transition duration-200">
                    <i class="fa-solid fa-table-columns text-sm w-5 text-center"></i>
                    <span class="text-sm">Boards</span>
                </a>
            </li>

            <li>
                <!-- MENU TEAM (SEDANG AKTIF) -->
                <a href="{{ url('/team') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg bg-[#1a1a1a] text-white font-medium border border-[#2a2a2a] transition duration-200">
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
    <!--MAIN CONTENT-->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gradient-glow">
        <!-- HEADER -->
        <header class="flex items-center justify-between py-3 sm:py-4 mb-4 border-b border-white/10 px-8 sticky top-0 z-10 bg-transparent backdrop-blur-lg">
            <!-- SEARCH BAR MENU -->
            <div class="flex items-center gap-3 flex-1">
                <!-- TOMBOL HAMBURGER -->
                <button onclick="toggleSidebar()" class="lg:hidden w-8 h-8 -ml-3 flex items-center justify-center rounded-xl bg-[#151515] border border-white/10 text-gray-400 hover:text-white hover:bg-[#1a1a1a] transition">
                    <i class="fa-solid fa-bars text-xs"></i>
                </button>
                <!-- SEARCH BAR -->
                <div class="flex items-center gap-3 flex-1">
                    <div class="relative w-full max-w-[150px] md:max-w-[280px] lg:max-w-xs xl:max-w-sm -ml-1 sm:-ml-0">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-xs"></i>
                        <input type="text" placeholder="search anything, task, issues..." class="w-full bg-[#151515] border border-white/10 text-xs text-white placeholder-white/50 rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:border-[#C7FF3D] transition">
                    </div>
                </div>

                <div class="flex items-center -mr-4 gap-2">
                    <!-- Mobile: icon only -->
                    <button onclick="openmodal()" class="sm:hidden w-8 h-8 flex items-center justify-center rounded-xl bg-[#C7FF3D] text-black hover:opacity-90 transition">
                        <i class="fa-solid fa-plus text-xs"></i>
                    </button>
                    <!-- Desktop: full label -->
                    <button onclick="openmodal()" class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 bg-[#C7FF3D] text-black text-xs font-bold rounded-lg hover:opacity-90 transition">
                        <i class="fa-solid fa-plus text-[10px]"></i>
                        Create Team
                    </button>
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

        <div class="-mt-1 px-8 py-4">
            <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">Teams</h2>
            <p class="text-xs sm:text-sm text-white/50">Manage and organize your team members.</p>
        </div>

        <main class="flex-1 overflow-y-auto px-8 pb-8">

            {{-- Flash message --}}
            @if (session('success'))
            <div class="mb-4 text-xs text-green-400 bg-green-400/10 border border-green-400/20 rounded-xl px-4 py-3">
                <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
            </div>
            @endif

            <!-- Empty State (tampil kalau $teams kosong) -->
            <div id="empty-state" class="flex flex-col items-center justify-center py-20 text-center max-w-lg mx-auto {{ $teams->isEmpty() ? '' : 'hidden' }}">
                <div class="relative mb-6">
                    <div class="w-24 sm:w-32 h-24 sm:h-32 bg-[#151515] rounded-3xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-users text-3xl text-gray-400"></i>
                    </div>
                    <div class="absolute -bottom-2 right-2 w-8 sm:w-10 h-8 sm:h-10 bg-neon rounded-full flex items-center justify-center text-black font-bold shadow-md border-4 border-[#0e100f]">
                        <i class="fa-solid fa-plus text-sm"></i>
                    </div>
                </div>
                <h2 class="text-xl font-bold text-white mb-2">Bring everyone into one team</h2>
                <p class="text-sm text-gray-400 mb-8 max-w-sm leading-relaxed">
                    Don't go it alone — create a team to start connecting work across apps and celebrating your collective success.
                </p>
                <button onclick="openmodal()" class="bg-neon text-black font-semibold text-sm px-5 py-2 rounded-xl hover:opacity-90 transition">
                    Create Team
                </button>
            </div>

            <!-- Team Table -->
            <div id="team-table-section" class="{{ $teams->isEmpty() ? 'hidden' : '' }}">
                <div class="bg-[#111111] border border-white/10 rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto custom-scroll">
                        <table class="w-full min-w-max text-sm text-left">
                            <thead>
                                <tr class="border-b border-white/10">
                                    <th class="px-6 py-4 text-white text-sm font-semibold">Team Name</th>
                                    <th class="px-6 py-4 text-white text-sm font-semibold">Project</th>
                                    <th class="px-6 py-4 text-white text-sm font-semibold">Members</th>
                                    <th class="px-6 py-4 text-white text-sm font-semibold">Total</th>
                                    <th class="px-6 py-4 text-white text-sm font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="team-table-body">
                                @foreach ($teams as $team)
                                <tr class="border-b border-white/10 hover:bg-white/5 transition" id="team-row-{{ $team->id }}">
                                    <td class="px-6 py-3.5">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-lg bg-[#C7FF3D]/10 flex items-center justify-center">
                                                <i class="fa-solid fa-users text-[#C7FF3D] text-xs"></i>
                                            </div>
                                            <span class="text-white text-sm font-semibold">{{ $team->nama_team }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3.5">
                                        <span class="text-xs text-gray-400">{{ $team->project->nama_project ?? '-' }}</span>
                                    </td>
                                    <td class="px-6 py-3.5">
                                        <div class="flex items-center">
                                            @foreach ($team->users->take(5) as $member)
                                            @php $init = strtoupper(substr($member->name, 0, 1)); @endphp
                                            <div class="w-7 h-7 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0 -ml-1 first:ml-0 border border-[#111]" title="{{ $member->name }}">{{ $init }}</div>
                                            @endforeach
                                            @if ($team->users->count() > 5)
                                            <div class="w-7 h-7 rounded-full bg-gray-600 flex items-center justify-center text-[10px] font-bold text-white shrink-0 -ml-1 border border-[#111]">+{{ $team->users->count() - 5 }}</div>
                                            @endif
                                        </div>
                                        <p class="text-xs text-white/40 mt-0.5">{{ $team->users->pluck('name')->join(', ') }}</p>
                                    </td>
                                    <td class="px-6 py-3.5">
                                        <span class="text-sm text-white/60">{{ $team->users->count() }} member{{ $team->users->count() !== 1 ? 's' : '' }}</span>
                                    </td>
                                    <td class="px-6 py-3">
                                        {{-- Hanya Administrator project ini yang bisa Edit/Delete --}}
                                        @if ($adminProjectIds->contains($team->project_id))
                                        <div class="relative inline-block">
                                            <button data-row-trigger onclick="toggleRowDropdown({{ $team->id }})"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-white/40 hover:bg-white/10 hover:text-white transition">
                                                <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                                            </button>
                                            <div id="row-menu-{{ $team->id }}" data-row-menu
                                                class="hidden absolute right-0 mt-1 w-36 bg-[#1a1a1a] border border-white/10 rounded-xl shadow-xl z-50 overflow-hidden">
                                                <button onclick="openEditModal({{ $team->id }}, '{{ addslashes($team->nama_team) }}', {{ $team->users->pluck('id') }})"
                                                    class="w-full flex items-center gap-2 px-4 py-2.5 text-xs text-white hover:bg-white/5 transition">
                                                    <i class="fa-solid fa-pen-to-square text-[#C7FF3D]"></i> Edit
                                                </button>
                                                <button onclick="deleteTeam({{ $team->id }})"
                                                    class="w-full flex items-center gap-2 px-4 py-2.5 text-xs text-red-400 hover:bg-white/5 transition">
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                        @else
                                        <span class="text-xs text-white/20 px-2">—</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                    <div class="flex justify-between items-center my-2" id="pagination-bar">
                        <p class="text-white text-xs mx-8">
                            Showing {{ $teams->firstItem() ?? 0 }} to {{ $teams->lastItem() ?? 0 }} of {{ $teams->total() }}
                        </p>
                        <div class="flex flex-row gap-1 items-center mx-6">
                            {{-- Prev --}}
                            @if ($teams->onFirstPage())
                            <span class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white/30 text-xs cursor-not-allowed">&#8249;</span>
                            @else
                            <a href="{{ $teams->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8249;</a>
                            @endif

                            {{-- Page numbers --}}
                            @foreach ($teams->getUrlRange(1, $teams->lastPage()) as $page => $url)
                            @if ($page == $teams->currentPage())
                            <button class="w-8 h-8 flex items-center justify-center bg-[#1a1a1a] border border-white/10 rounded-lg text-white text-xs">{{ $page }}</button>
                            @else
                            <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">{{ $page }}</a>
                            @endif
                            @endforeach

                            {{-- Next --}}
                            @if ($teams->hasMorePages())
                            <a href="{{ $teams->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white text-xs hover:bg-[#1a1a1a] transition">&#8250;</a>
                            @else
                            <span class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg text-white/30 text-xs cursor-not-allowed">&#8250;</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </main>
        <!-- CREATE TEAM MODAL -->
        <div id="createTeamModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
            <div class="bg-[#151515] border border-[#232d27] w-full max-w-lg rounded-2xl p-7 shadow-2xl relative text-left">
                <div class="flex items-center gap-3 mb-1">
                    <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-white transition">
                        <i class="fa-solid fa-arrow-left text-sm"></i>
                    </button>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-users text-white text-base"></i>
                        <h3 class="text-lg font-bold text-white tracking-wide">Create Team</h3>
                    </div>
                </div>
                <p class="text-[11px] text-gray-400 mb-5 ml-7">Required fields are marked with an asterisk <span class="text-red-500">*</span></p>
                <div class="border-t border-[#1f2622] pt-5 space-y-5">
                    {{-- Project --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Project <span class="text-red-500">*</span></label>
                        <select id="create-project-id"
                            class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#C7FF3D] transition">
                            <option value="">-- Select Project --</option>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->nama_project }}</option>
                            @endforeach
                        </select>
                        <p id="project-error" class="hidden text-[10px] text-red-400 mt-1">Please select a project.</p>
                    </div>
                    {{-- Team Name --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Team Name <span class="text-red-500">*</span></label>
                        <input id="input-team-name" type="text" placeholder="Enter team name"
                            class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl px-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        <p id="name-error" class="hidden text-[10px] text-red-400 mt-1">Team name is required.</p>
                    </div>
                    {{-- Members --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2">Members <span class="text-red-500">*</span></label>
                        {{-- Search bar --}}
                        <div class="relative mb-2">
                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-white/30 text-[10px]"></i>
                            <input
                                id="create-member-search"
                                type="text"
                                placeholder="Search member by name or username..."
                                oninput="filterMembers('create-member-search', 'create-member-list')"
                                class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl pl-8 pr-4 py-2 text-xs text-white placeholder-gray-600 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                        <div id="create-member-list" class="flex flex-col gap-2 max-h-48 overflow-y-auto">
                            @foreach ($availableUsers as $user)
                            @php $init = strtoupper(substr($user->name, 0, 1)); @endphp
                            <label data-name="{{ strtolower($user->name . ' ' . $user->username) }}" class="flex items-center gap-3 px-3 py-2.5 bg-[#0a0d0b] border border-[#232d27] rounded-xl cursor-pointer hover:border-[#C7FF3D]/50 transition has-[:checked]:border-[#C7FF3D]">
                                <input type="checkbox" value="{{ $user->id }}" class="member-checkbox accent-[#C7FF3D] w-3.5 h-3.5">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">{{ $init }}</div>
                                <div class="flex flex-col leading-tight">
                                    <span class="text-white text-xs">{{ $user->name }}</span>
                                    <span class="text-gray-500 text-[10px]">{{ '@' . $user->username }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        <p id="member-error" class="hidden text-[10px] text-red-400 mt-1">Select at least one member.</p>
                    </div>
                    <div class="flex justify-end items-center gap-3 pt-4 border-t border-[#1f2622]">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-xs font-semibold text-white hover:bg-white/5 rounded-xl transition cursor-pointer">Cancel</button>
                        <button type="button" onclick="submitTeam()" class="px-5 py-2 text-xs font-bold bg-[#C7FF3D] text-black rounded-xl hover:bg-[#b8f52e] transition shadow-sm cursor-pointer">
                            <i class="fa-solid fa-check mr-1"></i> Create
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT TEAM MODAL -->
        <div id="editTeamModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
            <div class="bg-[#151515] border border-[#232d27] w-full max-w-lg rounded-2xl p-7 shadow-2xl relative text-left">
                <div class="flex items-center gap-3 mb-1">
                    <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-white transition">
                        <i class="fa-solid fa-arrow-left text-sm"></i>
                    </button>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-pen-to-square text-[#C7FF3D] text-base"></i>
                        <h3 class="text-lg font-bold text-white tracking-wide">Edit Team</h3>
                    </div>
                </div>
                <p class="text-[11px] text-gray-400 mb-5 ml-7">Update team name or members.</p>
                <div class="border-t border-[#1f2622] pt-5 space-y-5">
                    <input type="hidden" id="edit-team-id">
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Team Name <span class="text-red-500">*</span></label>
                        <input id="edit-team-name" type="text" placeholder="Enter team name"
                            class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl px-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D] transition">
                        <p id="edit-name-error" class="hidden text-[10px] text-red-400 mt-1">Team name is required.</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-2">Members <span class="text-red-500">*</span></label>
                        {{-- Search bar --}}
                        <div class="relative mb-2">
                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-white/30 text-[10px]"></i>
                            <input
                                id="edit-member-search"
                                type="text"
                                placeholder="Search member by name or username..."
                                oninput="filterMembers('edit-member-search', 'edit-member-list')"
                                class="w-full bg-[#0a0d0b] border border-[#232d27] rounded-xl pl-8 pr-4 py-2 text-xs text-white placeholder-gray-600 focus:outline-none focus:border-[#C7FF3D] transition">
                        </div>
                        <div id="edit-member-list" class="flex flex-col gap-2 max-h-48 overflow-y-auto">
                            @foreach ($availableUsers as $user)
                            @php $init = strtoupper(substr($user->name, 0, 1)); @endphp
                            <label data-name="{{ strtolower($user->name . ' ' . $user->username) }}" class="flex items-center gap-3 px-3 py-2.5 bg-[#0a0d0b] border border-[#232d27] rounded-xl cursor-pointer hover:border-[#C7FF3D]/50 transition has-[:checked]:border-[#C7FF3D]">
                                <input type="checkbox" value="{{ $user->id }}" class="edit-member-checkbox accent-[#C7FF3D] w-3.5 h-3.5">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px] font-bold text-white shrink-0">{{ $init }}</div>
                                <div class="flex flex-col leading-tight">
                                    <span class="text-white text-xs">{{ $user->name }}</span>
                                    <span class="text-gray-500 text-[10px]">{{ '@' . $user->username }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        <p id="edit-member-error" class="hidden text-[10px] text-red-400 mt-1">Select at least one member.</p>
                    </div>
                    <div class="flex justify-end items-center gap-3 pt-4 border-t border-[#1f2622]">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-xs font-semibold text-white hover:bg-white/5 rounded-xl transition cursor-pointer">Cancel</button>
                        <button type="button" onclick="saveEdit()" class="px-5 py-2 text-xs font-bold bg-[#C7FF3D] text-black rounded-xl hover:bg-[#b8f52e] transition shadow-sm cursor-pointer">
                            <i class="fa-solid fa-check mr-1"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const CSRF = document.querySelector('meta[name="csrf-token"]').content;

            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebar-backdrop');
                sidebar.classList.toggle('-translate-x-full');
                backdrop.classList.toggle('hidden');
            }

            /* ── SEARCH / FILTER MEMBER ── */
            function filterMembers(searchId, listId) {
                const query = document.getElementById(searchId).value.toLowerCase().trim();
                const labels = document.querySelectorAll('#' + listId + ' label[data-name]');
                labels.forEach(label => {
                    const name = label.getAttribute('data-name');
                    label.style.display = name.includes(query) ? '' : 'none';
                });
            }

            /* ── CREATE MODAL ── */
            function openmodal() {
                document.getElementById('createTeamModal').classList.remove('hidden');
                document.getElementById('input-team-name').value = '';
                document.getElementById('create-project-id').value = '';
                document.getElementById('create-member-search').value = '';
                filterMembers('create-member-search', 'create-member-list'); // reset filter
                document.querySelectorAll('.member-checkbox').forEach(cb => cb.checked = false);
                document.getElementById('name-error').classList.add('hidden');
                document.getElementById('member-error').classList.add('hidden');
                document.getElementById('project-error').classList.add('hidden');
            }

            function closeModal() {
                document.getElementById('createTeamModal').classList.add('hidden');
            }

            function submitTeam() {
                const name = document.getElementById('input-team-name').value.trim();
                const projectId = document.getElementById('create-project-id').value;
                const members = [...document.querySelectorAll('.member-checkbox:checked')].map(cb => cb.value);

                let valid = true;
                if (!projectId) {
                    document.getElementById('project-error').classList.remove('hidden');
                    valid = false;
                } else {
                    document.getElementById('project-error').classList.add('hidden');
                }
                if (!name) {
                    document.getElementById('name-error').classList.remove('hidden');
                    valid = false;
                } else {
                    document.getElementById('name-error').classList.add('hidden');
                }
                if (members.length === 0) {
                    document.getElementById('member-error').classList.remove('hidden');
                    valid = false;
                } else {
                    document.getElementById('member-error').classList.add('hidden');
                }
                if (!valid) return;

                fetch('{{ route("teams.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF
                        },
                        body: JSON.stringify({
                            nama_team: name,
                            project_id: projectId,
                            members
                        })
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            closeModal();
                            // Reload halaman untuk tampilkan data baru dari DB
                            location.reload();
                        }
                    })
                    .catch(() => alert('Gagal membuat team.'));
            }

            /* ── EDIT MODAL ── */
            function openEditModal(teamId, teamName, currentMemberIds) {
                closeAllRowDropdowns();
                document.getElementById('edit-team-id').value = teamId;
                document.getElementById('edit-team-name').value = teamName;
                document.getElementById('edit-member-search').value = '';
                filterMembers('edit-member-search', 'edit-member-list'); // reset filter
                document.querySelectorAll('.edit-member-checkbox').forEach(cb => {
                    cb.checked = currentMemberIds.includes(parseInt(cb.value));
                });
                document.getElementById('edit-name-error').classList.add('hidden');
                document.getElementById('edit-member-error').classList.add('hidden');
                document.getElementById('editTeamModal').classList.remove('hidden');
            }

            function closeEditModal() {
                document.getElementById('editTeamModal').classList.add('hidden');
            }

            function saveEdit() {
                const teamId = document.getElementById('edit-team-id').value;
                const name = document.getElementById('edit-team-name').value.trim();
                const members = [...document.querySelectorAll('.edit-member-checkbox:checked')].map(cb => cb.value);

                let valid = true;
                if (!name) {
                    document.getElementById('edit-name-error').classList.remove('hidden');
                    valid = false;
                } else {
                    document.getElementById('edit-name-error').classList.add('hidden');
                }
                if (members.length === 0) {
                    document.getElementById('edit-member-error').classList.remove('hidden');
                    valid = false;
                } else {
                    document.getElementById('edit-member-error').classList.add('hidden');
                }
                if (!valid) return;

                fetch(`/teams/${teamId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF
                        },
                        body: JSON.stringify({
                            nama_team: name,
                            members
                        })
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            closeEditModal();
                            location.reload();
                        }
                    })
                    .catch(() => alert('Gagal mengupdate team.'));
            }

            /* ── DELETE ── */
            function deleteTeam(teamId) {
                if (!confirm('Yakin ingin menghapus team ini?')) return;

                fetch(`/teams/${teamId}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            // Hapus baris dari tabel langsung (tanpa reload)
                            const row = document.getElementById('team-row-' + teamId);
                            if (row) row.remove();

                            // Kalau tabel kosong, tampilkan empty state
                            const tbody = document.getElementById('team-table-body');
                            if (tbody && tbody.querySelectorAll('tr').length === 0) {
                                document.getElementById('team-table-section').classList.add('hidden');
                                document.getElementById('empty-state').classList.remove('hidden');
                            }
                        }
                    })
                    .catch(() => alert('Gagal menghapus team.'));
            }

            /* ── ROW DROPDOWN ── */
            function toggleRowDropdown(id) {
                const menu = document.getElementById('row-menu-' + id);
                const isHidden = menu.classList.toggle('hidden');
                if (!isHidden) {
                    document.querySelectorAll('[id^="row-menu-"]').forEach(m => {
                        if (m.id !== 'row-menu-' + id) m.classList.add('hidden');
                    });
                }
            }

            function closeAllRowDropdowns() {
                document.querySelectorAll('[id^="row-menu-"]').forEach(m => m.classList.add('hidden'));
            }
            document.addEventListener('click', function(e) {
                if (!e.target.closest('[data-row-trigger]') && !e.target.closest('[data-row-menu]')) {
                    closeAllRowDropdowns();
                }
            });
        </script>
</body>

</html>