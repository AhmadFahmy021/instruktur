<?php

namespace App\Filament\Resources\Admin\KelolaUserSuperResource\Pages;

use App\Filament\Resources\Admin\KelolaUserSuperResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaUserSupers extends ListRecords
{
    protected static string $resource = KelolaUserSuperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
