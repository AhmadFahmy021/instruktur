<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKelas extends CreateRecord
{
    protected static string $resource = KelasResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getCreatedNotificationTitle() : string {
        return 'Data kelas berhasil ditambahkan!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelas';
    }
}
