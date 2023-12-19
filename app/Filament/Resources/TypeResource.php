<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;
    protected static ?string $modelLabel = "Sabores";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ->schema([
                Forms\Components\Textarea::make('titulo')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(300),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('id_produto')
                    ->relationship('product', 'titulo')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descricao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.titulo')
                    ->sortable(),

                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                ])
                //
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
            'index' => Pages\ManageTypes::route('/'),
        ];
    }
}
