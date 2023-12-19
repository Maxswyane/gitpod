<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Filament\Resources\PhotoResource\RelationManagers;
use App\Models\Photo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoResource extends Resource
{
    protected static ?string $model = Photo::class;
    protected static ?string $modelLabel = "Photo";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_sabor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('arquivo')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('local_foto')
                    ->required()
                    ->maxLength(200),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_sabor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('arquivo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('local_foto')
                    ->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePhotos::route('/'),
        ];
    }
}
