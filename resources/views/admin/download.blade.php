<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customer</title>
</head>
<body>
    <table>
        <thead>
            <th>Name</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>Package</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->customer }}</td>
                    <td>{{ $data->telephone }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->package }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>