<?php

namespace App\Filament\Admin\Resources\PostalCodeResource\Pages;

use App\Filament\Admin\Resources\PostalCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostalCodes extends ListRecords
{
    protected static string $resource = PostalCodeResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
