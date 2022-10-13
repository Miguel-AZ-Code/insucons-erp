<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class EmailSenderScreen extends Screen
{
    /**
     * A method that defines all screen input data
     * is in it that database queries should be called,
     * api or any others (not necessarily explicit),
     * the result of which should be an array,
     * appeal to which his keys will be used.
     */
    public function query(): array
    {
        return [
            'subject' => date('F') . ' Noticias de la campaña',
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return "Remitente de correo electrónico";
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Herramienta que envía mensajes de correo electrónico ad-hoc.";
    }

    /**
     * Identifies control buttons and events.
     * which will have to happen by pressing
     */
    public function commandBar(): array
    {
        return [
            Button::make('Enviar mensaje')
                ->icon('paper-plane')
                ->method('sendMessage')
        ];
    }

    /**
     * Set of mappings
     * rows, tables, graphs,
     * modal windows, and their combinations
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('subject')
                    ->title('Sujeto')
                    ->required()
                    ->placeholder('Asunto del mensaje')
                    ->help('Ingrese la línea de asunto para su mensaje'),

                Relation::make('users.')
                    ->title('Destinatarios')
                    ->multiple()
                    ->required()
                    ->placeholder('Correos electrónicos')
                    ->help('Introduzca los usuarios a los que le gustaría enviar este mensaje.')
                    ->fromModel(User::class, 'name', 'email'),

                Quill::make('content')
                    ->title('Contenido')
                    ->required()
                    ->placeholder('Insertar texto aquí...')
                    ->help('Agregue el contenido del mensaje que le gustaría enviar.')

            ])
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:6|max:50',
            'users'   => 'required',
            'content' => 'required|min:10'
        ]);

        Mail::raw($request->get('content'), function (Message $message) use ($request) {
            $message->from('sample@email.com');
            $message->subject($request->get('subject'));

            foreach ($request->get('users') as $email) {
                $message->to($email);
            }
        });


        Alert::info('Your email message has been sent successfully.');
    }

    /**
     * Permission
     *
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.email',
        ];
    }
}
