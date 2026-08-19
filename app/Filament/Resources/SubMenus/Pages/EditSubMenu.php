<?php

namespace App\Filament\Resources\SubMenus\Pages;

use App\Filament\Resources\SubMenus\SubMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubMenu extends EditRecord
{
    protected static string $resource = SubMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
