<?php

namespace App\Filament\Resources\AkunResource\Pages;

use App\Filament\Resources\AkunResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditAkun extends EditRecord
{
    protected static string $resource = AkunResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getSaveNotificationTitle() : string {
        return 'Data akun berhasil diubah!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola Instruktur';
    }
}
