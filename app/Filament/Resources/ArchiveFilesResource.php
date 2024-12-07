<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchiveFilesResource\Pages;
use App\Filament\Resources\ArchiveFilesResource\RelationManagers;
use App\Models\ArchiveFiles;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArchiveFilesResource extends Resource
{
    protected static ?string $model = ArchiveFiles::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('archive_id')
                ->relationship('archive', 'title') // Relasi ke model Archive, menampilkan kolom 'title'
                ->required()
                ->label('Archive'),
                Forms\Components\FileUpload::make('file_path')
                ->directory('archive_files') // Direktori penyimpanan file
                ->label('File')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('archive.title')
                ->label('Archive')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                ->label('File Path'),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Uploaded At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArchiveFiles::route('/'),
            'create' => Pages\CreateArchiveFiles::route('/create'),
            'edit' => Pages\EditArchiveFiles::route('/{record}/edit'),
        ];
    }
}
