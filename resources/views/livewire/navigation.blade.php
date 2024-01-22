<div>
    <nav class="bg-white shadow-xl">
            <div class="container mx-auto px-4 py-2 flex items-center justify-between">
                <!-- Logotipo y título -->
                <a href="#" class="text-xl font-bold text-gray-800"
                    >Make<span>zings</span></a
                >
        
                <!-- Menú principal con enlaces -->
        
                <!-- Botones de inicio sesión y registro -->
                <div class="flex justify-center items-center">
                    <ul class="mr-12 space-x-4 md:space-x-6 text-sm font-medium">
                        <li class="inline-block">
                            <a href="/" class="hover:underline">Inicio</a>
                        </li>
                        <li class="inline-block">
                            <a href="{{ route('makers.index') }}" class="hover:underline">Makers</a>
                        </li>
                        <li class="inline-block">
                            <a href="{{ route('zings.index') }}" class="hover:underline">zings</a>
                        </li>
                    </ul>
                    @auth
                    <a
                        href="{{ url('admin/dashboard') }}"
                        class="inline-block px-5 py-2 mr-4 text-white bg-orange-400 hover:bg-white hover:text-black border-gray-700 focus:outline-none focus:shadow-outline"
                        ><i class="fa-solid fa-user mr-2"></i>CPanel</a>
                    <form action="{{ url('admin/logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="inline-block px-5 py-2 ml-auto text-gray-800 bg-white border hover:bg-gray-100 focus:outline-none focus:shadow-outline"
                            ><i class="fa-solid fa-sign-out mr-2"></i>Cerrar sesión</button
                        >
                    </form>
                    @endauth
                    @guest
                    <a
                        href="{{ url('admin/login') }}"
                        class="inline-block px-5 py-2 mr-4 text-white bg-orange-400 hover:bg-white hover:text-black border-gray-700 focus:outline-none focus:shadow-outline"
                        ><i class="fa-solid fa-user mr-2"></i>Iniciar sesión</a
                    >
                    <a
                        href="{{ url('admin/register') }}"
                        class="inline-block px-5 py-2 ml-auto text-gray-800 bg-white border hover:bg-gray-100 focus:outline-none focus:shadow-outline"
                        ><i class="fa-solid fa-pencil mr-2"></i>Registrarse</a
                    >
                    @endguest
                </div>
            </div>
        </nav>
</div>
