<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditKelas extends EditRecord
{
    protected static string $resource = KelasResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getSaveNotificationTitle() : string {
        return 'Data kelas berhasil diubah!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kelas';
    }
}
