@extends("layout")
@section("title")
    Cotisation
@endsection
@section("titre")
    Cotisation
@endsection
@section("content")
<div class="card">
  <div class="card-body">
    <h1 class="m-5">Bientôt disponible</h1>
  </div>
</div>
{{-- <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Juillet</th>
          <th>Août</th>
          <th>Septembre</th>
          <th>Octobre</th>
          <th>Novembre</th>
          <th>Décembre</th>
          <th>Janvier</th>
          <th>Février</th>
          <th>Mars</th>
          <th>Avril</th>
          <th>Mai</th>
          <th>Juin</th>
          <th>Per Capitat</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
</div> --}}
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