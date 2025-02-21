<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\KelolaInstrukturResource\Pages;
use App\Filament\Resources\Admin\KelolaInstrukturResource\RelationManagers;
use App\Models\Admin\KelolaInstruktur;
use App\Models\Kelas;
use App\Models\ProfileInstruktur;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelolaInstrukturResource extends Resource
{
    protected static ?string $model = ProfileInstruktur::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    protected static ?string $navigationLabel= 'Kelola Instruktur';

    protected static ? int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Pilih User')
                ->options(User::where('role', '2')->pluck('name', 'id'))
                ->searchable(),

                Select::make('kelas_id')
                ->label('Pilih Kelas')
                ->options(Kelas::all()->pluck('nama', 'id'))
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Nama')->searchable(),
                TextColumn::make('kelas.nama')->label('Kelas')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->successNotificationTitle('Data instruktur berhasil dihapus!')->action(function ($record) {
                    $record->delete();

                    Notification::make()
                        ->title('Data instruktur berhasil dihapus!')
                        ->success()
                        ->send();
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelolaInstrukturs::route('/'),
            'create' => Pages\CreateKelolaInstruktur::route('/create'),
            'edit' => Pages\EditKelolaInstruktur::route('/{record}/edit'),
        ];
    }
}
