<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Aluno</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div style="padding:10px">
            <div class="form-group">
                <label>Matricula</label>
                <input type="text" id="fieldMatricula" class="form-control" name="matricula" placeholder="Matricula">
            </div>
        </div>

        <div class="card-footer" style="text-align: right">
            <button type="button" class="btn btn-primary" v-on:click="defineBusca()">Buscar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CardBuscaComponent",
        methods:{
            defineBusca(){
                var matricula = $('#fieldMatricula').val();
                this.$store.commit('setValueBuscaMatricula',matricula);
            }
        },
    }
</script>
