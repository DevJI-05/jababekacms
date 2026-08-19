<?php

namespace App\Filament\Resources\SubMenus\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SubMenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('menu.label_en')
                    ->label('Menu')
                    ->badge()
                    ->sortable(),

                TextColumn::make('contents_count')
                    ->label('Content items')
                    ->counts('contents')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('menu_id')
                    ->label('Menu')
                    ->relationship('menu', 'label_en'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
