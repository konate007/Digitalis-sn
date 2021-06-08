<div class="table-responsive">
    <table class="table" id="partenaires-table">
        <thead>
            <tr>
                <th>Nom Partenaire</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partenaires as $partenaire)
            <tr>
                <td>{{ $partenaire->nom_partenaire }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partenaires.destroy', $partenaire->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partenaires.show', [$partenaire->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partenaires.edit', [$partenaire->id]) }}" class='btn btn-default btn-xs'>
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
