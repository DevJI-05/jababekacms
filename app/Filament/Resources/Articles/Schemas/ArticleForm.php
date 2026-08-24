<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Category;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn () => Category::query()->orderBy('sort_order')->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    })
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),

                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ])
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->maxSize(10240)
                    ->columnSpanFull(),

                Textarea::make('excerpt')
                    ->rows(2)
                    ->maxLength(500)
                    ->helperText('Short summary used on card previews.')
                    ->columnSpanFull(),

                RichEditor::make('body')
                    ->fileAttachmentsMaxSize(10240)
                    ->columnSpanFull(),

                DateTimePicker::make('event_date')
                    ->label('Event date')
                    ->helperText('When the event takes place — separate from when this article was published.')
                    ->visible(fn (Get $get) => Category::find($get('category_id'))?->is_event ?? false)
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
                    ->live(),

                DateTimePicker::make('published_at')
                    ->label('Published at')
                    ->default(now())
                    ->visible(fn (Get $get) => (bool) $get('is_published')),
            ]);
    }
}
