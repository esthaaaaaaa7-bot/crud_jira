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
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            lime: '#CCFF00',
                            dark: '#0e100f',
                            sidebar: '#090b0a',
                            card: '#131916',
                            border: '#1f2622',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-neon {
            background-color: #ccff00;
        }

        .text-neon {
            color: #ccff00;
        }

        /* Efek Glow Hijau di Latar Belakang */
        .bg-glow {
            background: radial-gradient(circle at 20% 20%, rgba(204, 255, 0, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(204, 255, 0, 0.03) 0%, transparent 40%);
        }
    </style>
</head>

<body class="bg-[#0e100f] text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0 bg-glow">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#090b0a] border-r border-[#171c19] flex flex-col justify-between select-none flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="rounded-xl flex items-center justify-center flex-shrink-0 bg-neon" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-white">ProSite</span>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#17201b] text-white font-medium text-sm">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
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
    <main class="flex-1 flex flex-col min-w-0">

        <!-- HEADER TOP BAR -->
        @include('partials.topbar', [
            'left' => '<div style="display:flex;align-items:center;gap:8px;background:#131916;border:1px solid #1f2622;border-radius:20px;padding:8px 16px;width:320px;">
                <i class="fa-solid fa-magnifying-glass" style="color:#6b7280;font-size:12px;"></i>
                <input type="text" placeholder="Search anything, tasks, issues..."
                    style="background:transparent;border:none;outline:none;color:#d1d5db;font-size:13px;width:100%;font-family:inherit;"
                    placeholder-color="#6b7280">
            </div>',
            'extra' => '<a href="' . url('/projects/create') . '" style="
                background:#ccff00;color:#000;font-weight:600;font-size:13px;
                padding:8px 16px;border-radius:20px;text-decoration:none;
                display:flex;align-items:center;gap:6px;white-space:nowrap;
                font-family:inherit;
            ">
                <i class="fa-solid fa-plus" style="font-size:11px;"></i> Create Project
            </a>'
        ])

        <!-- PAGE CONTENT CONTAINER -->
        <div class="p-8 space-y-6 overflow-y-auto">

            <!-- Title & Filters -->
            <div>
                <h1 class="text-2xl font-bold text-white">Projects</h1>
                <p class="text-sm text-gray-400 mt-0.5">Manage and track all ongoing project streams</p>

                <div class="flex items-center gap-3 mt-4">
                    <button class="bg-brand-card border border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-300">
                        Status: <span class="text-white font-medium">All</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                    </button>
                    <button class="bg-brand-card border border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-300">
                        Priority: <span class="text-white font-medium">High</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- GRID LAYOUT -->
            <div class="grid grid-cols-12 gap-6">

                <!-- PROJECT CARDS GRID (Left 8 Columns) -->
                <div class="col-span-8 grid grid-cols-2 gap-4">

                    @forelse($projects as $project)
                    <a href="{{ url('/projects/' . $project->id) }}" class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-[#ccff00] transition group">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white group-hover:text-brand-lime transition">{{ $project->nama_project }}</h3>
                                    <span class="text-[11px] text-gray-400 font-mono">KEY: {{ $project->key }}</span>
                                </div>
                                <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Active</span>
                            </div>
                            @if($project->deskripsi)
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2">{{ $project->deskripsi }}</p>
                            @endif
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Tasks</span>
                                    <span class="text-white font-semibold">{{ $project->tasks_count ?? 0 }} Tasks</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-amber-400"><span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Prosite Workspace</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d M Y') : 'No Deadline' }}</span>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-2 bg-brand-card border border-brand-border/80 rounded-2xl p-10 text-center flex flex-col items-center justify-center space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-brand-lime/10 flex items-center justify-center text-brand-lime">
                            <i class="fa-solid fa-folder-plus text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">Belum ada proyek</h3>
                            <p class="text-xs text-gray-400 mt-1">Buat proyek baru pertama Anda untuk memulai manajemen tugas Jira-style.</p>
                        </div>
                        <a href="{{ url('/projects/create') }}" class="bg-brand-lime text-black font-semibold text-xs px-4 py-2.5 rounded-xl flex items-center gap-2 hover:opacity-90 transition">
                            <i class="fa-solid fa-plus"></i> Buat Proyek Baru
                        </a>
                    </div>
                    @endforelse

                </div>

                <!-- RIGHT SIDE STATS (Right 4 Columns) -->
                <div class="col-span-4 space-y-4">

                    <!-- Summary Card -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-5">
                        <h3 class="text-sm font-semibold text-white mb-4">Project Status Summary</h3>

                        <div class="space-y-3 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-gray-300">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Total Proyek
                                </span>
                                <span class="font-bold text-white">{{ count($projects) }} Projects</span>
                            </div>
                        </div>
                    </div>

                    <!-- Overall Efficiency Card -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-5">
                        <h3 class="text-sm font-semibold text-white mb-4">Overall Efficiency</h3>

                        <div>
                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="text-gray-400">On-Time Delivery</span>
                                <span class="font-bold text-white">94.2%</span>
                            </div>
                            <div class="w-full bg-gray-800 rounded-full h-1.5">
                                <div class="bg-brand-lime h-1.5 rounded-full" style="width: 94.2%"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Script Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>

</html>