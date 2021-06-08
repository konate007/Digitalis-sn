<!-- Nom Formation Field -->
<div class="col-sm-12">
    {!! Form::label('nom_formation', 'Nom Formation:') !!}
    <p>{{ $formation->nom_formation }}</p>
</div>

<!-- Date Debut Field -->
<div class="col-sm-12">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    <p>{{ $formation->date_debut }}</p>
</div>

<!-- Date Fin Field -->
<div class="col-sm-12">
    {!! Form::label('date_fin', 'Date Fin:') !!}
    <p>{{ $formation->date_fin }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $formation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $formation->updated_at }}</p>
</div>

