<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }}</li>
        @endforeach
    </ul>
</body>
</html>
