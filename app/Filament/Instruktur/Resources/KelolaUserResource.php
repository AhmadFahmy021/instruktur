<?php

namespace App\Filament\Instruktur\Resources;

use App\Filament\Instruktur\Resources\KelolaUserResource\Pages;
use App\Filament\Instruktur\Resources\KelolaUserResource\RelationManagers;
use App\Models\KelolaUser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class KelolaUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Kelola User';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nama User'),
                TextInput::make('email')->label('Email User'),
                TextInput::make('nim')->label('NIM User'),
                TextInput::make('password')->label('Password User')->password()->required(fn ($operation) => $operation === 'create') // Hanya saat create
                ->dehydrated(fn ($state) => filled($state)),
                Select::make('role')
                    ->options([
                        '1' => 'Super Instruktur',
                        '2' => 'Instruktur',
                        '3' => 'Mahasiswa',
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                // static::getEloquentQuery()->where('role', '!=', '1'),
                static::getEloquentQuery()->where('role', '!=', '1')->where('id', '!=', Auth::user()),
            )
            ->columns([
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('nim')->label('NIM')->searchable(),
                // TextColumn::make('role')->label('Role')->searchable()->formatStateUsing(fn ($state) => match ($state) {
                //     '2' => 'Instruktur',
                //     '3' => 'Mahasiswa',
                //     default => 'Tidak diketahui',
                // })
                // ->badge(),
                SelectColumn::make('role')
                    ->label('Role')
                    ->options([
                        2 => 'Instruktur',
                        3 => 'Mahasiswa',
                    ])
                    ->sortable()
                    ->searchable()
                    ->afterStateUpdated(fn ($record, $state) => $record->update(['role' => $state])),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->successNotificationTitle('Data user berhasil dihapus!')->action(function ($record) {
                    $record->delete();

                    Notification::make()
                        ->title('Data user berhasil dihapus!')
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
            'index' => Pages\ListKelolaUsers::route('/'),
            'create' => Pages\CreateKelolaUser::route('/create'),
            'edit' => Pages\EditKelolaUser::route('/{record}/edit'),
        ];
    }
}
