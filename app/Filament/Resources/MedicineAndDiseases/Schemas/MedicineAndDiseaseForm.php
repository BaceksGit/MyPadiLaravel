<?php

namespace App\Filament\Resources\MedicineAndDiseases\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class MedicineAndDiseaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('disease_name')
                    ->label('Disease Name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('symptoms')
                    ->label('Symptoms')
                    ->required()
                    ->rows(3),

                TextInput::make('cause')
                    ->label('Cause')
                    ->required()
                    ->maxLength(255),

                Select::make('severity_level')
                    ->label('Severity Level')
                    ->options([
                        'Low' => 'Low',
                        'Medium' => 'Medium',
                        'High' => 'High',
                    ])
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3),

                FileUpload::make('disease_image')
                    ->label('Disease Image')
                    ->image()
                    ->directory('diseases'),

                TextInput::make('medicine_name')
                    ->label('Medicine Name')
                    ->maxLength(255),

                Textarea::make('application_method')
                    ->label('Application Method')
                    ->rows(2),

                TextInput::make('purchase_link')
                    ->label('Purchase Link')
                    ->url()
                    ->maxLength(255),

                FileUpload::make('medicine_image')
                    ->label('Medicine Image')
                    ->image()
                    ->directory('medicines'),
            ]);
    }
}
