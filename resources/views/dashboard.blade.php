@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
  <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
  <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
      <main class="mt-6">
        <div class="grid grid-cols-1">
          <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
            <div class="sm:mx-auto sm:w-full">
              <aside class="lg:overflow-y-auto">
                <header class="flex items-center justify-between border-b border-white/5 px-4 py-4 sm:px-6 sm:py-6 lg:px-8">
                  <h2 class="text-base font-semibold leading-7 text-white">Todos usuarios</h2>
                  <div class="flex items-center gap-2">
                    <button id="logout-btn" type="button" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold dark:text-zinc-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">Sair</button>
                  </div>
                </header>
                <ul id="list-all-users" role="list" class="divide-y divide-white/5">
                  <li class="w-full flex justify-center items-center px-4 py-4 sm:px-6 lg:px-8">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                  <li arial-label="cache-class" class="hidden bg-red-200 px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-x-3">
                      <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                      <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">${name}</h3>
                      <time datetime="2023-01-23T11:00" class="flex-none text-xs text-gray-600">à ${hour.getMinutes()} min</time>
                    </div>
                    <p class="mt-3 truncate text-sm text-gray-500">Endereço: <span class="text-gray-400">${address}</span></p>
                  </li>
                  </li>
                </ul>
              </aside>
            </div>
          </div>
        </div>
      </main>

      <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
      </footer>
    </div>
  </div>
</div>
@endsection