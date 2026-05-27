@extends('layouts.app')
@section('title') {{ 'Profil' }} @endsection
@section('content')

    <nav class="breadcrumb">
        <ul>
            <li><a href="{{ route('home') }}">Tableau de bord</a></li>
            <li><a href="{{ route('employees.index') }}">Employés</a></li>
            <li class="active">Profil de l'Employé</li>
        </ul>
    </nav>

    <!-- Employee Profile Page -->
    <div class="employee-profile-ui">

        <!-- Header -->
        <div class="employee-header-ui">
            <div class="employee-photo-ui">
                @if($employee->getFirstMediaUrl('employees'))
                    <img src="{{ $employee->getFirstMediaUrl('employees') }}" alt="Photo de {{ $employee->first_name }}">
                @else
                    <img src="https://placehold.co/150" alt="Photo par défaut">
                @endif
            </div>

            <div class="employee-basic-ui">
                <h1 class="employee-name-ui">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                <p class="employee-matricule-ui">Matricule : {{ $employee->matricule }}</p>
                <p class="employee-status-ui {{ $employee->status == 'active' ? 'status-active-ui' : 'status-inactive-ui' }}">
                    {{ ucfirst($employee->status) }}
                </p>
                
                <br>
                <!-- Bouton imprimer -->
                <a href="{{ route('employees.print', $employee->id) }}" target="_blank" class="btn-print-ui">
                    <i class="las la-print"></i> Imprimer
                </a>
            </div>
        </div>

        <!-- Details Section -->
        <div class="employee-details-ui">
            <h2 class="details-section-title-ui">Informations personnelles</h2>
            <div class="details-grid-ui">
                <div class="detail-item-ui"><span>Genre :</span> {{ $employee->gender }}</div>
                <div class="detail-item-ui"><span>Date de naissance :</span> {{ $employee->birth_date }}</div>
                <div class="detail-item-ui"><span>Nationalité :</span> {{ $employee->nationality }}</div>
                <div class="detail-item-ui"><span>Téléphone :</span> {{ $employee->phone }}</div>
                <div class="detail-item-ui"><span>Email :</span> {{ $employee->email }}</div>
                <div class="detail-item-ui"><span>Adresse :</span> {{ $employee->address }}</div>
            </div>

            <h2 class="details-section-title-ui">Informations professionnelles</h2>
            <div class="details-grid-ui">
                <div class="detail-item-ui"><span>Type :</span> {{ $employee->type }}</div>
                <div class="detail-item-ui"><span>Département :</span> {{ $employee->department->name ?? '-' }}</div>
                <div class="detail-item-ui"><span>Poste :</span> {{ $employee->position->title ?? '-' }}</div>
                <div class="detail-item-ui">
                    <span>Supérieur :</span> {{ optional($employee->supervisor)->first_name ?: '-' }}
                </div>
                <div class="detail-item-ui"><span>Date d'embauche :</span> {{ $employee->hire_date }}</div>
            </div>
        </div>
    </div>

@endsection