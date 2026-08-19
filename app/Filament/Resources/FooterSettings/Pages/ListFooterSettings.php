<?php

namespace App\Filament\Resources\FooterSettings\Pages;

use App\Filament\Resources\FooterSettings\FooterSettingResource;
use App\Models\FooterSetting;
use Filament\Resources\Pages\ListRecords;

/**
 * There is only ever one footer settings record. Skip the table listing
 * entirely and jump straight to editing it, creating it on first visit.
 */
class ListFooterSettings extends ListRecords
{
    protected static string $resource = FooterSettingResource::class;

    public function mount(): void
    {
        $this->redirect(
            FooterSettingResource::getUrl('edit', ['record' => FooterSetting::current()]),
        );
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
