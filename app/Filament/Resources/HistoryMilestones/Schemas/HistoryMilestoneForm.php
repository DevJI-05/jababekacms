<?php

namespace App\Filament\Resources\HistoryMilestones\Schemas;

use App\Models\HistoryEra;
use App\Support\ImageThumbnailer;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HistoryMilestoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('history_era_id')
                    ->label('Era')
                    ->options(fn () => HistoryEra::query()->orderBy('sort_order')->pluck('label_en', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('year')
                    ->label('Year')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('1989'),

                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_id')
                    ->label('Title (Bahasa Indonesia)')
                    ->maxLength(255)
                    ->helperText('Optional — falls back to the English title if left empty.')
                    ->columnSpanFull(),

                Textarea::make('description_en')
                    ->label('Description (English)')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('description_id')
                    ->label('Description (Bahasa Indonesia)')
                    ->rows(4)
                    ->helperText('Optional — falls back to the English description if left empty.')
                    ->columnSpanFull(),

                FileUpload::make('media')
                    ->label('Photos & Videos')
                    ->disk('public')
                    ->directory('history-milestones')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->panelLayout('grid')
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->openable()
                    ->downloadable()
                    ->saveUploadedFileUsing(function (BaseFileUpload $component, TemporaryUploadedFile $file): ?string {
                        $path = $component->saveUploadedFile($file);

                        if ($path !== null) {
                            ImageThumbnailer::generate($component->getDiskName(), $path);
                        }

                        return $path;
                    })
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                TextInput::make('sort_order')
                    ->label('Sort order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
