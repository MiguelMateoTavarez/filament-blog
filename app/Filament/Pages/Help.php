<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Help extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static string $view = 'filament.pages.help';

    protected static ?int $navigationSort = 100;

    protected static ?string $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Help';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasAnyRole(['Admin', 'Editor']);
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->hasAnyRole(['Admin', 'Editor']), 403);
    }
}
