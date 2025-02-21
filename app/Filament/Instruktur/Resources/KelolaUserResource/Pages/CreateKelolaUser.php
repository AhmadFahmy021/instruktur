<?php

namespace App\Filament\Instruktur\Resources\KelolaUserResource\Pages;

use App\Filament\Instruktur\Resources\KelolaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKelolaUser extends CreateRecord
{
    protected static string $resource = KelolaUserResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelola User';
    }

    public function getCreatedNotificationTitle() : string {
        return 'Data user berhasil disimpan!';
    }
}
