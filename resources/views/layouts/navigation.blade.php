<nav class="bg-white border-b border-gray-200 shadow-3xs">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo Aplikasi Minimalis -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="w-8 h-8 bg-gray-900 rounded-md flex items-center justify-center text-white font-bold text-sm shadow-xs transition group-hover:bg-gray-800">
                            📦
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex space-x-6 -my-px ms-10">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-sm font-medium">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.index_product')" :active="request()->routeIs('admin.index_product')" class="text-sm font-medium">
                        {{ __('Produk') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.index_category')" :active="request()->routeIs('admin.index_category')" class="text-sm font-medium">
                        {{ __('Kategori') }}
                    </x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <!-- Mengubah tombol dropdown menjadi box tipis premium -->
                        <button class="inline-flex items-center px-3 py-1.5 border border-gray-200 text-xs font-medium rounded-lg text-gray-600 bg-white hover:bg-gray-50 hover:text-gray-900 focus:outline-none transition shadow-2xs gap-1.5">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-0.5 text-gray-400">
                                <svg class="fill-current h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100 bg-gray-50/50">
                            <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider">Identitas Akun</p>
                            <p class="text-xs font-semibold text-gray-700 truncate mt-0.5">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="text-xs">
                            {{ __('Modifikasi Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="text-xs text-red-600 hover:bg-red-50"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar Sistem') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>