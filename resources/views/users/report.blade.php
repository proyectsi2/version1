<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Compras</title>
</head>

<body>

    <h2 class="text-center">Listado de Compras</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Fecha de creacion</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Moneda</th>
            </tr>
        </thead>
        <tbody>
             @php
		      $n=1;
			@endphp
            @foreach ($users as $Compra)
           <tr>
               <td>{{ $n++ }}</td>
               <td>{{ $Compra->created_at->toDateString() }}</td> <!-- Modificación aquí -->
               <td>{{ $Compra->proveedor->nombre }}</td> <!-- Accede al nombre del proveedor a través de la relación -->
               <td>{{ $Compra->estado }}</td>
               <td>{{ $Compra->monto }}</td>
               <td>{{ $Compra->moneda->abreviatura}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
