<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marcas</title>
</head>
<body>
    <h1>Lista de marcas de leche</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Año de Fundación</th>
                <th>País</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td>{{ $marca -> marca}}</td>
                    <td>{{ $marca -> anno_fundacion}}</td>
                    <td>{{ $marca -> pais}}</td>
                    <td>
                        <a href="{{ route("marcas.show", ["marca" => $marca -> id]) }}">Ver</a>
                    </td>
                    <td>
                        <form action="{{ route("marcas.destroy", ["marca" => $marca -> id]) }}" method="post">
                            @csrf
                            {{ method_field("DELETE") }}
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>
</body>
</html>