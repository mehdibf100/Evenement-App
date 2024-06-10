<?php

namespace App\Filament\Resources\EvenementResource\Pages;

use App\Filament\Resources\EvenementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvenement extends EditRecord
{
    protected static string $resource = EvenementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
