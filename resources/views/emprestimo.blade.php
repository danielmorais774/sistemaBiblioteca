@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Emprestimos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Realizar Emprestimos</li>
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
                            <table-component url="{{ url('/') }}" v-bind:colunas="['Matricula','Titulo','Telefone do aluno','Status','Ação']" urlapi="{{ route('emprestimos.infoall') }}" urlitemid="{{ route('emprestimos.index') }}"></table-component>
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
        title="Adicionar Emprestimo"
        action="new"
        urladd = "{{route('emprestimos.store')}}"
    >
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Matricula</label>
            <input type="text" class="form-control" name="matricula" placeholder="Matricula">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">codigo Livro</label>
            <input type="text" class="form-control" name="livro" placeholder="Codigo livro">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prazo</label>
            <input type="date" class="form-control" name="prazo">
        </div>
    </modal-component>

    <!--- update --->

    <modal-component
        id="modal-update"
        title="Atualizar Emprestimo"
        urlupdate = "{{route('emprestimos.update','')}}"
        urldelete = "{{route('emprestimos.destroy','')}}"
        action="editar"
    >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" v-model="$store.state.itemModal.id">
        <div class="form-group">
            <label for="exampleInputEmail1">Matricula</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.matricula" name="matricula" placeholder="Matricula">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">codigo Livro</label>
            <input type="text" class="form-control" v-model="$store.state.itemModal.livro_id" name="livro" placeholder="Codigo livro">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prazo</label>
            <input type="date" class="form-control" v-model="$store.state.itemModal.prazo" name="prazo">
        </div>
    </modal-component>


@endsection
