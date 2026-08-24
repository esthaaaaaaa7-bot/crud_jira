<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ProSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
 <!-- nge hapus smua jarak bawaan browser-->
<style>
    *, *::before, *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        background-color: #000000;
        background-image: radial-gradient(circle at 0% 0%, rgba(199, 255, 61, 0.3) 0%, transparent 30%),
        radial-gradient(circle at 100% 100%, rgba(199, 255, 61, 0.3) 0%, transparent 30%);
    
    }
    

    input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    background: #0a0a0a;        
    border: 2px solid #C7FF3D;  
    border-radius: 4px;
    cursor: pointer;
    position: relative;
    flex-shrink: 0;
    transition: background 0.15s;
    }

    input[type="checkbox"]:checked {
    background: #C7FF3D;
    }

    input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 5px;
    width: 5px;
    height: 8px;
    border: 2px solid #000000ff; 
    border-top: none;
    border-left: none;
    transform: rotate(45deg);
    }

    </style>
 <!-- kartu utama pada tampilan -->
<body>
    <div class="min-h-screen w-screen flex flex-col justify-center items-center py-16">
          <div class="w-full max-w-[370px] bg-[#151515] border border-[#303030] rounded-[18px] pt-10 pb-6 px-7 flex flex-col items-center shadow-2xl">
              <div class="text-center flex flex-col items-center mb-6">
                
                  <div class="w-14 h-14 bg-[#15111B] border border-[#303030] rounded-[16px] flex items-center justify-center mb-3 shadow-lg">
                      <div class="w-8 h-8 bg-[#C7FF3D] rounded-[9px] flex items-center justify-center">
                         <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                             <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                             <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                             <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="#0a0a0a" stroke-width="2.2" fill="none" />
                         </svg>
                      </div>
                 </div>

                <span class="text-[11px] font-bold tracking-[0.15em] text-gray-400 uppercase mb-2">ProSite</span>
                <h1 class="text-xl font-bold text-white mb-1.5">Welcome Back</h1>
                <p class="text-xs text-gray-400">Sign in to continue managing your projects</p>
            </div>

             <!-- salah -->
            <div class="w-full">
                @if(session('error'))
                    <div class="w-full bg-red-950/40 border border-red-500/30 text-red-200 text-xs px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                        <span>{{ session('error') }}</span>   
                    </div>
                @endif

                 <!-- lupa -->
                @if($errors->any())
                    <div class="w-full bg-red-950/40 border border-red-500/30 text-red-200 text-xs px-4 py-3 rounded-lg mb-4 flex flex-col gap-2">
                        @foreach($errors->all() as $error)
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                <span>{{ $error }}</span> 
                            </div>
                        @endforeach
                    </div>
                @endif

                 <!-- inti nya pas ngirim data langsung ke fungsi login ke server laravel -->
                <form class="w-full" method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3.5 w-full">
                        <label class="block text-[10px] font-semibold text-white tracking-widest uppercase mb-1.5">Username</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </span>
                  <!-- fitur klo misal si user udah masukin password atau username jadi kga harus ngisi dari awal -->
                        <input 
                        type="text"
                        name="username" 
                        placeholder="developer"
                        value="{{ old('username') }}"
                        class="w-full bg-[#000000] border border-[#2d2d2d] rounded-lg pl-10 pr-4 py-2.5
                               text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D]">
                        </div>
                    </div>


                    <div class="mb-4 w-full">
                        <label class="block text-[10px] font-semibold text-white tracking-widest uppercase mb-1.5">Password</label>
                          <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                              <i class="fa-solid fa-lock text-sm"></i>
                            </span>
                             <!-- inti nya ini tuh fungsi buat input user dan pwrd jadi pas di klik tuh muncul warna ijo ijo di border nya -->
                        <input 
                        type="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="w-full bg-[#000000] border border-[#2d2d2d] rounded-lg pl-10 pr-12 py-2.5 
                               text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:border-[#C7FF3D]">
                        <button type="button" id="toggleBtn" class="absolute right-4 text-gray-400 hover:text-gray-200 border-none bg-transparent cursor-pointer">
                           <i id="eyeIcon" class="fa-regular fa-eye text-sm"></i>
                        </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-5 w-full">  
                       <label class="flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="remember" class="w-4 h-4 accent-[#C7FF3D] rounded">
                          <span class="text-xs text-gray-400 font-medium select-none">Remember Me</span>
                       </label>
                       <a href="#" class="text-xs text-gray-400 font-medium hover:text-[#C7FF3D]">
                         Forgot Password?</a>
                    </div>

                   <button
                      type="submit"
                      class="w-full bg-[#C7FF3D] text-black font-bold text-sm py-2.5 rounded-lg hover:bg-[#d4ff33] transition-colors mb-4">
                      Sign In
                   </button>

                </form>

                <p class="text-xs text-gray-500 text-center">Don't have an account? 
                    <a href="{{ url('/users/create') }}" class="text-[#C7FF3D] font-semibold hover:opacity-75">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleBtn');
            const passwordInput = document.querySelector('input[name="password"]');
            const eyeIcon = document.getElementById('eyeIcon');

            toggleBtn.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

</html>