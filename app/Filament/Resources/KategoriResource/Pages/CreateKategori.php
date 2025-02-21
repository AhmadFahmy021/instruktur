<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl('index');
    }

    public function getCreatedNotificationTitle() : string {
        return 'Data kategori berhasil ditambahkan!';
    }

    public function getTitle(): string|Htmlable
    {
        return 'Kategori';
    }
}
