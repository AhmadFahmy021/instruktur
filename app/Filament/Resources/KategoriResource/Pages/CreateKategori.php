<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;
    protected function getRedirectUrl(): string
    {
        return url('/instruktur/kategoris'); // Redirect setelah berhasil membuat data
    }
}
