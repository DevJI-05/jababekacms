<?php

namespace App\Filament\Resources\HistoryMilestones\Pages;

use App\Filament\Resources\HistoryMilestones\HistoryMilestoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHistoryMilestones extends ListRecords
{
    protected static string $resource = HistoryMilestoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
