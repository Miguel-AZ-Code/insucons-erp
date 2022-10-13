<?php

namespace App\Orchid\Screens;

use Illuminate\Support\Facades\Artisan;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class BackupScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Copia de seguridad';
    }

    public function description(): ?string
    {
        return "Funciones para posibilitar las copias de seguridad y restauración de todo
        el sistema ";
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.backup',
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Button::make('Ejecutar')
                    ->title('Puede hacer una copia de seguridad de su aplicación:')
                    ->icon('database')
                    ->method('backupAll'),
            ]),
            Layout::rows([
                Button::make('Ejecutar')
                    ->title('Si solo necesita hacer una copia de seguridad de la base de datos:')
                    ->icon('database')
                    ->method('backupDB'),
            ]),
            Layout::rows([
                Button::make('Ejecutar')
                    ->title('Si solo necesita hacer una copia de seguridad de los archivos y desea omitir el volcado de las bases de datos:')
                    ->icon('database')
                    ->method('backupFiles'),
            ])
        ];
    }

    public function backupAll()
    {
        Artisan::call('backup:run');
    }

    public function backupDB()
    {
        Artisan::call('backup:run --only-db');
    }

    public function backupFiles()
    {
        Artisan::call('backup:run --only-files');
    }
}
