@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exemplares</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Exemplares</li>
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
                            <table-component url="{{ url('/') }}" v-bind:colunas="['Titulo','Autor','Gênero','Ação']" urlapi="{{ route('exemplares.infoall') }}" urlitemid="{{ route('exemplares.index') }}"></table-component>
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
        title="Adicionar Editora"
        action="new"
        urladd = "{{route('exemplares.store')}}"
    >
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gênero</label>
            <input type="text" class="form-control" name="genero" placeholder="Gênero">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <select class="form-control" name="autor">
                <option></option>
                <?php
                foreach ($listaAutores as $item):
                ?>
                <option value="<?php echo $item->id  ?>"><?php echo $item->nome  ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"></textarea>
        </div>

    </modal-component>

    <!--- update --->

    <modal-component
        id="modal-update"
        title="Atualizar Editora"
        urlupdate = "{{route('exemplares.update','')}}"
        urldelete = "{{route('exemplares.destroy','')}}"
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
            <label for="exampleInputPassword1">Gênero</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.genero" name="genero" placeholder="Gênero">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <select class="form-control" v-model="$store.state.itemModal.autor_id" name="autor">
                <?php
                foreach ($listaAutores as $item):
                ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->nome  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea class="form-control" v-model="$store.state.itemModal.descricao" name="descricao" rows="5"></textarea>
        </div>
    </modal-component>


@endsection
