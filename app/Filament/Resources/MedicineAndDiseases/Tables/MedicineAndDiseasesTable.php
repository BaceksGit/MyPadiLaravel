<?php

namespace App\Filament\Resources\MedicineAndDiseases\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class MedicineAndDiseasesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('disease_name')->searchable()->label('Disease Name'),
                Tables\Columns\TextColumn::make('symptoms')->limit(50),
                Tables\Columns\TextColumn::make('cause')->limit(30),
                Tables\Columns\TextColumn::make('severity_level')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\ImageColumn::make('disease_image')->label('Disease Image')->circular(),
                Tables\Columns\TextColumn::make('medicine_name')->searchable()->label('Medicine Name'),
                Tables\Columns\TextColumn::make('application_method')->limit(30),
                Tables\Columns\TextColumn::make('purchase_link')
                    ->url(fn ($record) => $record->purchase_link) // <--- FIXED
                    ->openUrlInNewTab()
                    ->limit(30),
                Tables\Columns\ImageColumn::make('medicine_image')->label('Medicine Image')->circular(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                // Add filters here if needed
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
