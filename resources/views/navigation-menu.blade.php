    <nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
        <div id="nav-left" class="flex items-center">
            <div class="text-gray-800 font-semibold">
                <span class="text-yellow-500 text-xl">&lt;YELO&gt;</span> Code
            </div>
            <div class="top-menu ml-10">
                <div class="flex space-x-4">
                    <!-- <li>
                        <a class="flex space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500" href="http://127.0.0.1:8000">
                            Home
                        </a>
                    </li> -->
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('menu.home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('menu.blog') }}
                    </x-nav-link>


                </div>
            </div>
        </div>
        <div id="nav-right" class="flex items-center md:space-x-6">
            <div class="flex space-x-2">
                @foreach (config('app.supported_locales') as $locale =>$data )
                <a href="{{route('locale',$locale)}}">
                    <x-dynamic-component :component="'flag-country-' . $data['icon']" class="w-6 h-6 {{session('locale') !== $locale ?'opacity-30':'' }}" />
                </a>
                @endforeach
            </div>
            @auth
            @include('layouts.partials.header-right-auth')
            @else
            @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </nav>
