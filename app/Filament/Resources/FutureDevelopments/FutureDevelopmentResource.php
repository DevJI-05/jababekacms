<?php

namespace App\Filament\Resources\FutureDevelopments;

use App\Filament\Resources\FutureDevelopments\Pages\CreateFutureDevelopment;
use App\Filament\Resources\FutureDevelopments\Pages\EditFutureDevelopment;
use App\Filament\Resources\FutureDevelopments\Pages\ListFutureDevelopments;
use App\Filament\Resources\FutureDevelopments\Schemas\FutureDevelopmentForm;
use App\Filament\Resources\FutureDevelopments\Tables\FutureDevelopmentsTable;
use App\Models\FutureDevelopment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FutureDevelopmentResource extends Resource
{
    protected static ?string $model = FutureDevelopment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRocketLaunch;

    protected static string|UnitEnum|null $navigationGroup = 'Site Settings';

    protected static ?string $navigationLabel = 'Future Development';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return FutureDevelopmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FutureDevelopmentsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFutureDevelopments::route('/'),
            'create' => CreateFutureDevelopment::route('/create'),
            'edit' => EditFutureDevelopment::route('/{record}/edit'),
        ];
    }
}
