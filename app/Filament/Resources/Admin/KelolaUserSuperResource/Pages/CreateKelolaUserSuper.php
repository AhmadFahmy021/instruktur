<?php

namespace App\Filament\Resources\Admin\KelolaUserSuperResource\Pages;

use App\Filament\Resources\Admin\KelolaUserSuperResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelolaUserSuper extends CreateRecord
{
    protected static string $resource = KelolaUserSuperResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl();
    }

    public function getCreatedNotificationTitle() : string {
        return 'Data user berhasil disimpan!';
    }
}
