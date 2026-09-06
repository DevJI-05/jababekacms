<?php

namespace App\Filament\Resources\HistoryEras\Pages;

use App\Filament\Resources\HistoryEras\HistoryEraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHistoryEras extends ListRecords
{
    protected static string $resource = HistoryEraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
