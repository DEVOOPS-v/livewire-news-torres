<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UX Newsletter</title>

    @vite('resources/css/app.css') {{-- Tailwind via Vite --}}
    @livewireStyles
</head>
<body class="antialiased bg-zinc-50 text-gray-800">

    <!-- Hero Section -->
   <section class="max-w-7xl mx-auto bg-white shadow-lg rounded-md px-20 py-16 grid grid-cols-1 md:grid-cols-2 gap-20 my-25">
        <!-- Left -->
        <div class="">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Join the UX <span class="text-teal-400 animate-fade-in">Newsletter</span></h1>
            <p class="text-gray-700 mb-6">
                Join more than <span class="font-semibold">7000 UXers</span> and get weekly UX news, updates 
                and training in a newsletter that levels up your design knowledge
            </p>
       
            @livewire('newsletter-form')            
            
            <p class="text-gray-500 text-sm mt-6 italic">
                "I learn new valuable UX nugget every time I open Oz’s newsletter" <br>
                <span class="">– Laura M., New York</span>
            </p>

         
        </div>
    
        <!-- Right (SVG Illustration) -->
        <div class="flex justify-center rounded-2xl px-20">
            <!-- <h1 class="text-2xl font-bold">Get our  <span class="text-teal-400 text-4xl">Newsletter</span> now!</h1><br> -->
        <img src="{{ asset('images/men.png') }}" 
         alt="UX Illustration" 
         class="max-w-90  w-full  h-auto">
        </div>
    @livewireScripts
</body>
</html>
