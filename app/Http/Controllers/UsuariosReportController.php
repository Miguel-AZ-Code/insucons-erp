<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UsuariosReportController extends Controller
{
    public function imprimir()
    {
        $usuarios = User::all();
        $pdf = pdf::loadView('reports.users.usuarios', compact('usuarios'));
        return  $pdf->download('usuarios.pdf');
    }
}
