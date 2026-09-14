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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

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

    </style>
 
<body class="bg-gradient-glow">
    <div class="min-h-screen w-screen flex flex-col justify-center items-center">
          <div class="w-full max-w-[370px] bg-[#151515] border border-[#303030] rounded-[18px] py-6 px-6 flex flex-col items-center shadow-2xl">
              <div class="text-center flex flex-col items-center mb-6">
                
                  <div class="w-12 h-12 bg-[#151515] border border-[#303030] rounded-[16px] flex items-center justify-center mb-2 shadow-lg">
                      <div class="w-8 h-8 rounded-[9px] flex items-center justify-center shrink-0">
                        <img src="{{ asset('images/logo_itenas.png') }}" alt="ProSite Logo" class="w-8 h-8 rounded-[9px]">
                      </div>
                  </div>

                <h2 class="text-lg font-bold text-white tracking-wide pb-6">ItensFlow</h2>
                <h1 class="text-xl font-bold text-white mb-1.5">Welcome Back</h1>
                <p class="text-xs text-white/80">Sign in to continue managing your projects</p>
            </div>

            <div class="w-full">
                @if(session('error'))
                    <div class="w-full bg-red-950/40 border border-red-500/30 text-red-200 text-xs px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                        <span>{{ session('error') }}</span>   
                    </div>
                @endif

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

                <form class="w-full" method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3.5 w-full">
                        <label class="block text-[10px] font-semibold text-white tracking-widest uppercase mb-1.5">Username</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </span>

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

                <p class="text-xs text-white/80 text-center">Don't have an account? 
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