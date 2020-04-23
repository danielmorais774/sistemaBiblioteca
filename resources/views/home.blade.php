@extends('layouts.master-home')

@section('content')
    <div class="container" style="padding-top:50px;">
        <div class="row">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            ?>
            <page-books urlbase="{{ url('/') }}" urlbooks="{{ route('livros.bookpage') }}" search="<?php echo $search ?>">

            </page-books>
        </div>
        <modal-component
            id="modal-descricao-livro"
            title="Descrição Livro"
            action="info-livro"
            urlupdate="{{route('reservas.site','')}}"
        >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="livro" v-model="$store.state.itemModal.id">
            <div class="row">
                <div class="col-md-6">
                    <div style="width: 100%;text-align: center">
                        <img :src="'{{ url('/') }}/'+$store.state.itemModal.urlimage" style="max-height: 500px" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titulo</label>
                        <input type="text" class="form-control" v-model="$store.state.itemModal.titulo" name="titulo" placeholder="Titulo" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gênero</label>
                        <input type="text" class="form-control" v-model="$store.state.itemModal.genero" name="genero" placeholder="Gênero" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Autor</label>
                        <input type="text" class="form-control" v-model="$store.state.itemModal.autor" name="autor" placeholder="Gênero" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descrição</label>
                        <textarea class="form-control" v-model="$store.state.itemModal.descricao" name="descricao" rows="5" disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <span class="badge bg-success" v-if="$store.state.itemModal.emprestado == 0 && $store.state.itemModal.status == 'D'">Disponivel</span>
                        <span class="badge bg-danger" v-if="$store.state.itemModal.emprestado == 1">Emprestado</span>
                        <span class="badge bg-primary" v-if="$store.state.itemModal.status == 'R'">Resevado</span>

                    </div>
                </div>
            </div>
        </modal-component>
    </div>
@endsection
