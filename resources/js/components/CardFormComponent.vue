<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{titulo}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="POST" :action="urladd">
            <input type="hidden" name="_token" :value="token">
            <div class="card-body">
                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" placeholder="">
                </div>
                <div class="form-group">
                    <label style="width: 100%">Livro</label>
                    <input style="display:inline; width: auto" type="text" class="form-control" id="livro" name="livro" placeholder="">
                    <button style="display: inline; width: auto;margin-top:-5px" type="button" class="btn btn-block btn-default" v-on:click="defineBusca()">Buscar</button>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer" style="text-align: right">
                <button type="submit" class="btn btn-primary">Devolver</button>
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        name: "CardFormComponent",
        props:['titulo','urladd','token'],
        methods:{
            defineBusca(){
                var livro = $('#livro').val();
                this.$store.commit('setValueBuscaLivro',livro);
            }
        }
    }
</script>
