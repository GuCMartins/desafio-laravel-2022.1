<div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>País de origem</th>
            <th>Pontos</th>
            <th>Vitorias/Derrotas</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->motherland }}</td>
                <td>{{ $team->points }}</td>
                <td>{{ $team->wins }}/{{ $team->defeats }}</td>
            <tr>    
        </tbody>    
</div>
