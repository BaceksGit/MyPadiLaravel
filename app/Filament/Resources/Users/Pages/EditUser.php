<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    // Connect this page to the UserResource
    protected static string $resource = UserResource::class;

    // Add actions to the page header (e.g., Delete button)
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
