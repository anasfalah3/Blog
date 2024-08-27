<x-app-layout title="Home Page">
    @section('hero')


    <!-- <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            {{__('home.hero.title')}} <span class="text-yellow-500">&lt;Syntax&gt;</span> <span class="text-gray-900"> Spark</span>
        </h1>
        <p class="text-gray-500 text-lg mt-1">{{__('home.hero.desc')}}</p>
        <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block" href="{{route('posts.index')}}">{{__('home.hero.cta')}}</a>
    </div> -->


    <div class="relative isolate px-6 lg:px-8">

        <div class="mx-auto max-w-2xl py-20 sm:py-32">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    @lang('home.hero.announcement') <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>@lang('home.hero.read_more') <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{__('home.hero.welcome_title')}}</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">@lang('home.hero.desc1') </p>
                <p class="text-md italic leading-8 text-gray-600">@lang('home.hero.desc2')</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{route('posts.index')}}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__('home.hero.cta')}}</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">@lang('home.hero.learn_more') <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">{{__('home.Featured_Posts')}}</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="{{route('posts.index')}}">{{__('home.More_Posts')}}</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">{{__('home.Latest_Posts')}}</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 gap-y-32 w-full">
                @foreach ($latestPosts as $post)
                <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach

            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="{{route('posts.index')}}">{{__('home.More_Posts')}}</a>
    </div>

</x-app-layout>
