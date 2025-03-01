<?php

namespace App\Filament\Resources\AkunResource\Pages;

use App\Filament\Resources\AkunResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateAkun extends CreateRecord
{
    protected static string $resource = AkunResource::class;

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
