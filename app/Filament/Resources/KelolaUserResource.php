<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelolaUserResource\Pages;
use App\Filament\Resources\KelolaUserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                static::getEloquentQuery()->where('role', '!=', '1'),
                // static::getEloquentQuery()->where('role', '!=', '1')->where('id', '!=', Auth::user()),
            )
            ->columns([
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('nim')->label('NIM')->searchable(),
                TextColumn::make('role')->label('Role')->searchable()->formatStateUsing(fn ($state) => match ($state) {
                    '1' => 'Superadmin',
                    '2' => 'Instruktur',
                    '3' => 'Mahasiswa',
                    default => 'Tidak diketahui',
                })
                ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
