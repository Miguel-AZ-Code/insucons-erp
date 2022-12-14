<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [

            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users'),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Proyectos')
                ->icon('home')
                ->list([
                    Menu::make('Mis proyectos')->icon('module'),
                    Menu::make('Crear Nuevo')->icon('module'),
                ])->badge(function () {
                    return 'Próximamente';
                })->permission('platform.projects.list')->divider(),

            Menu::make('Losa llena')
                ->icon('table')
                ->title('HERRAMIENTAS DE CÁLCULO')->badge(function () {
                    return 'Próximamente';
                }),

            Menu::make('Losa con viguetas')
                ->icon('layers')->badge(function () {
                    return 'Próximamente';
                }),

            Menu::make('Editor de ladrillos')
                ->icon('config')->badge(function () {
                    return 'Próximamente';
                }),

            Menu::make('Editor de hormigón')
                ->icon('config')->badge(function () {
                    return 'Próximamente';
                }),

            Menu::make(__('Bitácora'))
                ->icon('list')
                ->title('Tools')
                ->url('log')
                ->permission('platform.activity')
                ->permission('platform.activity'),

            Menu::make(__('Correos'))
                ->icon('envelope-letter')
                ->route('platform.email')
                ->permission('platform.email'),

            Menu::make(__('Backup'))
                ->icon('database')
                ->route('platform.backup')
                ->permission('platform.backup')
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.email', __('Correos')),

            ItemPermission::group('Proyectos')
                ->addPermission('platform.projects.list', 'Menu Proyecto')
                ->addPermission('platform.projects.create', 'Crear')
                ->addPermission('platform.projects.edit', 'Editar')
                ->addPermission('platform.projects.delete', 'Eliminar')
                ->addPermission('platform.projects.show', 'Visualizar'),

            ItemPermission::group('Registro de actividades')
                ->addPermission('platform.activity', 'Bitácora'),

            ItemPermission::group('Base de datos')
                ->addPermission('platform.backup', 'Backup'),
        ];
    }
}
