<template>
    <div style="width:100%">
        <div class="row">
            <card-book v-for="item in lista" :titulo="item.titulo_livro" :autor="item.nome_autor" :urlimage="urlbase + '/'+item.urlimage" :id="item.id" :urlapi="urlbookid"></card-book>
            <div v-if="this.info.length == 0" style="width: 100%;text-align: center"><p>Sem reservas!!</p></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageBooksComponent",
        props: ['urlbase','urlbooks','search','urlbookid'],
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

