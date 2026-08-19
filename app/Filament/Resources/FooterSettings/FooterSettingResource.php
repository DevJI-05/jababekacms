<?php

namespace App\Filament\Resources\FooterSettings;

use App\Filament\Resources\FooterSettings\Pages\EditFooterSetting;
use App\Filament\Resources\FooterSettings\Pages\ListFooterSettings;
use App\Filament\Resources\FooterSettings\Schemas\FooterSettingForm;
use App\Models\FooterSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class FooterSettingResource extends Resource
{
    protected static ?string $model = FooterSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Site Settings';

    protected static ?string $navigationLabel = 'Footer Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return FooterSettingForm::configure($schema);
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
            'index' => ListFooterSettings::route('/'),
            'edit' => EditFooterSetting::route('/{record}/edit'),
        ];
    }
}
