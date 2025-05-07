<nav class="bg-blue-950 border-gray-200 ">
  <!--Login -->
  <div class="max-w-screen-xl   mx-auto pt-1">
    <div class="block py-2 px- md:me-0 md:p-0 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
                 not-has-[nav]:hidden">
      <nav class="flex items-center justify-end gap-4 me-2">
        @if (auth()->check())
        <a href="{{ url('/personal') }}"
          class="inline-block px-5 py-1.5 text-yellow-400 border border-yellow-400 hover:border-blue-800 rounded-sm text-sm leading-normal">
          Panel Personal
        </a>
        @else
        <a href="{{ url('/personal/login') }}"
          class="inline-block px-5 py-1.5 text-yellow-400 border border-transparent hover:border-yellow-700 rounded-sm text-sm leading-normal">
          Iniciar sesión
        </a>
        @endif
      </nav>
    </div>
  </div>


  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pb-3">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="img/imblogoCode.png" class="h-16" alt="ImbCode Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-400">Pro<span class="text-red-500">Concurso</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 
    focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <!-- link -->
    <div class="hidden  w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-900 md:space-x-8 rtl:space-x-reverse 
                  md:flex-row md:mt-0 md:border-0 md:bg-blue-950 dark:bg-blue-950 ">
        <li>
          <a href="/" class="block py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-yellow-400 
          md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-yellow-500 md:dark:hover:bg-transparent"
            aria-current="page">
            Home
          </a>
        </li>

        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownInfo" class="flex items-center justify-between w-full py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent 
          md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">
            Information
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownInfo" class="z-10 hidden font-normal bg-blue-950 divide-y divide-gray-100 rounded-lg shadow-sm w-44 ">
            <ul class="py-2 text-sm text-yellow-400 dark:text-yellow-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/info" class="block px-4 py-2 hover:bg-gray-100 ">InfoCabo</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Earnings</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-yellow-400 hover:bg-gray-100 ">Sign out</a>
            </div>
          </div>
        </li>

        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownCalc" class="flex items-center justify-between w-full py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent 
          md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">
            Calculos
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownCalc" class="z-10 hidden font-normal bg-blue-950 divide-y divide-gray-100 rounded-lg shadow-sm w-44">
            <ul class="py-2 text-sm text-yellow-400 " aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/calc" class="block px-4 py-2 hover:bg-gray-100 ">
                  Calculo
                </a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">
                  Settings
                </a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">
                  Earnings
                </a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-yellow-400 hover:bg-gray-100 ">
                Sign out
              </a>
            </div>
          </div>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
            ZipCode
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
            Guias
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-yellow-400 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
            Contact
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>