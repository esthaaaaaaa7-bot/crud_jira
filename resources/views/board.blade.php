<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Board | ProSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #0e100f;
            --sidebar: #090b0a;
            --topbar: #0e100f;
            --col-bg: #111210;
            --card-bg: #161816;
            --border: #1f2622;
            --border-soft: #1f2622;
            --text-1: #e8ead4;
            --text-2: #9ca3af;
            --text-3: #5a5a5a;
            --lime: #ccff00;
            --lime-dim: rgba(204, 255, 0, 0.08);
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text-1);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ───────── SIDEBAR ───────── */
        .sidebar {
            width: 256px;
            min-width: 256px;
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 24px;
            border-bottom: 1px solid var(--border);
        }

        .logo-box {
            width: 40px;
            height: 40px;
            background: var(--lime);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-box svg {
            width: 22px;
            height: 22px;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-1);
            letter-spacing: 0.01em;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            padding: 16px 12px;
            gap: 4px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-2);
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-1);
        }

        .nav-item.active {
            background: #17201b;
            color: #ffffff;
        }

        .nav-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            opacity: 0.85;
        }

        .nav-item.active svg {
            opacity: 1;
        }

        .sidebar-bottom {
            padding: 10px 12px 24px;
            border-top: 1px solid var(--border);
        }

        /* ───────── MAIN AREA ───────── */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* ───────── TOPBAR ───────── */
        .topbar {
            background: var(--topbar);
            border-bottom: 1px solid var(--border);
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            flex-shrink: 0;
        }

        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
        }

        .breadcrumb-link {
            color: var(--text-2);
            text-decoration: none;
            transition: color 0.15s;
        }

        .breadcrumb-link:hover {
            color: var(--text-1);
        }

        .breadcrumb-sep {
            color: var(--text-3);
            font-size: 12px;
        }

        .breadcrumb-current {
            color: var(--text-1);
            font-weight: 500;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .icon-btn {
            width: 32px;
            height: 32px;
            border-radius: 7px;
            border: none;
            background: transparent;
            color: var(--text-2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            position: relative;
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, 0.07);
            color: var(--text-1);
        }

        .icon-btn svg {
            width: 17px;
            height: 17px;
        }

        .notif-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            background: #f97316;
            border-radius: 50%;
            border: 1.5px solid var(--topbar);
        }

        .avatar-sm {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #2d4a6b;
            color: #93c5fd;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1.5px solid var(--border);
            cursor: pointer;
        }

        /* ───────── BOARD CONTENT AREA ───────── */
        .board-area {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* ───────── BOARD HEADER ───────── */
        .board-header {
            padding: 22px 24px 16px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .board-title {
            font-size: 26px;
            font-weight: 800;
            color: #f0f0f0;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .board-subtitle {
            font-size: 13px;
            color: var(--text-2);
            font-weight: 400;
        }

        .board-header-right {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 4px;
        }

        .avatar-group {
            display: flex;
            align-items: center;
        }

        .avatar-group .avatar-sm {
            margin-left: -8px;
            border: 2px solid var(--bg);
        }

        .avatar-group .avatar-sm:first-child {
            margin-left: 0;
        }

        .avatar-sm.color-a {
            background: #3b2a4a;
            color: #c084fc;
        }

        .avatar-sm.color-b {
            background: #1a3a2a;
            color: #4ade80;
        }

        .avatar-sm.color-c {
            background: #2a1a3a;
            color: #a78bfa;
        }

        .avatar-sm.color-d {
            background: #2d4a6b;
            color: #93c5fd;
        }

        .avatar-sm.color-e {
            background: #3a2a1a;
            color: #fb923c;
        }

        .avatar-more {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #222;
            color: var(--text-2);
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: -8px;
            border: 2px solid var(--bg);
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 7px 13px;
            border-radius: 7px;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--text-2);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-1);
            border-color: #3a3a3a;
        }

        .filter-btn svg {
            width: 14px;
            height: 14px;
        }

        /* ───────── COLUMNS WRAPPER ───────── */
        .columns-wrapper {
            flex: 1;
            display: flex;
            gap: 14px;
            padding: 0 24px 24px;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .columns-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .columns-wrapper::-webkit-scrollbar-track {
            background: transparent;
        }

        .columns-wrapper::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 3px;
        }

        /* ───────── COLUMN ───────── */
        .column {
            width: 270px;
            min-width: 270px;
            background: var(--col-bg);
            border-radius: 12px;
            border: 1px solid var(--border-soft);
            display: flex;
            flex-direction: column;
            max-height: 100%;
            overflow: hidden;
        }

        .column-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 14px 11px;
            flex-shrink: 0;
            border-bottom: 1px solid var(--border-soft);
        }

        .col-header-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .col-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dot-gray {
            background: #6b7280;
        }

        .dot-lime {
            background: #c8f135;
        }

        .dot-purple {
            background: #a855f7;
        }

        .dot-green {
            background: #22c55e;
        }

        .col-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-1);
        }

        .col-count {
            background: #252525;
            color: var(--text-2);
            font-size: 11px;
            font-weight: 600;
            padding: 1px 7px;
            border-radius: 20px;
            border: 1px solid var(--border);
        }

        .col-more {
            background: none;
            border: none;
            color: var(--text-3);
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 3px 4px;
            border-radius: 5px;
            transition: background 0.15s, color 0.15s;
        }

        .col-more:hover {
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-2);
        }

        .col-more svg {
            width: 14px;
            height: 14px;
        }

        .column-cards {
            flex: 1;
            overflow-y: auto;
            padding: 10px 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .column-cards::-webkit-scrollbar {
            width: 4px;
        }

        .column-cards::-webkit-scrollbar-track {
            background: transparent;
        }

        .column-cards::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 2px;
        }

        /* ───────── CARD ───────── */
        .card {
            background: var(--card-bg);
            border: 1px solid #282828;
            border-radius: 10px;
            padding: 12px 13px;
            cursor: pointer;
            transition: border-color 0.2s, transform 0.1s;
        }

        .card:hover {
            border-color: #3a3a3a;
            transform: translateY(-1px);
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .card-badges {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge {
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 4px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .badge-high {
            background: rgba(239, 68, 68, 0.18);
            color: #f87171;
        }

        .badge-medium {
            background: rgba(234, 179, 8, 0.18);
            color: #fbbf24;
        }

        .badge-low {
            background: rgba(34, 197, 94, 0.18);
            color: #4ade80;
        }

        .card-id {
            font-size: 11px;
            color: var(--text-3);
            font-weight: 500;
        }

        .card-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-1);
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .card-desc {
            font-size: 12px;
            color: var(--text-2);
            line-height: 1.5;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .progress-wrap {
            margin-bottom: 10px;
        }

        .progress-bar-bg {
            height: 4px;
            background: #2a2a2a;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--lime);
            border-radius: 4px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11.5px;
            color: var(--text-3);
        }

        .meta-item svg {
            width: 12px;
            height: 12px;
        }

        .card-avatars {
            display: flex;
            align-items: center;
        }

        .card-avatars .avatar-sm {
            width: 24px;
            height: 24px;
            font-size: 9px;
            margin-left: -6px;
            border: 1.5px solid var(--card-bg);
        }

        .card-avatars .avatar-sm:first-child {
            margin-left: 0;
        }

        .subtask-info {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            color: var(--text-3);
            margin-bottom: 8px;
        }

        .subtask-info svg {
            width: 12px;
            height: 12px;
        }

        .subtask-extra {
            background: #252525;
            color: var(--text-2);
            font-size: 10px;
            font-weight: 600;
            padding: 1px 5px;
            border-radius: 4px;
            margin-left: 2px;
        }

        .due-today {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            color: var(--text-2);
            margin-bottom: 8px;
        }

        .due-today svg {
            width: 12px;
            height: 12px;
            color: var(--text-3);
        }

        .badge-completed {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(34, 197, 94, 0.12);
            color: #4ade80;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 9px;
            border-radius: 5px;
            margin-top: 8px;
        }

        .badge-completed svg {
            width: 11px;
            height: 11px;
        }

        .review-count {
            background: #252525;
            color: var(--text-2);
            font-size: 10px;
            font-weight: 600;
            padding: 2px 6px;
            border-radius: 4px;
            border: 1px solid #333;
        }

        .add-task-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: calc(100% - 20px);
            margin: 0 10px 10px;
            padding: 8px;
            border: 1px dashed #2d2d2d;
            border-radius: 8px;
            background: transparent;
            color: var(--text-3);
            font-size: 12.5px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }

        .add-task-btn:hover {
            background: rgba(255, 255, 255, 0.03);
            color: var(--text-2);
            border-color: #3a3a3a;
        }

        .add-task-btn svg {
            width: 13px;
            height: 13px;
        }
    </style>
</head>

<body>

    <aside class="w-64 bg-[#090b0a] border-r border-[#1f2622] flex flex-col justify-between select-none flex-shrink-0" style="min-width:256px;height:100vh;">
        <div>
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="bg-[#ccff00] rounded-xl flex items-center justify-center flex-shrink-0" style="width:40px;height:40px;">
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
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#17201b] text-white font-medium text-sm">
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

    <!-- ═══ MAIN ═══ -->
    <div class="main">

        <!-- ─── TOPBAR ─── -->
        <header style="display:flex;align-items:center;justify-content:space-between;padding:12px 32px;border-bottom:1px solid rgba(255,255,255,0.08);position:sticky;top:0;z-index:10;backdrop-filter:blur(12px);">

            <div style="display:flex;align-items:center;gap:8px;flex:1;">
                {{-- Breadcrumb --}}
                <div style="display:flex;align-items:center;gap:6px;font-size:13px;">
                    <a href="{{ url('/projects') }}" style="color:#9ca3af;text-decoration:none;">Boards</a>
                    <span style="color:#5a5a5a;font-size:12px;">›</span>
                    <span style="color:#e8ead4;font-weight:500;">
                        {{ isset($project) ? $project->nama_project : 'Board' }}
                    </span>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:8px;">
                <button style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;border-radius:10px;background:#111;border:1px solid rgba(255,255,255,0.1);color:#9ca3af;cursor:pointer;">
                    <i class="fa-regular fa-bell" style="font-size:13px;"></i>
                </button>
                <button style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;border-radius:10px;background:#111;border:1px solid rgba(255,255,255,0.1);color:#9ca3af;cursor:pointer;">
                    <i class="fa-regular fa-sun" style="font-size:13px;"></i>
                </button>
                <button style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;border-radius:10px;background:#111;border:1px solid rgba(255,255,255,0.1);color:#9ca3af;cursor:pointer;">
                    <i class="fa-regular fa-user" style="font-size:13px;"></i>
                </button>
            </div>

        </header>

        <!-- ─── BOARD AREA ─── -->
        <div class="board-area">

            <div class="board-header">
                <div>
                    <h1 class="board-title">Q4 Marketing Campaign</h1>
                    <p class="board-subtitle">Manage deliverables and assets for the upcoming launch.</p>
                </div>
                <div class="board-header-right">
                    <div class="avatar-group">
                        <div class="avatar-sm color-a">JR</div>
                        <div class="avatar-sm color-b">SK</div>
                        <div class="avatar-sm color-c">ML</div>
                        <div class="avatar-more">+3</div>
                    </div>
                    <button class="filter-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>

            <!-- ─── KANBAN COLUMNS ─── -->
            <div class="columns-wrapper">
                <div class="column">
                    <div class="column-header">
                        <div class="col-header-left">
                            <span class="col-dot dot-gray"></span>
                            <span class="col-title">To Do</span>
                            <span class="col-count">3</span>
                        </div>
                        <button class="col-more">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="5" cy="12" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="19" cy="12" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="column-cards">
                        <!-- Card 1 -->
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"><span class="badge badge-high">HIGH</span></div>
                                <span class="card-id">#PRO-102</span>
                            </div>
                            <div class="card-title">Draft initial landing page copy</div>
                            <div class="card-desc">Create the hero section and feature highlights for the main product</div>
                            <div class="card-footer">
                                <div class="card-meta">
                                    <span class="meta-item">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                        </svg>
                                        2
                                    </span>
                                    <span class="meta-item">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        1
                                    </span>
                                </div>
                                <div class="card-avatars">
                                    <div class="avatar-sm color-e">TK</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"><span class="badge badge-medium">MEDIUM</span></div>
                                <span class="card-id">#PRO-105</span>
                            </div>
                            <div class="card-title">Source stock images for<br>ad creatives</div>
                            <div class="card-footer">
                                <div class="card-meta">
                                    <span class="meta-item">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                        </svg>
                                        0
                                    </span>
                                </div>
                                <div class="card-avatars">
                                    <div class="avatar-sm color-b">SK</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="add-task-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Add Task
                    </button>
                </div>

                <!-- ══ IN PROGRESS ══ -->
                <div class="column">
                    <div class="column-header">
                        <div class="col-header-left">
                            <span class="col-dot dot-lime"></span>
                            <span class="col-title">In Progress</span>
                            <span class="col-count">2</span>
                        </div>
                        <button class="col-more">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="5" cy="12" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="19" cy="12" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="column-cards">
                        <!-- Card 1 -->
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"><span class="badge badge-high">HIGH</span></div>
                                <span class="card-id">#PRO-098</span>
                            </div>
                            <div class="card-title">Design UI mockups for mobile app</div>
                            <div class="progress-wrap">
                                <div class="progress-bar-bg">
                                    <div class="progress-bar-fill" style="width:60%"></div>
                                </div>
                            </div>
                            <div class="subtask-info">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 11 12 14 22 4" />
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                                </svg>
                                3/5 <span class="subtask-extra">+1</span>
                            </div>
                            <div class="card-footer">
                                <div class="card-meta"></div>
                                <div class="card-avatars">
                                    <div class="avatar-sm color-a">JR</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"><span class="badge badge-low">LOW</span></div>
                                <span class="card-id">#PRO-101</span>
                            </div>
                            <div class="card-title">Update branding guidelines PDF</div>
                            <div class="card-footer">
                                <div class="card-meta"></div>
                                <div class="card-avatars">
                                    <div class="avatar-sm color-c">ML</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ══ REVIEW ══ -->
                <div class="column">
                    <div class="column-header">
                        <div class="col-header-left">
                            <span class="col-dot dot-purple"></span>
                            <span class="col-title">Review</span>
                            <span class="col-count">1</span>
                        </div>
                        <button class="col-more">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="5" cy="12" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="19" cy="12" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="column-cards">
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"><span class="badge badge-medium">MEDIUM</span></div>
                                <span class="card-id">#PRO-085</span>
                            </div>
                            <div class="card-title">Finalize Q3 Analytics Report</div>
                            <div class="card-desc">Awaiting final approval from the marketing director before...</div>
                            <div class="due-today">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                                Due Today
                            </div>
                            <div class="card-footer">
                                <div class="card-meta"></div>
                                <span class="review-count">1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ══ DONE ══ -->
                <div class="column">
                    <div class="column-header">
                        <div class="col-header-left">
                            <span class="col-dot dot-green"></span>
                            <span class="col-title">Done</span>
                            <span class="col-count">1</span>
                        </div>
                        <button class="col-more">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="5" cy="12" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="19" cy="12" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="column-cards">
                        <div class="card">
                            <div class="card-top">
                                <div class="card-badges"></div>
                                <span class="card-id">#PRO-072</span>
                            </div>
                            <div class="card-title">Setup email campaign automation</div>
                            <div class="badge-completed">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Completed
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end columns-wrapper -->
        </div><!-- end board-area -->
    </div><!-- end main -->

</body>

</html>