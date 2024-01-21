<div class="mx-auto flex flex-col p-4 w-full max-w-xl min-h-48 border border-zinc-200  bg-white justify-between;">
    <p class="h2 text-2xl font-bold text-center">Contactar con <span class="username ">{{ $user->name }}</span></p>
    <p class="m-10">Con este formulario puedes contactar con <span class="username text-sm">{{ $user->name }}</span> para poder pedirle que te imprima algún objeto</p>
    <form action="#" method="POST">
        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Tu nombre:</label>
            <input type="text" id="nombre" name="nombre" class="w-full border border-gray-300 p-2">
        </div>

        <!-- Nombre de usuario -->
        <div class="mb-4">
            <label for="usuario" class="block text-gray-700 text-sm font-bold mb-2">Tu nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" class="w-full border border-gray-300 p-2" value="{{ auth()->user()->name }}" >
            
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Tu email:</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2">
        </div>

        <!-- Mensaje -->
        <div class="mb-4">
            <label for="mensaje" class="block text-gray-700 text-sm font-bold mb-2">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" class="w-full border border-gray-300 p-2"></textarea>
        </div>

        <!-- Captcha (por ejemplo, puedes utilizar un paquete para ello) -->
        <div class="mb-4">
            <label for="captcha" class="block text-gray-700 text-sm  mb-2"><b>Captcha:</b> Cuánto son 3+4?</label>
            <input type="text" id="captcha" name="captcha" class="w-full border border-gray-300 p-2">
        </div>

        <!-- Botón de enviar -->
        <div class="maker-bio-card__footer w-full border-t-2 border-slate-300 text-center pt-4 pb-0">
            
            <button type="submit" class="w-1/2 hover:bg-orange-400 border border-orange-400 text-orange-400 hover:border-black hover:text-black py-2 font-bold">
                Enviar
            </button>
        </div>
    </form>
</div>