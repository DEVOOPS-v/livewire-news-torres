<div class="container mx-auto">
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 my-10 h-90">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 ">
            Subscribe to our Newsletter
        </h2>

        <!-- Fixed Height Wrapper for Success Message -->
        <div class="h-12 relative mb-4">
            @if(session()->has('message'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 2000)"
                    x-transition
                    class="absolute inset-0 flex items-center justify-center p-3 
                           bg-green-100 border border-teal-400 text-teal-600 rounded"
                >
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form wire:submit.prevent="subscribe" class="space-y-4 h-60 ">
            <!-- Name -->
            <div class="relative h-15">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="name" 
                    placeholder="Your name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 
                        @error('name') border-red-500 focus:ring-red-500 
                        @else border-gray-300 focus:ring-teal-400 @enderror"
                >
                @if(!$errors->has('name') && strlen($name) >= 3)
                    <span class="absolute right-3 top-3 text-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                            viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 
                                    9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>
                @endif
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="relative h-15">
                <input 
                    type="email" 
                    wire:model.live.debounce.300ms="email" 
                    placeholder="Your email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 
                        @error('email') border-red-500 focus:ring-red-500 
                        @else border-gray-300 focus:ring-teal-400 @enderror"
                >
                @if(!$errors->has('email') && !empty($email))
                    <span class="absolute right-3 top-3 text-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                            viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 
                                    9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>
                @endif
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full px-4 py-2 rounded-lg text-white transition duration-100
                    disabled:bg-gray-500 disabled:cursor-not-allowed
                    bg-teal-400 hover:bg-teal-500"
                @disabled($errors->any() || empty($name) || empty($email))
            >
                Get the UX Newsletter
            </button>
        </form>
    </div>

    <img src="./" alt="">
</div>
