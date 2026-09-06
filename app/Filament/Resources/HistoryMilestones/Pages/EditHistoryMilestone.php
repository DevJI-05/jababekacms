<?php

namespace App\Filament\Resources\HistoryMilestones\Pages;

use App\Filament\Resources\HistoryMilestones\HistoryMilestoneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHistoryMilestone extends EditRecord
{
    protected static string $resource = HistoryMilestoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
