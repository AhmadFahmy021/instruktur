<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkunResource\Pages;
use App\Models\Akun;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\View;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class AkunResource extends Resource
{
    protected static ?string $model = Akun::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ? int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('Form Akun')->schema([
                        TextInput::make('kode')
                            ->label('Kode Akun')
                            ->required()
                            ->numeric(),
                        TextInput::make('nama')
                            ->label('Nama Akun')
                            ->required()
                            ->maxLength(255),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'open' => 'Open',
                                'close' => 'Close',
                            ])
                            ->default('close')
                            ->required(),

                        Select::make('saldo_normal')
                            ->label('Saldo Normal')
                            ->options([
                                'debit' => 'Debit',
                                'kredit' => 'Kredit',
                            ])
                            ->default('debit')
                            ->required(),
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship('kategori', 'nama')
                            ->required(),
                    ]),
                    Section::make('Referensi Akun')->schema([
                        View::make('components.referensi-akun'),
                    ]),
                ])->from('md')->columnSpan('full'),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')->sortable()->searchable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('status')->badge()->formatStateUsing(fn ($state) => strtoupper($state)),
                TextColumn::make('kategori.nama')->label('Kategori'),
                TextColumn::make('saldo_normal')->label('Saldo Normal')->formatStateUsing(fn ($state) => strtoupper($state))
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()->successNotificationTitle('Data akun berhasil dihapus!')->action(function ($record) {
                    $record->delete();

                    Notification::make()
                        ->title('Data akun berhasil dihapus!')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAkuns::route('/'),
            'create' => Pages\CreateAkun::route('/create'),
            'edit' => Pages\EditAkun::route('/{record}/edit'),
        ];
    }
}
