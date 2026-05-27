<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Employé - {{ $employee->first_name }} {{ $employee->last_name }}</title>
    <style>
        /* Police et couleurs globales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 2rem;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #007bff;
            letter-spacing: 1px;
        }
        .header p {
            margin: 0;
            font-size: 1rem;
            color: #555;
        }

        /* Conteneur employé */
        .employee-container {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Photo */
        .employee-photo {
            flex: 0 0 150px;
        }
        .employee-photo img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
        }

        /* Infos principales */
        .employee-details {
            flex: 1;
        }
        .employee-details h2 {
            margin-top: 0;
            color: #007bff;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        .employee-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0.5rem;
        }
        .employee-details table td {
            padding: 0.5rem;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        .employee-details table td:first-child {
            font-weight: bold;
            width: 30%;
            color: #555;
        }

        /* Statut */
        .status-active {
            color: green;
            font-weight: bold;
        }
        .status-inactive {
            color: red;
            font-weight: bold;
        }

        /* Sections */
        .section {
            margin-bottom: 1.5rem;
        }
        .section h3 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 0.25rem;
            margin-bottom: 0.5rem;
            color: #007bff;
            font-size: 1.2rem;
        }

        /* Table infos complémentaires */
        .section table {
            width: 100%;
            border-collapse: collapse;
        }
        .section table td {
            padding: 0.5rem;
            border-bottom: 1px solid #eee;
        }
        .section table td:first-child {
            font-weight: bold;
            width: 35%;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Fiche Employé</h1>
        <p>{{ $employee->first_name }} {{ $employee->last_name }} | Matricule: {{ $employee->matricule }}</p>
    </div>

    <div class="employee-container">
        <div class="employee-photo">
            @php
                $photoUrl = $employee->getFirstMediaUrl('employees') ?: 'https://placehold.co/150';
            @endphp
            <img src="{{ public_path('storage/' . $employee->getFirstMedia('employees')->id . '/' . $employee->getFirstMedia('employees')->file_name) ?? $photoUrl }}" alt="Photo {{ $employee->first_name }}">
        </div>


        <div class="employee-details">
            <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
            <table>
                <tr>
                    <td>Status</td>
                    <td><span class="{{ $employee->status == 'active' ? 'status-active' : 'status-inactive' }}">{{ ucfirst($employee->status) }}</span></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $employee->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $employee->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Département</td>
                    <td>{{ $employee->department->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Poste</td>
                    <td>{{ $employee->position->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Matricule</td>
                    <td>{{ $employee->matricule ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="section">
        <h3>Informations complémentaires</h3>
        <table>
            <tr>
                <td>Date de naissance</td>
                <td>{{ $employee->birth_date ?? '-' }}</td>
            </tr>
            <tr>
                <td>Date d’embauche</td>
                <td>{{ $employee->hire_date ?? '-' }}</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>{{ $employee->address ?? '-' }}</td>
            </tr>
            <tr>
                <td>Type de contrat</td>
                <td>{{ $employee->contract_type ?? '-' }}</td>
            </tr>
            <tr>
                <td>Salaire</td>
                <td>{{ $employee->salary ?? '-' }}</td>
            </tr>
            <tr>
                <td>Notes</td>
                <td>{{ $employee->notes ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h3>Informations additionnelles</h3>
        <table>
            <tr>
                <td>Numéro de sécurité sociale</td>
                <td>{{ $employee->social_security_number ?? '-' }}</td>
            </tr>
            <tr>
                <td>Numéro passeport / CIN</td>
                <td>{{ $employee->id_number ?? '-' }}</td>
            </tr>
            <tr>
                <td>Banque</td>
                <td>{{ $employee->bank_name ?? '-' }}</td>
            </tr>
            <tr>
                <td>IBAN</td>
                <td>{{ $employee->iban ?? '-' }}</td>
            </tr>
            <tr>
                <td>Emergency contact</td>
                <td>{{ $employee->emergency_contact ?? '-' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
