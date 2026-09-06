<?php

namespace App\Filament\Resources\HistoryEras\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HistoryErasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year_range')
                    ->label('Years')
                    ->placeholder('—'),

                TextColumn::make('label_en')
                    ->label('Label (English)')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('label_id')
                    ->label('Label (ID)')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('milestones_count')
                    ->label('Milestones')
                    ->counts('milestones')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
