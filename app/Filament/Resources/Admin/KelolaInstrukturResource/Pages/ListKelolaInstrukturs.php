<?php

namespace App\Filament\Resources\Admin\KelolaInstrukturResource\Pages;

use App\Filament\Resources\Admin\KelolaInstrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListKelolaInstrukturs extends ListRecords
{
    protected static string $resource = KelolaInstrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola Instruktur';
    }
}
