<?php

namespace App\Filament\Resources\KelolaUserResource\Pages;

use App\Filament\Resources\KelolaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaUser extends EditRecord
{
    protected static string $resource = KelolaUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
