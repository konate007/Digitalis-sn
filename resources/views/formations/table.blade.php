<div class="table-responsive">
    <table class="table" id="formations-table">
        <thead>
            <tr>
                <th>Nom Formation</th>
        <th>Date Debut</th>
        <th>Date Fin</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->nom_formation }}</td>
            <td>{{ $formation->date_debut }}</td>
            <td>{{ $formation->date_fin }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['formations.destroy', $formation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('formations.show', [$formation->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('formations.edit', [$formation->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
