<?php

namespace App\Filament\Instruktur\Resources\KelolaUserResource\Pages;

use App\Filament\Instruktur\Resources\KelolaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListKelolaUsers extends ListRecords
{
    protected static string $resource = KelolaUserResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Kelola User';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
