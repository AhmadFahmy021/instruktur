<?php

namespace App\Filament\Instruktur\Resources\KelolaUserResource\Pages;

use App\Filament\Instruktur\Resources\KelolaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditKelolaUser extends EditRecord
{
    protected static string $resource = KelolaUserResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola User';
    }

    public function getSaveNotificationTitle() : string {
        return 'Data user berhasil diubah!';
    }
}
