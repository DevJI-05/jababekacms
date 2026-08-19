<?php

namespace App\Filament\Resources\Contents\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('menu.label_en')
                    ->label('Menu')
                    ->badge()
                    ->sortable(),

                TextColumn::make('subMenu.label')
                    ->label('Sub menu')
                    ->badge()
                    ->color('gray')
                    ->placeholder('—'),

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
                SelectFilter::make('sub_menu_id')
                    ->label('Sub menu')
                    ->relationship('subMenu', 'label'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
