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
            <th style="width: 20%;">{{ __("Email Address") }}</th>
            <th style="width: 25%;">{{ __("Civil ID number") }}</th>
            <th style="width: 15%;">{{ __("Phone") }}</th>
            <th style="width: 15%;">{{ __("Addition_Phone") }}</th>
            <th style="width: 10%;">{{ __("Date") }}</th>
        </tr>
        @foreach ($users as $user)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->civil_id }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->addition_phone }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            
        @endforeach
        
    </table>
</body>
</html>