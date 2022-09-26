@extends('layout')
@section('titre')
    Brouillard de caisse
@endsection

@section('content')
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="{{route('brouillard.store')}}" method="post">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h3>Nouvelle pièce</h3>
                    </div>
                    <div class="card-body p-5">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <label for="type">Opération <span class="text-danger">*</span></label>
                                    <select class="custom-select form-control @error('type') is-invalid @enderror" name="type"
                                    id="type" placeholder="Choisir" required value="{{old('type')}}">
                                        <option selected disabled></option>
                                        <option value="entrée">Entrée</option>
                                        <option value="sortie">Sortie</option>
                                      </select>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-7">
                                <label for="montant">Montant <span class="text-danger">*</span></label>

                            <div class="input-group">
                                <input type="number" class="form-control @error('montant') is-invalid @enderror" name="montant" id="montant" placeholder="Montant" required value="{{old('montant')}}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">FCFA</div>
                                </div>
                            </div>
                                @error('montant')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="designation">Désignation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation"
                                id="designation" placeholder="décrire l'opération" required value="{{old('designation')}}">
                            @error('designation')
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
                        <a href="{{route('brouillard.index')}}" class="btn btn-default mt-3">
                            <i class="fas fa-chevron-left"></i> 
                            Annuler
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
