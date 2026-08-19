<?php

namespace App\Filament\Resources\CarouselSettings\Pages;

use App\Filament\Resources\CarouselSettings\CarouselSettingResource;
use App\Models\CarouselSetting;
use Filament\Resources\Pages\ListRecords;

/**
 * There is only ever one carousel settings record. Skip the table listing
 * entirely and jump straight to editing it, creating it on first visit.
 */
class ListCarouselSettings extends ListRecords
{
    protected static string $resource = CarouselSettingResource::class;

    public function mount(): void
    {
        $this->redirect(
            CarouselSettingResource::getUrl('edit', ['record' => CarouselSetting::current()]),
        );
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
