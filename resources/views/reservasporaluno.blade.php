@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reservar por aluno</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item"><a>Reserva</a></li>
                        <li class="breadcrumb-item active">Listar Reservas por Aluno</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row" style="margin: 10px">
        <div class="col-md-4">
            <div class="container-fluid">
                <card-busca></card-busca>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Resultados</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div style="text-align: center;width: 100%" v-if="!this.$store.state.valueBuscaMatricula">
                        <h4 style="font-size: 14px;padding: 10px">Sem resultados</h4>
                    </div>
                    <table-busca :colunas="['Titulo','cod-livro','Editora','Ação']" urlapi="{{ route('reservas.api','') }}" urldelete="{{ route('reservasaluno.destroy','') }}"></table-busca>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
