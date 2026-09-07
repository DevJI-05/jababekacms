<?php

namespace App\Filament\Resources\HistoryMilestones\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class HistoryMilestonesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('media')
                    ->label('Media')
                    ->disk('public')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->square(),

                TextColumn::make('year')
                    ->sortable(),

                TextColumn::make('title_en')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('era.label_en')
                    ->label('Era')
                    ->badge()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('history_era_id')
                    ->label('Era')
                    ->relationship('era', 'label_en'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
