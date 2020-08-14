@extends('layout/layout')
@section('title')
    Compte
@endsection
@section('content')
    <fieldset>
        <legend>Creation Compte</legend>
        <form action="{{ route('addcompte') }}" class="form" method="post" onsubmit="return post()">
            @csrf
            <div class="row">
                <select name="typecp" class="selectcmpt" id="typecp" onchange="frais()">
                    <option value="0">--Type Compte--</option>
                    @if(!empty($typefrais))
                        @foreach($typefrais as $typefrai)
                            <option value="{{ $typefrai->id }}">{{ $typefrai->libelle }}</option>
                        @endforeach
                    @endif
                </select>
                <label for="frai">Frais:<b id="frai"></b></label>
            </div>
            <div class="row">
                <select name="client" id="client" class="selectcmpt">
                    <option value="0">--------------Clients--------------</option>
                    <option value="0"><b>------List Clients Morals-------</b></option>
                    @if(!empty($clientMorals))
                        @foreach($clientMorals as $clientMoral)
                            <option value="{{ $clientMoral->id }}-cm">{{ $clientMoral->id }}-{{ $clientMoral->nom }}</option>
                        @endforeach
                    @endif
                    <option value="0"><b>------List Clients Physiques------</b></option>
                    @if(!empty($clientPhysiques))
                        @foreach($clientPhysiques as $clientPhysique)
                            <option value="{{ $clientPhysique->id }}-cp">{{ $clientPhysique->id }}-{{ $clientPhysique->nom }}</option>
                        @endforeach
                    @endif
                </select>
                <label for="solde">Solde</label>
                <input type="text" class="inputcl" id="solde" name="solde" required/>
            </div>
            <div class="row">
                <button type="submit" class="valider">Ajouter</button>
                <button type="reset" class="annuler">Annuler</button>
            </div>
        </form>
    </fieldset>
@endsection
