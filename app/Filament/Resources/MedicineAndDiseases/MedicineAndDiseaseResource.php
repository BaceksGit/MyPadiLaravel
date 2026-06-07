<?php

namespace App\Filament\Resources\MedicineAndDiseases;

use App\Models\DiseaseMedicine; // <--- use the real model
use App\Filament\Resources\MedicineAndDiseases\Pages\CreateMedicineAndDisease;
use App\Filament\Resources\MedicineAndDiseases\Pages\EditMedicineAndDisease;
use App\Filament\Resources\MedicineAndDiseases\Pages\ListMedicineAndDiseases;
use App\Filament\Resources\MedicineAndDiseases\Schemas\MedicineAndDiseaseForm;
use App\Filament\Resources\MedicineAndDiseases\Tables\MedicineAndDiseasesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MedicineAndDiseaseResource extends Resource
{
    protected static ?string $model = DiseaseMedicine::class; // <--- fix here
//    protected static string|UnitEnum|null $navigationGroup = 'Admin';
    protected static ?string $recordTitleAttribute = 'disease_name';
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return MedicineAndDiseaseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedicineAndDiseasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMedicineAndDiseases::route('/'),
            'create' => CreateMedicineAndDisease::route('/create'),
            'edit' => EditMedicineAndDisease::route('/{record}/edit'),
        ];
    }

    // Role-based access (only admin can manage diseases)
    public static function canViewAny(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->user()?->role === 'admin';
    }
}
