<form method="post" action="{{route('acteurs.destroy',[$acteur->id]) }}">
    @Csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delate actor</button> 