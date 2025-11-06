<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Grid::make()->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->required(),
                        TextInput::make('password')->password()->required()->visibleOn('create')
                    ])
                ])
            ]);
    }
}
