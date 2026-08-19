<?php

namespace App\Filament\Resources\SubMenus;

use App\Filament\Resources\SubMenus\Pages\CreateSubMenu;
use App\Filament\Resources\SubMenus\Pages\EditSubMenu;
use App\Filament\Resources\SubMenus\Pages\ListSubMenus;
use App\Filament\Resources\SubMenus\Schemas\SubMenuForm;
use App\Filament\Resources\SubMenus\Tables\SubMenusTable;
use App\Models\SubMenu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SubMenuResource extends Resource
{
    protected static ?string $model = SubMenu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static string|UnitEnum|null $navigationGroup = 'Navigation';

    protected static ?string $navigationLabel = 'Sub Menus';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return SubMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubMenusTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubMenus::route('/'),
            'create' => CreateSubMenu::route('/create'),
            'edit' => EditSubMenu::route('/{record}/edit'),
        ];
    }
}
