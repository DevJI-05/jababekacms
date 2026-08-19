<?php

namespace App\Filament\Resources\CarouselSettings;

use App\Filament\Resources\CarouselSettings\Pages\EditCarouselSetting;
use App\Filament\Resources\CarouselSettings\Pages\ListCarouselSettings;
use App\Filament\Resources\CarouselSettings\Schemas\CarouselSettingForm;
use App\Models\CarouselSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class CarouselSettingResource extends Resource
{
    protected static ?string $model = CarouselSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Homepage';

    protected static ?string $navigationLabel = 'Carousel Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CarouselSettingForm::configure($schema);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCarouselSettings::route('/'),
            'edit' => EditCarouselSetting::route('/{record}/edit'),
        ];
    }
}
