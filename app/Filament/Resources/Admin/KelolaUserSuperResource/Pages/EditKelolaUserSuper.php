<?php

namespace App\Filament\Resources\Admin\KelolaUserSuperResource\Pages;

use App\Filament\Resources\Admin\KelolaUserSuperResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaUserSuper extends EditRecord
{
    protected static string $resource = KelolaUserSuperResource::class;

    public function getRedirectUrl() : string {
        return static::getResource()::getUrl();
    }

    public function getSaveNotificationTitle() : string {
        return 'Data user berhasil diubah!';
    }
}
