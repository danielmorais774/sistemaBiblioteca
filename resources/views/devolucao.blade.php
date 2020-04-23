@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Devolver Livro</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Devolver Livro</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row" style="margin: 3px;">
            <div class="col-md-6">
                <div class="container-fluid">
                    <card-form titulo="Devolver" urladd="{{ route('devolucoes.store') }}" token="{{ csrf_token() }}">

                    </card-form>
                </div>
            </div>
            <div class="col-md-4">
                <card-busca-livro urlapi="{{ route('devolucoes.apibylivro','') }}"></card-busca-livro>
            </div>
        </div>
    </section>

@endsection
