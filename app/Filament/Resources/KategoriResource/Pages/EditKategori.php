<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditKategori extends EditRecord
{
    protected static string $resource = KategoriResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getSaveNotificationTitle() : string {
        return 'Data kategori berhasil diubah!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kategori';
    }
}
