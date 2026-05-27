<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des employés</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 15px;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #f1f5f9;
        }
        .status-active {
            color: green;
            font-weight: bold;
        }
        .status-inactive {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Liste des employés</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom complet</th>
            <th>Matricule</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Département</th>
            <th>Poste</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->matricule }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->department->name ?? '-' }}</td>
                <td>{{ $employee->position->title ?? '-' }}</td>
                <td class="{{ $employee->status === 'active' ? 'status-active' : 'status-inactive' }}">
                    {{ ucfirst($employee->status) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
