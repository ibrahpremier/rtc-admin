@extends("layout")
@section("title")
    Membre du club
@endsection
@section("titre")
    Membre du club
@endsection
@section("btn_action")
<a href="{{route('membre.create')}}" class="btn btn-danger">
    <i class="fas fa-plus-circle"></i>
    Ajouter un membre
  </a>
@endsection

@section("content")

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N°</th>
          <th>Nom</th>
          <th>Prénoms</th>
          <th>Téléphone</th>
          <th>Email</th>
          {{-- <th>Date d'adhésion</th> --}}
          <th>Statut cotisation</th>
          <th>Statut Per Capitat</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($membres as $item)
          <tr>
              <td>{{$loop->iteration}}</td>
              {{-- <td>{{$item->nom}}</td> --}}
              <td><a href="{{route('membre.show',$item->id)}}" >{{$item->nom}}</a></td>
            <td>{{$item->prenom}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>
            {{-- <td>{{$item->date_adhesion}}</td> --}}
            <td> - </td>
            <td> - </td>
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
    $("#example1").DataTable({
      dom: 'Bfrtip',
      buttons: ["excel", "pdf"],
      language: {
          "url": 'assets/datatable_fr.json'
      },
      "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection