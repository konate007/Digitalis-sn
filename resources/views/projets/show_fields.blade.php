<!-- Nom Projet Field -->
<div class="col-sm-12">
    {!! Form::label('nom_projet', 'Nom Projet:') !!}
    <p>{{ $projet->nom_projet }}</p>
</div>

<!-- Statut Field -->
<div class="col-sm-12">
    {!! Form::label('statut', 'Statut:') !!}
    <p>{{ $projet->statut }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $projet->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $projet->updated_at }}</p>
</div>

