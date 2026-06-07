<?php

namespace App\Filament\Resources\MedicineAndDiseases\Pages;

use App\Filament\Resources\MedicineAndDiseases\MedicineAndDiseaseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMedicineAndDisease extends EditRecord
{
    protected static string $resource = MedicineAndDiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
