<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $modelLabel = "Sobre";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('quem_somos')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('o_que_vendemos')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('img_esquerda')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quem_somos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('o_que_vendemos')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('img_esquerda')
                    ->circular()
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
            'index' => Pages\ManageAbouts::route('/'),
        ];
    }
}
