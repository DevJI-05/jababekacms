<?php

namespace App\Filament\Resources\SubMenus\Pages;

use App\Filament\Resources\SubMenus\SubMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubMenus extends ListRecords
{
    protected static string $resource = SubMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
