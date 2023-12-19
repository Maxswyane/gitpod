<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('instagram')
                    ->required()
                    ->maxLength(300),
                Forms\Components\TextInput::make('youtube')
                    ->required()
                    ->maxLength(300),
                Forms\Components\TextInput::make('endereco')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(300),
                Forms\Components\TextInput::make('telefone')
                    ->tel()
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('endereco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefone')
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
            'index' => Pages\ManageContacts::route('/'),
        ];
    }    
}
