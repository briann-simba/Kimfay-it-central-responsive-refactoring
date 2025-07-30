<div>
  <aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 bg-white border-r border-gray-200 dark:bg-gray-900 dark:border-gray-700"
    aria-label="Sidebar">
    
    <!-- Logo -->
    <div class="p-6">
      <img src="{{ asset('images/kimfay.png') }}" alt="Logo" class="w-full h-auto object-contain" />
    </div>

    <!-- Menu -->
    <ul class="space-y-2 text-sm font-medium px-4 pb-4">

      <!-- Dashboard -->
      <li>
        <a href="{{ route('home') }}"
          class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
          </svg>
          <span>Dashboard</span>
          <span class="ml-auto text-xs bg-blue-100 text-blue-800 rounded-full px-2 py-0.5">3</span>
        </a>
      </li>

      @hasanyrole('It|SuperAdmin')
<li>
  <!-- Inventory button (styled like collapsible, but doesn't toggle) -->
  <div
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-green-200 dark:text-white dark:hover:bg-gray-700">
    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 18 18">
      <path
        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
    </svg>
    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Inventory</span>
  </div>

  <!-- Always-visible submenu -->
  <ul class="py-2 space-y-2">
    <li>
      <a href="{{ route('inventory') }}"
        class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
        🗂️ Overview
      </a>
    </li>
    <li>
      <a href="{{ route('pendingapproval') }}"
        class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-yellow-100 dark:text-white dark:hover:bg-gray-700">
        ⏳ Pending Approval
      </a>
    </li>
    <li>
      <a href="#"
        class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700">
        📜 Device History
      </a>
    </li>
  </ul>
</li>



      @endhasanyrole

      @hasanyrole('It|Hr|SuperAdmin')
      <li>
        <a href="{{ route('usermanagement') }}"
          class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 2a5 5 0 1 0 0 10A5 5 0 0 0 10 2Zm0 12c-5.33 0-8 2.667-8 4v2h16v-2c0-1.333-2.67-4-8-4Z" />
          </svg>
          <span>User Management</span>
        </a>
      </li>
      @endhasanyrole

      @hasanyrole('It|Hr|SuperAdmin|AdminOfficer|LineManager|Finance')
      <li>
        <a href="{{ route('offboarduser') }}"
          class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0Zm2.93 15.07a.75.75 0 1 1-1.06 1.06L10 11.06 8.13 13.93a.75.75 0 0 1-1.06-1.06L8.94 10 7.07 8.13a.75.75 0 0 1 1.06-1.06L10 8.94l1.87-1.87a.75.75 0 0 1 1.06 1.06L11.06 10Z" />
          </svg>
          <span>Offboard User</span>
        </a>
      </li>
      @endhasanyrole

      <li>
        <a href="{{ route('initiateoffboarding') }}"
          class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
            <path fill-rule="evenodd"
              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
              clip-rule="evenodd" />
          </svg>
          <span>Initiate Offboarding</span>
        </a>
      </li>

      <!-- Auth Dropdown (if needed later) -->
      <li>
        <a href="#"
          class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
              clip-rule="evenodd" />
          </svg>
          <span>Change Password</span>
        </a>
      </li>

    </ul>
  </aside>
</div>
