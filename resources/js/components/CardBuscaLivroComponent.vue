<template>
    <div class="card card-default" v-if="this.$store.state.valueBuscaLivro">
        <div class="card-header">
            <h3 class="card-title">Informações do Livro</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" v-if="infoLivro">
            <div class="card-body">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" v-model="info.titulo" id="titulo" name="titulo" disabled>
                </div>
                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <input type="text" class="form-control" v-model="info.genero" id="genero" disabled>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" v-model="info.nome_autor" id="autor" disabled>
                </div>
                <div class="form-group">
                    <label for="editora">Editora</label>
                    <input type="text" class="form-control" v-model="info.nome_editora" id="editora" disabled>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao" v-model="info.descricao" rows="3" disabled></textarea>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "CardBuscaLivroComponent",
        props:['urlapi'],
        data: function(){
            return {
                info: [],
            }
        },
        computed:{
            infoLivro:function () {
                axios.get(this.urlapi+'/'+this.$store.state.valueBuscaLivro).then(res => {
                    //this.info = res.data;
                    this.info = res.data;
                    //console.table(this.info.titulo);
                });
                return this.info;
            }
        },
    }
</script>

<style scoped>

</style>
