<x-app-layout>
    
    <div class="container shadow-2xl mx-auto py-14 px-8 bg-white">
        <h2 class="text-5xl font-bold text-center">
            Página del Maker <span class="username text-5xl">{{ $user->name }}</span>
            {{-- @dd(asset('images/gravatar_'.$user->id.'.png') ) --}}
        </h2>
        <hr class="my-4" />
        <div class="container mx-auto px-4 py-8 bg-white">
            <!-- Sección de perfil y redes sociales -->
            <section class="mb-16">
                {{-- Maker Bio Card  --}}
                <div class="maker-bio-card mx-auto flex flex-col p-4 w-full max-w-xl min-h-48 border border-zinc-200  bg-white justify-between;">
                    <div class="maker-bio-card__header w-full lg:grid lg:grid-cols-3 flex flex-col items-center mb-1">
                        <!-- Div imagen -->
                        <div class="">
                            <img class="avatar" src="{{ asset('images/gravatar_'.$user->id.'.png') }}" alt="" />
                        </div>
                        
                        
                        
                        
                        
                        {{-- Patials Rating  --}}
                        <div class="rating flex flex-col col-span-2 bg-white h-full pt-4">
                            <div class="rating__name grid grid-cols-4">
                                <div class="flex">
                                    <h2 class="username">{{ $user->name }}</h2>
                                </div>
                                <div class="maker-bio-card__stars col-span-2">
                                    <img
                                    src="./assets/images/stars.png"
                                    class="h-4 mt-1 ml-2 hidden sm:block"
                                    alt=""
                                    />
                                </div>
                                
                                <div class="flex justify-end">
                                    <p class="font-bold self-center text-sm">Madrid</p>
                                </div>
                            </div>
                            <hr />
                            <div class="rating__values  flex flex-col">
                                <div class="rating__value-line grid grid-cols-4">
                                    <div class="flex">
                                        <h2 class="key">Precio:</h2>
                                    </div>
                                    <div class="maker-bio-card__stars">
                                        <img
                                        src="./assets/images/stars.png"
                                        class="h-4 mt-1 ml-2 hidden sm:block"
                                        alt=""
                                        />
                                    </div>
                                    <div class="flex justify-end">
                                        <p class="value">4.5 / 5</p>
                                    </div>
                                </div>
                                <div class="rating__value-line grid grid-cols-4">
                                    <div class="flex">
                                        <h2 class="key">Rapidez:</h2>
                                    </div>
                                    <div class="maker-bio-card__stars">
                                        <img
                                        src="./assets/images/stars.png"
                                        class="h-4 mt-1 ml-2 hidden sm:block"
                                        alt=""
                                        />
                                    </div>
                                    <div class="flex justify-end">
                                        <p class="value">4.7 / 5</p>
                                    </div>
                                </div>
                                <div class="rating__value-line grid grid-cols-4">
                                    <div class="flex">
                                        <h2 class="key">Calidad:</h2>
                                    </div>
                                    <div class="maker-bio-card__stars">
                                        <img
                                        src="./assets/images/stars.png"
                                        class="h-4 mt-1 ml-2 hidden sm:block"
                                        alt=""
                                        />
                                    </div>
                                    <div class="flex justify-end">
                                        <p class="value">4.2 / 5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Fin Partial Rating --}}
                    </div>
                    <div class="maker-bio-card__body w-full h-full min-h-8 my-6 text-justify">
                        {{ $user->profile->biography }}
                    </div>
                    <div class="maker-bio-card__footer w-full border-t-2 border-slate-300 text-center pt-4 pb-0">
                        <a href="#contact">
                            <button
                            class="w-1/2 hover:bg-orange-400 border border-zinc-200 py-2 font-bold"
                            >
                            Contactar con {{ $user->name }}
                        </button>
                    </a>
                </div>
            </div>
            
        </section>
        @if(\App\Models\Zing::exists())
        <h2 class="text-3xl font-bold">Zings del maker</h2>
        <hr class="mt-4 mb-8" />
        <div class="grid grid-cols-3 gap-16 justify-between">
            
            {{-- ZING CARD --}}
            @foreach ($user->zings as $zing)
            <x-zing-card :zing="$zing" />
            @endforeach
            {{-- FIN ZING CARD --}}
            
            
        </div>
        @endif
        <div id="contact" class="my-10">
            @guest
            
            <p class="text-3xl font-bold">Contacta con {{ $user->name }}</p>
            <hr class="mt-4 mb-8" />
            <p>Para poder contactar con otros usuarios tienes que estar logueado. Haz loguin -><a href="{{ url('admin/login') }}" class="inline-block px-5 py-2 mr-4 text-black bg-orange-400  hover:bg-white hover:border-black "><i class="fa-solid fa-user mr-2"></i>Iniciar sesión</a></p>
            @endguest

            @auth
            @unless(auth()->check() && auth()->user()->id === $user->id)
            <x-contact-form :user="$user"></x-contact-form>
            @endunless
            @endauth
        </div>
    </div>
    
</div>

</x-app-layout>