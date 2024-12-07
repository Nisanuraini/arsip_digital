<?php

namespace App\Filament\Resources\ArchiveFilesResource\Pages;

use App\Filament\Resources\ArchiveFilesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArchiveFiles extends ListRecords
{
    protected static string $resource = ArchiveFilesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
