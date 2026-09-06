<?php

namespace App\Filament\Resources\HistoryEras;

use App\Filament\Resources\HistoryEras\Pages\CreateHistoryEra;
use App\Filament\Resources\HistoryEras\Pages\EditHistoryEra;
use App\Filament\Resources\HistoryEras\Pages\ListHistoryEras;
use App\Filament\Resources\HistoryEras\Schemas\HistoryEraForm;
use App\Filament\Resources\HistoryEras\Tables\HistoryErasTable;
use App\Models\HistoryEra;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HistoryEraResource extends Resource
{
    protected static ?string $model = HistoryEra::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static string|UnitEnum|null $navigationGroup = 'Company History';

    protected static ?string $navigationLabel = 'Eras';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'label_en';

    public static function form(Schema $schema): Schema
    {
        return HistoryEraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HistoryErasTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHistoryEras::route('/'),
            'create' => CreateHistoryEra::route('/create'),
            'edit' => EditHistoryEra::route('/{record}/edit'),
        ];
    }
}
