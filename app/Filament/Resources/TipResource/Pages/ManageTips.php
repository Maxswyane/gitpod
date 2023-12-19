<?php

namespace App\Filament\Resources\TipResource\Pages;

use App\Filament\Resources\TipResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTips extends ManageRecords
{
    protected static string $resource = TipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
