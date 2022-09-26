<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RTC Admin | Connexion</title>
@include("include.head_import")
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <img src="{{asset('assets/dist/img/rotaract-logo.jpg')}}" alt="" width="250"> <br>
      <h5>Ouagadougou Doyen</h5>
    </div>
    <div class="card-body">

      <form action="/login" method="post">
        @csrf
        <div class="form-group">
          <label for="phone">Téléphone</label>
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="Téléphone" required minlength="8" maxlength="8">
          @error('phone')
          <p class="text-danger text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mb-5">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Mot de passe" required>
          @error('password')
          <p class="text-danger text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
        <p class="mb-0 mt-3 text-right">
          <a href="/register" class="text-danger">S'inscrire</a>
        </p>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include("include.script_import")
</body>
</html>
