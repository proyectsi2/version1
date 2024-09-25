<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nota de Compra</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
    }
    .note {
        margin-bottom: 20px;
    }
    .note div {
        margin-bottom: 10px;
    }
    .detail-header {
        font-weight: bold;
        margin-top: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    .total {
        text-align: right;
        margin-top: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Nota de Compra</h1>
    <div class="note">
        <div>Number: {{ $record->id }}</div>
        <div>Proveedor: {{ $record->proveedor->nombre }}</div>
        <div>Estado: {{ $record->estado }}</div>
        <div>Fecha de Compra: {{ $record->fecha_recepcion }}</div>
    </div>
    @if($record->detallecompra)
    <h2 class="detail-header">Detalles de la Compra:</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($record->detallecompra as $detalle)
            <tr>
                <td>{{ $detalle->product->name }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>{{ $detalle->product->price }}</td>
                <td>{{ $detalle->cantidad * $detalle->product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="total">
        <strong>Monto Total:</strong> {{ $record->monto }}
    </div>
</div>
</body>
</html>

