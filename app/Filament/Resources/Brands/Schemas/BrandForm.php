<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Models\Brand;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Section::make([
                    TextInput::make('brand_name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur:true)
                        ->afterStateUpdated(fn (string $operation,$state, Set $set)=>$operation==="create" ? $set('brand_slug', Str::slug($state)): null)
                        ->columnSpanFull(),
                    TextInput::make('brand_slug')
                        ->maxLength(255)
                        ->disabled()
                        ->required()
                        ->dehydrated()
                        ->unique(Brand::class, 'brand_slug', ignoreRecord: true)
                        ->columnSpanFull(),

                    FileUpload::make('brand_image')->image()->directory('brands'),
                    Toggle::make('is_active')->required()->default(true)
               ])->columns(1)
            ]);
    }
}
