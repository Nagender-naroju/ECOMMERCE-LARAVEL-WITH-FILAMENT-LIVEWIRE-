<?php

namespace App\Filament\Resources\Categories\Schemas;

use Dom\Text;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Section::make([
                    TextInput::make('category_name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur:true)
                        ->afterStateUpdated(fn (string $operation,$state, Set $set)=>$operation==="create" ? $set('category_slug', Str::slug($state)): null)
                        ->columnSpanFull(),
                    TextInput::make('category_slug')
                        ->maxLength(255)
                        ->disabled()
                        ->required()
                        ->dehydrated()
                        ->unique(Category::class, 'category_slug', ignoreRecord: true)
                        ->columnSpanFull(),

                    FileUpload::make('category_image')->image()->directory('categories'),
                    Toggle::make('is_active')->required()->default(true)
               ])->columns(1)
            ]);
    }
}