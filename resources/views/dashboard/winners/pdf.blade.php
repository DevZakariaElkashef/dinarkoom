<!DOCTYPE html>
<html>
<head>
    <title>Usresources/views/dashboard/users/pdf.blade.phper Information</title>
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
            <th style="width: 25%;">{{ __("Civil ID number") }}</th>
            <th style="width: 15%;">{{ __("Phone") }}</th>
            <th style="width: 15%;">{{ __("Value") }}</th>
            <th style="width: 10%;">{{ __("Month") }}</th>
            <th style="width: 10%;">{{ __("Added_by") }}</th>
        </tr>
        @foreach ($winners as $winner)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $winner->user->name }}</td>
                <td>{{ $winner->user->civil_id }}</td>
                <td>{{ $winner->user->phone }}</td>
                <td>{{ $winner->value }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('m', $winner->month)->locale(app()->getLocale())->format('F') }}</td>
                <td>{{ $winner->admin->name }}</td>
            </tr>
            
        @endforeach
        
    </table>
</body>
</html>