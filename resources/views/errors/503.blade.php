@extends('layouts.errors')

@section('title') {{ 'Maintenance' }} @endsection

@section('content')
<div class="container">
    <div class="error-code">503</div>
    <div class="error-message">
        Le site est actuellement en maintenance. Revenez bientôt.
    </div>

    <a href="{{ url()->previous() }}" class="btn-home">
        <i class="la la-arrow-left"></i> Retour
    </a>
</div>
@endsection
