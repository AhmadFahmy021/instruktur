<?php

namespace App\Filament\Resources\KelolaUserResource\Pages;

use App\Filament\Resources\KelolaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListKelolaUsers extends ListRecords
{
    protected static string $resource = KelolaUserResource::class;

    protected static ?string $clusterBreadcrumb = 'Kelola User';

    public function getTitle(): string|Htmlable
    {
        return 'Kelola User';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return 'Kelola User';
    }
}
