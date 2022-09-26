@extends("layout")
@section("title")
    Brouillard de caisse
@endsection
@section("titre")
    Brouillard de caisse 
@endsection

@section("btn_action")
<h3 class="text-right">Solde: {{$solde}} FCFA</h3>
<a href="{{route('brouillard.create')}}" class="btn btn-danger">
  <i class="fas fa-plus-circle"></i>
  Ajouter une pièce
</a>

@endsection
@section("content")

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="datatable_brouillard" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N° Pièce</th>
          <th>Date</th>
          <th>Solde initial</th>
          <th>Opération</th>
          <th>Désignation</th>
          <th>Montant</th>
          <th>Solde</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($brouillard as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->solde_initial}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->designation}}</td>
            <td>{{$item->montant}}</td>
            <td>{{$item->solde}}</td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@section("custom_script")
<script>
  $(document).ready(function(){
    $("#datatable_brouillard").DataTable({
      dom: 'Bfrtip',
      buttons: ["excel", "pdf"],
      language: {
          "url": 'assets/datatable_fr.json'
      },
      "responsive": true,
    }).buttons().container().appendTo('#datatable_brouillard_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection