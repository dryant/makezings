<?php

namespace App\Filament\Resources\ZingResource\Pages;

use App\Filament\Resources\ZingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZing extends EditRecord
{
    protected static string $resource = ZingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
