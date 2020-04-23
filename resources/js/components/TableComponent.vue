<template>
    <table class="table table-striped">
        <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Nome</th>
            <th>Biografia</th>
            <th>Ação</th>
        </tr>
        <tr v-for="item in dados">
            <td>
                {{item.id}}
            </td>
            <td>
                {{item.nome}}
            </td>
            <td>
                {{item.biografia}}
            </td>
            <td>
                <div class="row" style="max-width: 300px">
                    <div class="col-md">
                        <!--<button type="button" data-toggle="modal" data-target="#modalUpdate" v-on:click="preencherItemModal(item)" class="btn btn-block btn-info">Atualizar</button>-->
                        <button type="button" class="btn btn-primary" v-on:click="preencherItemModal(item)">Atualizar</button>
                    </div>
                    <div class="col-md">
                        <button type="button" class="btn btn-block btn-danger">Deletar</button>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "TableComponent",
        props: ['dados'],
        methods:{
            preencherItemModal(item){
                this.$store.commit("setItemModal",item);

                $("#modalUpdate").modal("show");
            }
        },
        mounted() {
            //console.table(this.dados);
            //$('#myModal').modal('show');
        }
    }
</script>

