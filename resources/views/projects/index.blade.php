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
                <div onclick="openCreateModal()" class="flex items-center gap-1 border border-white/30 py-2 px-4 bg-[#c7ff3d] rounded-lg mt-3 hover:border-[#000000] transition-colors duration-200 cursor-pointer">
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

                <table class="w-full text-sm text-left">

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
                        @forelse($projects as $project)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition">
                            <!-- 1. Project Name & Key -->
                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">{{ $project->nama_project }}</p>
                                <p class="text-[10px] sm:text-xs text-[#C7FF3D] font-mono mt-0.5">{{ $project->key }}</p>
                            </td>

                            <!-- 2. Deskripsi Project -->
                            <td class="px-8 py-3">
                                <p class="text-white text-xs sm:text-sm line-clamp-1">
                                    {{ $project->deskripsi ?? '-' }}
                                </p>
                            </td>

                            <!-- 3. Pembuat / User Login -->
                            <td class="px-8 py-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-[#2a2a2a] border border-white/20 flex items-center justify-center text-[10px] text-white font-bold shrink-0">
                                        <i class="fa-regular fa-user text-xs"></i>
                                    </div>
                                    <span class="text-white text-xs sm:text-sm">{{ session('user')->name ?? 'Owner' }}</span>
                                </div>
                            </td>

                            <!-- 4. Jumlah Task -->
                            <td class="px-8 py-3">
                                <div class="flex items-center">
                                    @php
                                    $priorityClass = match($project->priority) {
                                    'Low' => 'bg-green-500/20 text-green-400',
                                    'Medium' => 'bg-yellow-500/20 text-yellow-400',
                                    'High' => 'bg-red-500/20 text-red-400',
                                    default => 'bg-[#2a2a2a] text-[#C7FF3D]',
                                    };
                                    @endphp
                                    <span class="text-[10px] sm:text-xs font-semibold {{ $priorityClass }} px-2.5 py-1 rounded-lg">
                                        {{ $project->priority }}
                                    </span>
                                </div>
                            </td>

                            <!-- 5. Status Project -->
                            <td class="px-8 py-3">
                                <div class="flex items-center">
                                    <span class="text-[10px] sm:text-xs font-semibold bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-lg">
                                        Active
                                    </span>
                                </div>
                            </td>

                            <!-- 6. Due Date / Deadline -->
                            <td class="px-8 py-3">
                                <p class="font-bold text-white text-xs sm:text-sm">
                                    {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('M d, Y') : '-' }}
                                </p>
                            </td>

                            <!-- 7. Tombol Action Dropdown (Board + Edit + Hapus) -->
                            <td class="px-8 py-3">
                                <div class="relative inline-block">
                                    <button onclick="toggleDropdown(this)" class="w-8 h-8 flex items-center justify-center rounded-lg text-white hover:bg-white/10 transition">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-40 bg-[#1a1a1a] border border-white/10 rounded-xl shadow-xl z-50 overflow-hidden py-1">

                                        <!-- 1. Tombol Buka Kanban Board -->
                                        <a href="{{ url('/board?project_id='.$project->id) }}" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-table-columns text-[#C7FF3D]"></i>
                                            <span>Buka Board</span>
                                        </a>

                                        <!-- 2. Tombol Edit Project -->
                                        <a href="{{ url('/projects/'.$project->id.'/edit') }}" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-white hover:bg-white/5 transition">
                                            <i class="fa-solid fa-pen-to-square text-amber-400"></i>
                                            <span>Edit</span>
                                        </a>

                                        <div class="border-t border-white/10 my-1"></div>

                                        <!-- 3. Tombol Hapus Project -->
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
                        <!-- Ditampilkan jika database masih kosong -->
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
            </script>

            <div id="createProjectModal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm hidden p-4">
                <div class="w-full max-w-lg bg-[#131616] border border-[#1f2622] rounded-2xl p-6  shadow-2xl relative">
                    <h2 class="text-lg font-bold text-white mb-1">Create New Project</h2>
                    <p class="text-xs text-[#9ca3af] mb-6"> Set up a new workspace for your team. You can modify these detail later </p>

                    <form action="{{ url ('/projects') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="modal_project_name" class="block text-[11px] font-semibold tracking-wider text-[#9ca3af] uppercase">
                                    Project Name
                                </label>
                                <input type="text" name="nama_project" id="modal_project_name"
                                    class="w-full mt-2 px-4 py-2 bg-[#1a1d1d] border border-[#2f3533] rounded-xl text-white focus:outline-none focus:border-[#C7FF3D] transition-all"
                                    placeholder="e.g. Q4 Marketing Campaign" required>
                            </div>

                            <div>
                                <label for="modal_project_code" class="block text-[11px] font-semibold tracking-wider text-[#9ca3af] uppercase">
                                    Project description
                                </label>
                                <textarea name="deskripsi" id="modal_project_desc" rows="3"
                                    class="w-full mt-1.5 px-3.5 py-2.5 bg-[#1a1d1d] border border-[#2f3533] rounded-xl text-xs text-white focus:outline-none focus:border-[#C7FF3D] transition-all resize-none"
                                    placeholder="Briefly describe the goals and scope..."></textarea>

                            </div>

                            <div class="space-y-2">
                                <label for="modal_project_name" class="block text-[11px] font-semibold tracking-wider text-[#9ca3af] uppercase">
                                    Deadline
                                </label>
                                <input type="date" name="deadline" id="modal_deadline"
                                    class="w-full mt-2 px-4 py-2.5 bg-[#1a1d1d] border border-[#2f3533] rounded-xl text-white focus:outline-none focus:border-[#C7FF3D] transition-all [color-scheme:dark]"
                                    placeholder="Pilih tanggal deadline" required>
                            </div>

                            <div class="flex justify-end gap-3 pt-4 border-t border-[#1f2622]">

                                <button type="button" onclick="closeCreateModal()"
                                    class="px-5 py-2 text-xs font-semibold text-white hover:bg-[#1a1d1d] transition-colors cursor-pointer">
                                    Cancel
                                </button>

                                <button type="submit"
                                    class="px-5 py-2 text-xs font-semibold bg-[#C7FF3D] text-black font-semibold rounded-xl hover:bg-[#dfff6f] cursor-pointer"><i class="fa-solid fa-check"></i> Oke
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>



</body>

</html>