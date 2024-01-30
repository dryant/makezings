<x-app-layout>
    <div class="container shadow-2xl mx-auto py-14 px-8 bg-white">
        <div class="intro">
            <h2 class="text-7xl font-bold text-center">
                Make<span class="username text-7xl">Zings</span>
            </h2>
            <hr class="my-4" />
            <p class="subtitle text-xl block mx-auto lg:my-8 leading-10 font-light w-6/12 text-center">
                MakeZings conecta a usuarios que necesitan un objeto impreso
                en 3D con usuarios poseedores de una impresora 3D.
            </p>
            <hr class="my-4" />
        </div>
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 py-12 mt-20">
            <div class="font-sans w-full flex flex-row justify-center items-start">
                <div class="card w-96 mx-auto bg-white border-zinc-200 border p-6">
                    <img
                    class="w-64 mx-auto -mt-36"
                    src="{{ asset('images/ender3-s1.png') }}"
                    alt=""
                    />
                    <div class="text-center mt-2 text-3xl font-medium mb-8">Makers</div>
                    <p class="leading-8 text-lg font-light text-center">
                        Si tienes una impresora 3D y quieres ganar dinero vendiendo objetos
                        impresos en 3D crea tu perfil de <b>Maker</b>. Te contactarán
                        <b>Usuarios</b> que no tienen impresora y que están interesados en
                        comprar un objeto impreso en 3D
                    </p>
                    <hr class="mt-8" />
                    <div class="text-center my-4">
                        <button class="w-full bg-orange-400 px-4 py-2">
                            Registrarme como <b>Maker</b>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="my-24 lg:hidden"></div>
            <div class="font-sans w-full flex flex-row justify-center items-start">
                <div class="card w-96 mx-auto bg-white border-zinc-200 border p-6">
                    <img
                    class="w-48 mx-auto -mt-32"
                    src="{{ asset('images/usuario.png') }}"
                    alt=""
                    />
                    <div class="text-center mt-2 text-3xl font-medium mb-8">Usuarios</div>
                    <p class="leading-8 text-lg font-light text-center">
                        Los <b>usuarios</b> son personas que no tienen una impresora 3D pero
                        necesitan o quieren un <b>objeto impreso en 3D</b>. Podrán ver todos
                        los que hay registrados y contactar con quien prefieran según la
                        distancia, valoraciones, etc…
                    </p>
                    <hr class="mt-8" />
                    <div class="text-center my-4">
                        <button class="w-full bg-blue-100 px-4 py-2">
                            Registrarme como <b>Usuario</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-xl font-bold text-center">¿Ya estás registrado?</p>
        <button class="hover:bg-orange-400 hover:text-white w-56 block mx-auto border-zinc-400 border text-orange-400 font-bold text-lg bg-white px-8 mt-4 py-2">
            Haz Login
        </button>
    </div>
</x-app-layout>