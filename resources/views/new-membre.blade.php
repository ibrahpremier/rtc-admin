@extends('layout')
@section('titre')
    Mandat 2022 - 2023
@endsection

@section('content')
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="{{route('membre.store')}}" method="post">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h3>Nouveau Membre</h3>
                    </div>
                    <div class="card-body p-5">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <label for="nom">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                                    id="nom" placeholder="Nom" required value="{{old('nom')}}">
                                @error('nom')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-7">
                                <label for="prenom">Prénoms <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                    name="prenom" id="prenom" placeholder="Prénoms" required value="{{old('prenom')}}">
                                @error('prenom')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone <span class="text-danger">*</span></label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">(+226)</div>
                                </div>
                                {{-- <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username"> --}}
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" id="phone" placeholder="Téléphone" minlength="8" maxlength="8"
                                    required value="{{old('phone')}}">
                            </div>
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="E-mail" required value="{{old('email')}}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="adhesion">Date d'adhésion</label>
                            <input type="date" class="form-control @error('adhesion') is-invalid @enderror"
                                name="adhesion" id="adhesion" placeholder="Date d'adhésion" value="{{old('adhesion')}}">
                            @error('adhesion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-save"></i>
                            Enregistrer
                        </button>
                        <a href="{{route('membre.index')}}" class="btn btn-default mt-3">
                            <i class="fas fa-chevron-left"></i> 
                            Annuler
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
