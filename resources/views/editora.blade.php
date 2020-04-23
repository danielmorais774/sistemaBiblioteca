@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editoras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Editoras</li>
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
                            <table-component url="{{ url('/') }}" v-bind:colunas="['Nome','Endereço','Telefone','Email','Ação']" urlapi="{{ route('editoras.infoall') }}" urlitemid="{{ route('editoras.index') }}"></table-component>
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
        urladd = "{{route('editoras.store')}}"
    >
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Nome da Editora</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Endereço</label>
            <input type="text" class="form-control" name="endereco" placeholder="Endereço">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telefone</label>
            <input type="text" class="form-control" name="telefone" placeholder="Telefone">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cidade</label>
            <input type="text" class="form-control" name="cidade" placeholder="Cidade">
        </div>
    </modal-component>

    <!--- update --->

    <modal-component
        id="modal-update"
        title="Atualizar Editora"
        urlupdate = "{{route('editoras.update','')}}"
        urldelete = "{{route('editoras.destroy','')}}"
        action="editar"
    >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" v-model="$store.state.itemModal.id">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome da Editora</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Endereço</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.endereco" name="endereco" placeholder="Endereço">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telefone</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.telefone" name="telefone" placeholder="Telefone">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" v-model="$store.state.itemModal.email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cidade</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.cidade" name="cidade" placeholder="Cidade">
        </div>
    </modal-component>


@endsection
