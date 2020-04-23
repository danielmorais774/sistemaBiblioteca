@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Livros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Cadastrar Livros</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <button type="button" class="btn btn-block btn-default bg-blue" style="width: auto;display: inline-block;margin-top: 0px" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> <span style="font-weight: bold">ADICIONAR</span></button>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table-component url="{{ url('/') }}" v-bind:colunas="['Titulo','Genero','Autor','Editora','Exemplar','Ação']" urlapi="{{ route('livros.infoall') }}" urlitemid="{{ route('livros.index') }}"></table-component>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <!--- ADD --->

    <modal-component
        id="modalAdd"
        title="Adicionar Livro"
        action="new"
        urladd = "{{route('livros.store')}}"
    >
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Editora</label>
            <select class="form-control" name="editora">
                <option></option>
                <?php
                foreach ($listaEditora as $item):
                ?>
                <option value="<?php echo $item->id  ?>"><?php echo $item->nome  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Exemplar</label>
            <select class="form-control" name="exemplar">
                <option></option>
                <?php
                foreach ($listaExemplar as $item):
                ?>
                <option value="<?php echo $item->id  ?>"><?php echo $item->titulo  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <input type="file" name="imgLivro">
        </div>
    </modal-component>

    <!--- update --->

    <modal-component
        id="modal-update"
        title="Atualizar Livro"
        urlupdate = "{{route('livros.update','')}}"
        urldelete = "{{route('livros.destroy','')}}"
        action="editar"
    >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" v-model="$store.state.itemModal.id">
        <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.titulo" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Editora</label>
            <select class="form-control" v-model="$store.state.itemModal.editora_id" name="editora">
                <?php
                foreach ($listaEditora as $item):
                ?>
                <option value="<?php echo $item->id  ?>"><?php echo $item->nome  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Exemplar</label>
            <select class="form-control" v-model="$store.state.itemModal.exemplar_id" name="exemplar">
                <?php
                foreach ($listaExemplar as $item):
                ?>
                <option value="<?php echo $item->id  ?>"><?php echo $item->titulo  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <input type="file" name="imgLivro">
        </div>
    </modal-component>


@endsection
