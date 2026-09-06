<?php

namespace App\Filament\Resources\AnchorTenants\Pages;

use App\Filament\Resources\AnchorTenants\AnchorTenantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnchorTenants extends ListRecords
{
    protected static string $resource = AnchorTenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
