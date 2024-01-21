<div class="zing-card">
    <div class="header">
        <h2>{{ $zing->title }}</h2>
        <a href="{{ route('makers.show', $zing->maker->slug) }}">
            <p class="username">{{ $zing->maker->name }}</p>
        </a>
    </div>
    <div
    class="zing-card__image"
    style="background-image: url('{{ $zing->image->url }}')"
    >
    <!-- <img src="./assets/images/zing3d.png" alt="" /> -->
</div>
<div class="zing-card__body">
    <p>
        {{ $zing->description }}
    </p>
</div>
<div class="zing-card__footer flex justify-end mb-4 mr-5 items-center">
    <i class="fa-regular fa-heart text-lg mr-2"></i
        ><span class="text-sm">5</span>
    </div>
</div>
