<?php

namespace App\Filament\Resources\MedicineAndDiseases\Pages;

use App\Filament\Resources\MedicineAndDiseases\MedicineAndDiseaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMedicineAndDiseases extends ListRecords
{
    protected static string $resource = MedicineAndDiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
