{{-- ═══════════════════════════════════════════════════════════
     SHARED TOPBAR — digunakan di semua halaman
     @param string $left    : konten kiri (search bar / breadcrumb / judul)
     @param string $extra   : tombol ekstra kanan (misal: "Create Project")
═══════════════════════════════════════════════════════════ --}}
<header style="
    height: 64px;
    background: #0e100f;
    border-bottom: 1px solid #1f2622;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 32px;
    flex-shrink: 0;
    gap: 16px;
">

    {{-- ─── KIRI: konten dinamis per halaman ─── --}}
    <div style="display:flex;align-items:center;gap:12px;flex:1;">
        {!! $left ?? '' !!}
    </div>

    {{-- ─── KANAN: selalu sama di semua halaman ─── --}}
    <div style="display:flex;align-items:center;gap:8px;flex-shrink:0;">

        {{-- Tombol ekstra (misal Create Project) --}}
        @if(!empty($extra))
            {!! $extra !!}
        @endif

        {{-- Bell --}}
        <button style="
            width:38px;height:38px;border-radius:10px;
            background:#131916;border:1px solid #1f2622;
            display:flex;align-items:center;justify-content:center;
            color:#9ca3af;cursor:pointer;position:relative;
            transition:background .15s,color .15s;
        " onmouseover="this.style.color='#fff';this.style.background='#1a2420'"
           onmouseout="this.style.color='#9ca3af';this.style.background='#131916'">
            <i class="fa-regular fa-bell" style="font-size:14px;"></i>
            <span style="
                position:absolute;top:9px;right:9px;
                width:7px;height:7px;background:#ccff00;
                border-radius:50%;border:1.5px solid #0e100f;
            "></span>
        </button>

        {{-- Sun --}}
        <button style="
            width:38px;height:38px;border-radius:10px;
            background:#131916;border:1px solid #1f2622;
            display:flex;align-items:center;justify-content:center;
            color:#9ca3af;cursor:pointer;
            transition:background .15s,color .15s;
        " onmouseover="this.style.color='#fff';this.style.background='#1a2420'"
           onmouseout="this.style.color='#9ca3af';this.style.background='#131916'">
            <i class="fa-regular fa-sun" style="font-size:14px;"></i>
        </button>

        {{-- Help --}}
        <button style="
            width:38px;height:38px;border-radius:10px;
            background:#131916;border:1px solid #1f2622;
            display:flex;align-items:center;justify-content:center;
            color:#9ca3af;cursor:pointer;
            transition:background .15s,color .15s;
        " onmouseover="this.style.color='#fff';this.style.background='#1a2420'"
           onmouseout="this.style.color='#9ca3af';this.style.background='#131916'">
            <i class="fa-regular fa-circle-question" style="font-size:14px;"></i>
        </button>

        {{-- Profile Photo — SELALU foto pertama, tidak pernah berubah --}}
        <img
            src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&crop=faces"
            alt="Profile"
            style="
                width:38px;height:38px;
                border-radius:50%;
                object-fit:cover;
                border:2px solid #ccff00;
                cursor:pointer;
                flex-shrink:0;
                margin-left:4px;
            "
        >
    </div>
</header>
