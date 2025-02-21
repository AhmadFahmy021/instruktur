<?php

namespace App\Filament\Resources\Admin\KelolaInstrukturResource\Pages;

use App\Filament\Resources\Admin\KelolaInstrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKelolaInstruktur extends CreateRecord
{
    protected static string $resource = KelolaInstrukturResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getCreatedNotificationTitle() : string {
        return 'Data instruktur berhasil ditambahkan!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola Instruktur';
    }
}
