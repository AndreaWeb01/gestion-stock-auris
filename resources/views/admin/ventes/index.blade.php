@extends('layouts.base')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h4 class="mb-0">Historique des ventes</h4>
        </div>
        <div class="card-body">
            <p>Consultez l'historique des ventes effectuées.</p>


    <form method="GET" action="" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label>Période</label>
                <select name="periode" class="form-control" id="periode-select">
                    <option value="jour" @if(request('periode')=='jour') selected @endif>Jour</option>
                    <option value="semaine" @if(request('periode')=='semaine') selected @endif>Semaine</option>
                    <option value="mois" @if(request('periode')=='mois') selected @endif>Mois</option>
                    <option value="annee" @if(request('periode')=='annee') selected @endif>Année</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Date de début</label>
                <input type="date" name="date_debut" class="form-control" value="{{ request('date_debut') }}">
            </div>
            <div class="col-md-3">
                <label>Date de fin</label>
                <input type="date" name="date_fin" class="form-control" value="{{ request('date_fin') }}">
            </div>
            <div class="col-md-3">
                <label>Recherche</label>
                <input type="text" name="q" class="form-control" placeholder="Client, code reçu, utilisateur..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code reçu</th>
                <th>Client</th>
                <th>Utilisateur</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Montant total</th>
                <th>Remise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventes as $vente)
            <tr @if ($vente->status='validee') style="background-color:#f8d7da ;"
            @endif>
                <td>{{ $vente->code_recu }}</td>
                <td>{{ $vente->client->nom ?? '' }}</td>
                <td>{{ $vente->user->nom ?? '' }}</td>
                <td>{{$vente->statut ?? ''}}
                <td>{{ $vente->date_vente }}</td>
                <td>{{ number_format($vente->montant_total, 0, ',', ' ') }} FCFA</td>
                <td>{{ number_format($vente->remise, 0, ',', ' ') }} FCFA</td>
                <td>
                    <a href="{{ route('ventes.show', $vente->id) }}" class="btn btn-info btn-sm">Détail</a>
                </td>
                <td>
                    <a href="{{ route('ventes.annulerVente', $vente->id) }}" class="btn btn-danger btn-sm">Annuller</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ventes->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
