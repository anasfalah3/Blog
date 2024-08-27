<span>
    <a href="{{ route('login') }}" :active="request()->routeIs('login')" class="{{ request()->routeIs('login') ? 'underline' : '' }} text-black focus:ring-4 font-medium rounded-lg text-sm px-2  lg:px-5 py-2 lg:py-2.5 mr-2">{{ __('menu.login') }}</a>
    <a href="{{ route('register') }}" :active="request()->routeIs('register')" class="{{ request()->routeIs('register') ? ' underline' : '' }} text-black focus:ring-4 font-medium rounded-lg text-sm px-2  lg:px-5 py-2 lg:py-2.5 mr-2">{{ __('menu.register') }}</a>
</span>
