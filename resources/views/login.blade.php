<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ProSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    *, *::before, *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'inter', sans-serif;
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

<body>
    <div class="h-screen w-screen flex flex-col justify-center items-center">
         <div class="w-full max-w-[450px] bg-[#151515] border border-[#303030] rounded-[18px] pt-12 pb-8 px-10 flex flex-col items-center shadow-2xl">
             <div class="text-center flex flex-col items-center mb-8">
               
                 <div class="w-20 h-20 bg-[#15111B] border border-[#303030] rounded-[22px] flex items-center justify-center mb-3 shadow-lg">
                     <div class="w-12 h-12 bg-[#C7FF3D] rounded-[14px] flex items-center justify-center">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                            <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                            <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                            <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        </svg>
                     </div>
                </div>

                <span class="text-base font-bold tracking-[0.12em] text-white uppercase mb-4">ProSite</span>
                <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-sm text-white mb-1">Sign in to continue managing your projects</p>
            </div>

            <div class="w-full">
                <form class="w-full">
                    <div class="mb-4 w-full">
                        <label class="block text-[11px] font-semibold text-white tracking-widest uppercase mb-2">Username</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-white">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </span>
                        <input 
                        type="text" 
                        name="username" 
                        placeholder="developer"
                        class="w-full bg-[#000000] border border-[#2d2d2d] rounded-lg pl-10 pr-4 py-3
                               text-sm text-gray-200 placeholder-white focus:outline-none focus:border-[#ccff00]">
                        </div>
                    </div>

                    <div class="mb-5 w-full">
                        <label class="block text-[11px] font-semibold text-white tracking-widest uppercase mb-2">Password</label>
                          <div class="relative flex items-center">
                            <span class="absolute left-4 text-white">
                              <i class="fa-solid fa-lock text-sm"></i>
                            </span>
                        <input 
                        type="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="w-full bg-[#000000] border border-[#2d2d2d] rounded-lg pl-10 pr-12 py-3 
                               text-sm text-gray-200 placeholder-white focus:outline-none focus:border-[#C7FF3D]">
                        <button type="button" id="toggleBtn" class="absolute right-4 text-white hover:text-gray-300 border-none bg-transparent cursor-pointer">
                           <i id="eyeIcon" class="fa-regular fa-eye text-sm"></i>
                        </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6 w-full">  
                       <label class="flex items-center gap-2 cursor-pointer">
                         <input type="checkbox" name="remember" class="w-4 h-4 accent-[#C7FF3D] rounded">
                         <span class="text-sm text-[#C7FF3D] font-medium">Remember Me</span>
                       </label>
                       <a href="#" class="text-sm text-[#C7FF3D] font-medium hover:opacity-75">
                         Forgot Password?</a>
                    </div>

                   <button
                      type="submit"
                      class="w-full bg-[#C7FF3D] text-black font-bold text-sm py-3 rounded-lg hover:bg-[#d4ff33] transition-colors mb-5">
                      Sign In
                   </button>

                </form>

                <p class="text-sm text-gray-500 mb-1 text-center">Don't have an account? 
                    <a href="#" class="text-[#C7FF3D] font-semibold hover:opacity-75">Sign Up</a></p>
            </div>
        </div>
    </div>

    
</body>

</html>