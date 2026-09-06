<?php

namespace App\Filament\Resources\HistoryEras\Pages;

use App\Filament\Resources\HistoryEras\HistoryEraResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHistoryEra extends EditRecord
{
    protected static string $resource = HistoryEraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
