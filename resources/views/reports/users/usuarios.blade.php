<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <style>
        .demo {
            border: 1px sólido #c0c0c0;
            border-collapse: colapso;
            padding: 5px;
        }

        .demo th {
            border: 1px sólido #c0c0c0;
            padding: 5px;
            background: #f0f0f0;
        }

        .demo td {
            border: 1px sólido #c0c0c0;
            padding: 5px;
        }
    </style>
    <table class="demo">
        <caption>
            Lista de usuarios
        </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
