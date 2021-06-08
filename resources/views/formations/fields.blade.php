<!-- Nom Formation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_formation', 'Nom Formation:') !!}
    {!! Form::text('nom_formation', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    {!! Form::text('date_debut', null, ['class' => 'form-control','id'=>'date_debut']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_debut').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_fin', 'Date Fin:') !!}
    {!! Form::text('date_fin', null, ['class' => 'form-control','id'=>'date_fin']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush