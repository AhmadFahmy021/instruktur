<?php

namespace App\Filament\Resources\Admin\KelolaInstrukturResource\Pages;

use App\Filament\Resources\Admin\KelolaInstrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditKelolaInstruktur extends EditRecord
{
    protected static string $resource = KelolaInstrukturResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getSaveNotificationTitle() : string {
        return 'Data instruktur berhasil diubah!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola Instruktur';
    }
}
