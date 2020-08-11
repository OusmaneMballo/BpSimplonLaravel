@extends('layout/layout')
@section('title')
    Compte
@endsection
@section('content')
    <fieldset>
        <legend>Creation Compte</legend>
        <form action="#" class="form" method="post" onsubmit="return post()">
{{--            <input type="hidden" name="token" value="{{ csrf_token('compte_token') }}">--}}
            <div class="row">
                <select name="typecp" class="selectcmpt" id="typecp" onchange="frais()">
                    <option value="0">--Type Compte--</option>
                    {{--{% for typecompte in type_comptes %}
                    <option value="{{ typecompte.id }}">{{ typecompte.libelle }}</option>
                    {% endfor %}--}}
                </select>
                <label for="frai">Frais:<b id="frai"></b></label>
            </div>
            <div class="row">
                <select name="client" id="client" class="selectcmpt">
                    <option value="0">--------------Clients--------------</option>
                    <option value="0"><b>------List Clients Morals-------</b></option>
                   {{-- {% for clientmoral in client_morals %}
                    <option value="{{ clientmoral.id }}-cm">{{ clientmoral.id }}-{{ clientmoral.nom }}</option>
                    {% endfor %}--}}
                    <option value="0"><b>------List Clients Physiques------</b></option>
                    {{--{% for clientphysique in client_physiques %}
                    <option value="{{ clientphysique.id }}-cp">{{ clientphysique.id }}-<b>{{ clientphysique.prenom }} {{ clientphysique.nom }}</b></option>
                    {% endfor %}--}}
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
