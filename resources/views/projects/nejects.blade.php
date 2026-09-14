<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project | ProSite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif']
                    },
                    colors: {
                        bgmain: '#0e100f',
                        bgsidebar: '#090b0a',
                        bgcard: '#131916',
                        bghover: '#131916',
                        bginput: '#131916',
                        bdr: '#171c19',
                        bdr2: '#1f2622',
                        txprimary: '#e8ead4',
                        txsecond: '#9ca3af',
                        txmuted: '#5a5a5a',
                        brandlime: '#ccff00',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #252820;
            border-radius: 4px;
        }

        .bg-glow {
            position: relative;
        }

        .bg-glow::after {
            content: '';
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 300px;
            background: radial-gradient(ellipse at 50% 110%, rgba(30, 80, 30, 0.30) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-bgmain text-txprimary flex h-screen overflow-hidden bg-glow">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-bgsidebar border-r border-bdr flex flex-col justify-between select-none flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="bg-brandlime rounded-xl flex items-center justify-center flex-shrink-0" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                        <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-white">ProSite</span>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-bghover text-white font-medium text-sm">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;">
                        <rect x="3" y="3" width="5" height="18" rx="1" />
                        <rect x="10" y="3" width="5" height="12" rx="1" />
                        <rect x="17" y="3" width="4" height="8" rx="1" />
                    </svg> Board
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                    <i class="fa-regular fa-square-check text-base"></i> Task
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                    <i class="fa-regular fa-user text-base"></i> Team
                </a>
                @if((session('user')->id_jabatan ?? 0) == 1)
                <a href="{{ url('/users') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                    <i class="fa-solid fa-user-gear text-base"></i> User
                </a>
                @endif
            </nav>
        </div>

        <!-- Settings di Bawah Sidebar -->
        <div class="px-3 pb-6">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-bghover font-medium text-sm transition">
                <i class="fa-solid fa-gear text-base"></i> Settings
            </a>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden bg-bgmain">

        {{-- Topbar --}}
        @include('partials.topbar', [
            'left' => '<div style="display:flex;align-items:center;gap:6px;font-size:13px;color:#9ca3af;font-weight:500;">
                <span>Projects</span>
                <i class="fa-solid fa-chevron-right" style="font-size:9px;color:#5a5a5a;"></i>
                <span style="color:#e8ead4;font-weight:600;">New Project</span>
            </div>'
        ])

        {{-- Page content --}}
        <div class="flex-1 overflow-y-auto p-8 flex items-center justify-center">

            <div class="w-full max-w-2xl bg-bgcard border border-bdr rounded-2xl p-8 shadow-2xl">
                <h2 class="text-xl font-bold mb-1.5">Create New Project</h2>
                <p class="text-xs text-txsecond mb-6">Set up a new workspace for your team. You can modify these details later.</p>

                <form action="{{ url('/projects') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Project Name --}}
                    <div class="space-y-2">
                        <label for="project_name" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Project Name</label>
                        <input type="text" id="project_name" name="nama_project" required
                            placeholder="e.g. Q4 Marketing Campaign"
                            class="w-full bg-transparent border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors">
                    </div>

                    {{-- Project Description --}}
                    <div class="space-y-2">
                        <label for="project_desc" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Project Description</label>
                        <textarea id="project_desc" name="deskripsi" rows="4"
                            placeholder="Briefly describe the goals and scope..."
                            class="w-full bg-transparent border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors resize-none"></textarea>
                    </div>

                    {{-- Deadline --}}
                    <div class="space-y-2">
                        <label for="deadline" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Deadline</label>
                        <input type="date" id="deadline" name="deadline" required
                            class="w-full bg-transparent border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors">
                    </div>

                    {{-- Form Actions --}}
                    <div class="flex justify-end gap-3 pt-4 border-t border-bdr/40">
                        <a href="{{ url('/projects') }}"
                            class="px-5 py-2.5 rounded-lg border border-bdr text-xs font-semibold text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-5 py-2.5 rounded-lg bg-brandlime text-black text-xs font-bold flex items-center gap-1.5 hover:bg-opacity-95 transition-all">
                            <i class="fa-solid fa-check"></i> Oke
                        </button>
                    </div>

                </form>
            </div>

        </div>{{-- /page --}}
    </div>{{-- /main --}}

</body>

</html>