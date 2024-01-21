<x-app-layout>
    <div class="container shadow-2xl mx-auto py-14 px-8 bg-white">
        <div class="header-page">
            <h2 class="text-5xl font-bold text-center">
                Zings que hacen los makers
            </h2>
            <div class="text-center my-10">
                <p class="">Aqui puedes ver todas las cosas que han publicado los makers</p>
                <p class="">Si quieres contactar con algun maker para que te haga una <b>zing</b> solo tienes que pinchar en su nombre</p>
            </div>
            <hr class="my-4" />
        </div>
        <div class="mb-32"></div>
        <div class="content-page">
            <div class="sm:grid-cols-2 grid lg:grid-cols-3 xl:grid-cols-3 gap-8">
                @foreach ($zings as $zing)
                <x-zing-card :zing="$zing" />
                @endforeach
            </div>
        </div>
    </div>
    
    
</x-app-layout>