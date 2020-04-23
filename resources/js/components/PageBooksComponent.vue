<template>
    <div style="width:100%">
        <div class="card" style="margin:0px;margin-bottom:20px">
            <div class="card-body">
                <div class="form-group" style="margin-bottom:0px">
                    <form action="" method="get" style="margin-bottom:0px">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Pesquisar" style="display: inline;width:30%">
                        <button type="submit" class="btn btn-link" v-on:click="pesquisar()" style="display: inline;"><i class="fas fa-search" style="font-size: 18px;height: 100%;margin-bottom: 5px;color: #908c8c;"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <card-book v-for="item in lista" :titulo="item.titulo_livro" :autor="item.nome_autor" :urlimage="urlbase + '/'+item.urlimage" :id="item.id" :urlapi="urlbooks"></card-book>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageBooksComponent",
        props: ['urlbase','urlbooks','search'],
        data: function(){
            return {
                info: [],
            }
        },
        methods:{
            pesquisar: function () {
                //valueBuscaLivro
                var pesquisa = $('#search').val();
                //this.$store.commit('setValueBuscaLivro',pesquisa);
            },
            descricaoLivro: function () {
                axios.get(this.urlitemid + '/' + id).then(res => {
                    this.$store.commit('setItemModal', res.data);
                });
                $('#modal-descricao-livro').modal("show");
            },
            carregarInfo: function (id) {
                //alert(this.urlapi + '/' + 8);
                //alert(this.urlitemid + '/' + idSlider);

                //this.$store.commit('setItemModal',this.info);
                //this.$store.commit('setId',idSlider);
                //$('#modalUpdate').removeClass('fade');
                // $('#modalUpdate').css('display','block');
                $("#modal-update").modal("show");


            },
        },
        computed:{
            lista:function () {
                if(this.search != '') {
                    axios.get(this.urlbooks + '/' + this.search).then(res => {
                        //this.info = res.data;
                        this.info = res.data;
                        //console.table(Object.values(dados));
                    });
                    return this.info;
                }else{
                    axios.get(this.urlbooks).then(res => {
                        //this.info = res.data;
                        this.info = res.data;
                        //console.table(Object.values(dados));
                    });
                    return this.info;
                }
            }
        },
    }
</script>

