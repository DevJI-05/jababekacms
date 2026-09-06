<?php

namespace App\Filament\Resources\AnchorTenants;

use App\Filament\Resources\AnchorTenants\Pages\CreateAnchorTenant;
use App\Filament\Resources\AnchorTenants\Pages\EditAnchorTenant;
use App\Filament\Resources\AnchorTenants\Pages\ListAnchorTenants;
use App\Filament\Resources\AnchorTenants\Schemas\AnchorTenantForm;
use App\Filament\Resources\AnchorTenants\Tables\AnchorTenantsTable;
use App\Models\Tenant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class AnchorTenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static string|UnitEnum|null $navigationGroup = 'Tenants';

    protected static ?string $navigationLabel = 'Anchor Tenants';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('is_anchor', true);
    }

    public static function form(Schema $schema): Schema
    {
        return AnchorTenantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnchorTenantsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAnchorTenants::route('/'),
            'create' => CreateAnchorTenant::route('/create'),
            'edit' => EditAnchorTenant::route('/{record}/edit'),
        ];
    }
}
