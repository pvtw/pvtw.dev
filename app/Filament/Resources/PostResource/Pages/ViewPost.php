<?php

declare(strict_types=1);

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Infolists\Components\MarkdownEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

final class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title'),
                MarkdownEntry::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
