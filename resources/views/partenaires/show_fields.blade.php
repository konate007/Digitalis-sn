<!-- Nom Partenaire Field -->
<div class="col-sm-12">
    {!! Form::label('nom_partenaire', 'Nom Partenaire:') !!}
    <p>{{ $partenaire->nom_partenaire }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $partenaire->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $partenaire->updated_at }}</p>
</div>

