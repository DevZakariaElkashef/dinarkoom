<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th style="width: 15%;">{{ __("#") }}</th>
            <th style="width: 15%;">{{ __("Name") }}</th>
            <th style="width: 25%;">{{ __("Relatievs Type") }}</th>
            <th style="width: 15%;">{{ __("Relative User") }}</th>
            <th style="width: 15%;">{{ __("Civil_id") }}</th>
            <th style="width: 10%;">{{ __("Date") }}</th>
        </tr>
        @foreach ($relatives as $relative)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $relative->name }}</td>
                <td>{{ $relative->type->{'name_' . app()->getLocale()} }}</td>
                <td>{{ $relative->user->name }}</td>
                <td>{{ $relative->civil_id }}</td>
                <td>{{ $relative->created_at }}</td>
            </tr>
            
        @endforeach
        
    </table>
</body>
</html>