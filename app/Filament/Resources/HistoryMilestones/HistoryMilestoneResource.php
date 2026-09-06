<?php

namespace App\Filament\Resources\HistoryMilestones;

use App\Filament\Resources\HistoryMilestones\Pages\CreateHistoryMilestone;
use App\Filament\Resources\HistoryMilestones\Pages\EditHistoryMilestone;
use App\Filament\Resources\HistoryMilestones\Pages\ListHistoryMilestones;
use App\Filament\Resources\HistoryMilestones\Schemas\HistoryMilestoneForm;
use App\Filament\Resources\HistoryMilestones\Tables\HistoryMilestonesTable;
use App\Models\HistoryMilestone;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HistoryMilestoneResource extends Resource
{
    protected static ?string $model = HistoryMilestone::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|UnitEnum|null $navigationGroup = 'Company History';

    protected static ?string $navigationLabel = 'Milestones';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title_en';

    public static function form(Schema $schema): Schema
    {
        return HistoryMilestoneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HistoryMilestonesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHistoryMilestones::route('/'),
            'create' => CreateHistoryMilestone::route('/create'),
            'edit' => EditHistoryMilestone::route('/{record}/edit'),
        ];
    }
}
