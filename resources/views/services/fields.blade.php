<!-- Nom Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_service', 'Nom Service:') !!}
    {!! Form::text('nom_service', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>