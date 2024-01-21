<x-app-layout>
    
    <div class="container shadow-2xl mx-auto py-14 px-8 bg-white">
        <h2 class="text-5xl font-bold text-center">
            Página del Maker <span class="username text-5xl">{{ $user->name }}</span>
        </h2>
        <hr class="my-4" />
        <div class="container mx-auto px-4 py-8 bg-white">
            <!-- Sección de perfil y redes sociales -->
            <section class="mb-16">
                {{-- Maker Bio Card  --}}
                <div class="maker-bio-card mx-auto">
                    <div class="maker-bio-card__header">
                        <!-- Div imagen -->
                        <div class="">
                            <img class="avatar" src="./assets/images/gravatar_01.png" alt="" />
                        </div>
                
                        
                        


                        {{-- Patials Rating  --}}
                        <div class="rating">
                            <div class="rating__name">
                                <div class="flex">
                                    <h2 class="username">Eddie</h2>
                                </div>
                                <div class="maker-bio-card__stars">
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
                            <div class="rating__values">
                                <div class="rating__value-line">
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
                                <div class="rating__value-line">
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
                                <div class="rating__value-line">
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
                    <div class="maker-bio-card__body">
                        {{ $user->profile->biography }}
                    </div>
                    <div class="maker-bio-card__footer">
                        <button
                            class="w-1/2 hover:bg-orange-400 border border-zinc-200 py-2 font-bold"
                        >
                            Contactar con Eddie
                        </button>
                    </div>
                </div>
                
            </section>
            <h2 class="text-3xl font-bold">Zings del maker</h2>
            <hr class="mt-4 mb-8" />
            <div class="grid grid-cols-3 gap-16 justify-between">
                
                {{-- ZING CARD --}}

                <div class="zing-card">
                    <div class="header">
                        <h2>Gancho de pared</h2>
                        <p class="username">Eddie</p>
                    </div>
                    <div
                        class="zing-card__image"
                        style="background-image: url('./assets/images/zing3d.png')"
                    >
                        <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
                    </div>
                    <div class="zing-card__body">
                        <p>
                            Gancho de pared que se puede ocultar. Soporta hasta 2 kilos de peso.
                            Imprimible en 3 piezas para poder imprimir en colores si se desea
                        </p>
                    </div>
                    <div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
                        <i class="fa-regular fa-heart text-lg mr-2"></i
                        ><span class="text-sm">5</span>
                    </div>
                </div>

                {{-- ZING CARD --}}

                <div class="zing-card">
                    <div class="header">
                        <h2>Gancho de pared</h2>
                        <p class="username">Eddie</p>
                    </div>
                    <div
                        class="zing-card__image"
                        style="background-image: url('./assets/images/zing3d.png')"
                    >
                        <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
                    </div>
                    <div class="zing-card__body">
                        <p>
                            Gancho de pared que se puede ocultar. Soporta hasta 2 kilos de peso.
                            Imprimible en 3 piezas para poder imprimir en colores si se desea
                        </p>
                    </div>
                    <div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
                        <i class="fa-regular fa-heart text-lg mr-2"></i
                        ><span class="text-sm">5</span>
                    </div>
                </div>

                {{-- ZING CARD --}}

                <div class="zing-card">
                    <div class="header">
                        <h2>Gancho de pared</h2>
                        <p class="username">Eddie</p>
                    </div>
                    <div
                        class="zing-card__image"
                        style="background-image: url('./assets/images/zing3d.png')"
                    >
                        <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
                    </div>
                    <div class="zing-card__body">
                        <p>
                            Gancho de pared que se puede ocultar. Soporta hasta 2 kilos de peso.
                            Imprimible en 3 piezas para poder imprimir en colores si se desea
                        </p>
                    </div>
                    <div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
                        <i class="fa-regular fa-heart text-lg mr-2"></i
                        ><span class="text-sm">5</span>
                    </div>
                </div>

                {{-- ZING CARD --}}

                <div class="zing-card">
                    <div class="header">
                        <h2>Gancho de pared</h2>
                        <p class="username">Eddie</p>
                    </div>
                    <div
                        class="zing-card__image"
                        style="background-image: url('./assets/images/zing3d.png')"
                    >
                        <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
                    </div>
                    <div class="zing-card__body">
                        <p>
                            Gancho de pared que se puede ocultar. Soporta hasta 2 kilos de peso.
                            Imprimible en 3 piezas para poder imprimir en colores si se desea
                        </p>
                    </div>
                    <div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
                        <i class="fa-regular fa-heart text-lg mr-2"></i
                        ><span class="text-sm">5</span>
                    </div>
                </div>
    
                    {{-- ZING CARD --}}
                    <div class="zing-card">
                        <div class="header">
                            <h2>Gancho de pared</h2>
                            <p class="username">Eddie</p>
                        </div>
                        <div
                            class="zing-card__image"
                            style="background-image: url('./assets/images/zing3d.png')"
                        >
                            <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
                        </div>
                        <div class="zing-card__body">
                            <p>
                                Gancho de pared que se puede ocultar. Soporta hasta 2 kilos de peso.
                                Imprimible en 3 piezas para poder imprimir en colores si se desea
                            </p>
                        </div>
                        <div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
                            <i class="fa-regular fa-heart text-lg mr-2"></i
                            ><span class="text-sm">5</span>
                        </div>
                    </div>
                                    
            </div>
        </div>
        
    </div>
    
</x-app-layout>