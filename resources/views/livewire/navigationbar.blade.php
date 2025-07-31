<div>
  <div class="bg-gray-100 dark:bg-gray-900 p-4 mb-4 flex flex-col md:flex-row justify-between items-start md:items-center space-y-2 md:space-y-0">
    
    <div class="text-lg font-semibold text-gray-800 dark:text-white">
    <h5 class="font-extrabold text-gray-800 dark:text-white tracking-tight">Hello {{ auth()->user()->name }}</h5>
    </div>

    <nav class="w-full md:w-auto" aria-label="Breadcrumb">
      <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 rtl:space-x-reverse text-sm">
        <li class="flex items-center">
          <a href="{{ route('home') }}" class="inline-flex items-center text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-4 h-4 me-1.5" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            <strong>Home</strong> 
          </a>
        </li>

        <li class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <a href="#"
             onclick="window.dispatchEvent(new CustomEvent('open-logout-modal'))"
             class="text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <strong>Logout</strong>
          </a>
        </li>

        <li class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <span class="text-gray-500 dark:text-gray-400"><strong>IT Central</strong></span>
        </li>
      </ol>
    </nav>

  </div>
</div>
