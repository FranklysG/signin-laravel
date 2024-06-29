@extends('layouts.app')
@section('title', 'Esqueceu a senha')
@section('content')
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
  <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
  <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
      <main class="mt-6">
        <div class="grid grid-cols-3">
          <div id="docs-card" class="col-start-2 flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
              <h3 class="text-base font-semibold leading-6 text-white">Informe seu email</h3>
              <div class="mt-2 text-sm text-gray-500">
                <p>Enviaremos um link de recuperação de conta para seu email</p>
              </div>

              <form class="mt-5 flex items-center justify-between">
                <div class="w-full">
                  <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-1.5 py-1.5 dark:text-zinc-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#FF2D20] sm:text-sm sm:leading-6">
                </div>
                <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-[#FF2D20] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#FF2D20] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF2D20] sm:ml-3 sm:mt-0 sm:w-auto">Enviar</button>
              </form>

              <div>
                <div class="relative mt-10">
                  <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-200"></div>
                  </div>
                  <div class="relative flex justify-center text-sm font-medium leading-6">
                    <span class="bg-zinc-900 px-6 dark:text-white">Ou Registre-se</span>
                  </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-4">
                  <a href="/" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335" />
                      <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4" />
                      <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05" />
                      <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853" />
                    </svg>
                    <span class="text-sm font-semibold leading-6 text-zinc-900">Entrar</span>
                  </a>
                </div>
              </div>

              <p class="mt-10 text-center text-sm text-gray-500">
                Não tem uma conta?
                <a href="#" class="font-semibold leading-6 text-white hover:text-white-70">Inicie gratis por 14 dias</a>
              </p>
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