<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use App\Exports\UsersExport;
use App\Models\User;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\User\UserFiltersLayout;
use App\Orchid\Layouts\User\UserListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class UserListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'users' => User::with('roles')
                ->filters(UserFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'User';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'All registered users';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            DropDown::make('Export file')
                ->icon('cloud-download')
                ->list([

                    Button::make('CSV')
                        ->method('exportCSV')
                        ->rawClick()
                        ->novalidate(),

                    Button::make('Excel')
                        ->method('exportExcel')
                        ->rawClick()
                        ->novalidate(),

                    Button::make('PDF')
                        ->method('exportPDF')
                        ->rawClick()
                        ->novalidate(),

                ]),
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.systems.users.create'),
        ];
    }

    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            UserFiltersLayout::class,
            UserListLayout::class,

            Layout::modal('asyncEditUserModal', UserEditLayout::class)
                ->async('asyncGetUser'),
        ];
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetUser(User $user): iterable
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param Request $request
     * @param User    $user
     */
    public function saveUser(Request $request, User $user): void
    {
        $request->validate([
            'user.email' => [
                'required',
                Rule::unique(User::class, 'email')->ignore($user),
            ],
        ]);

        $user->fill($request->input('user'))->save();

        Toast::info(__('User was saved.'));
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        User::findOrFail($request->get('id'))->delete();

        Toast::info(__('User was removed'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function exportCSV()
    {
        return response()->streamDownload(function () {
            $usuarios = User::all();
            $csv = tap(fopen('php://output', 'wb'), function ($csv) {
                fputcsv($csv, ['Nombre', 'Correo']);
            });

            foreach ($usuarios as $usuario) {
                fputcsv($csv, [
                    'Nombre' => $usuario->name,
                    'Correo' => $usuario->email,
                ]);
            }

            return tap($csv, function ($csv) {
                fclose($csv);
            });
        }, 'File-name.csv');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }

    public function exportPDF(){
        return redirect()->route('printUsuarios');
    }
}
