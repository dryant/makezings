<x-app-layout>
    <div class="container shadow-2xl mx-auto py-14 px-8 bg-white">
        <div class="header-page">
            <h2 class="text-5xl font-bold text-center">
                Listado de Makers
            </h2>
            <hr class="my-4" />
        </div>
        <div class="mb-32"></div>
        <div class="content-page">
            <div class="sm:grid-cols-2 grid lg:grid-cols-4 gap-8">
                @foreach ($users as $user)
                <x-maker-card :maker="$user"></x-maker-card>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>