<template>
    <div class="col-md-2">
        <div class="card card-livro" v-on:click="descricaoLivro()">
            <img :src="urlimage" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{titulo}}</h5>
                <p class="card-text">{{autor}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CardPageBookComponent",
        props: ['titulo','autor','urlimage','id','urlapi'],
        methods:{
            descricaoLivro: function () {
                axios.get(this.urlapi + 'id/' + this.id).then(res => {
                    this.$store.commit('setItemModal', res.data);
                });
                $('#modal-descricao-livro').modal("show");
            },
        },
    }
</script>
