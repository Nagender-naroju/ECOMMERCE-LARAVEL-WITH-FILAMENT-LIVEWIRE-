<?php

namespace App\Filament\Resources\Users\Tables;

use Dom\Text;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->searchable(['name']),
                TextColumn::make("email")->searchable(['email']),
                TextColumn::make('created_at')   // ✅ show Created At
                    ->label('Created At')        // custom label
                    ->dateTime('d M Y, h:i A')   // format date (e.g. 05 Nov 2025, 03:45 PM)
                    ->sortable(), 
                TextColumn::make("Actions")
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
