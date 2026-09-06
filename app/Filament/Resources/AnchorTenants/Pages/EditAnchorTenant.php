<?php

namespace App\Filament\Resources\AnchorTenants\Pages;

use App\Filament\Resources\AnchorTenants\AnchorTenantResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnchorTenant extends EditRecord
{
    protected static string $resource = AnchorTenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
