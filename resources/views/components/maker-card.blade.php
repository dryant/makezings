@props(['maker'])
<div>
    <div class="font-sans mb-20 w-full flex flex-row justify-center items-center">
        <div class="card w-96 mx-auto bg-white border border-zinc-200">
            <img
                class="avatar w-32 mx-auto rounded-full -mt-20 border-2 border-white"
                src="{{ asset('images/gravatar_'.$maker->id.'.png') }}"
                alt=""
            />
            <div class="text-center mt-2 text-3xl font-medium">{{ $maker->name }}</div>
            <div class="text-center font-light text-sm">
                <div class="flex justify-center items-center">
                    <div class="flex items-center mt-1 mb-1">
                        <svg
                            class="mx-1 w-4 h-4 fill-current text-yellow-500"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                            />
                        </svg>
                        <svg
                            class="mx-1 w-4 h-4 fill-current text-yellow-500"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                            />
                        </svg>
                        <svg
                            class="mx-1 w-4 h-4 fill-current text-yellow-500"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                            />
                        </svg>
                        <svg
                            class="mx-1 w-4 h-4 fill-current text-yellow-500"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                            />
                        </svg>
                        <svg
                            class="mx-1 w-4 h-4 fill-current text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="text-center font-bold text-sm mb-4">{{ $maker->city }}</div>
            <div class="flex flex-col px-6 mt-2">
                <div class="flex justify-between mb-1">
                    <p class="font-bold">PRECIO</p>
                    <p>4.5 / 5</p>
                </div>
                <div class="flex justify-between mb-1">
                    <p class="font-bold">RAPIDEZ</p>
                    <p>4.2 / 5</p>
                </div>
                <div class="flex justify-between mb-1">
                    <p class="font-bold">CALIDAD</p>
                    <p>4.6 / 5</p>
                </div>
            </div>
            <hr class="mt-8" />
            <div class="text-center my-4">
                <a href="{{ route('makers.show', $maker->slug) }}">
                    <button
                        class="w-1/2 hover:bg-orange-400 border border-zinc-200 px-4 py-2"
                    >
                        Ver zings
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>