<template>
    <div class="table-responsive" v-if="this.$store.state.valueBuscaMatricula">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th style="width: 10px">#</th>
                <th v-for="(titulo) in colunas">{{titulo}}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in lista">
                <td v-for="(value, name) in item">
                    <span v-if="name == 'id'" v-on:click="editarSlider(item.id)">{{item.id}}</span>
                    <span v-if="name != 'id'">{{value}}</span>
                </td>
                <!--<td v-for="itenarray in Object.values(item)">
                    {{}}
                </td>-->
                <td>
                    <button type="button" class="btn btn-danger" v-on:click="cancelarReserva(item.id)">Cancelar Reserva</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "TableComponent",
        props : ['urlapi','url','urlset','type','urlitemid','colunas','urldelete'],
        data: function(){
            return {
                info: [],
                result: [],
                auxUrl : '',
            }
        },
        methods:{
            editarSlider: function (id) {
                //alert(this.urlapi + '/' + 8);
                //alert(this.urlitemid + '/' + idSlider);
                axios.get(this.urlitemid + '/' + id).then(res => {
                    this.$store.commit('setItemModal',res.data);
                });
                //this.$store.commit('setItemModal',this.info);
                //this.$store.commit('setId',idSlider);
                //$('#modalUpdate').removeClass('fade');
               // $('#modalUpdate').css('display','block');
                $("#modal-update").modal("show");

            },
            cancelarReserva: function (id) {
                axios.delete(this.urldelete + '/' + id).then(res => {
                    this.result = res.data;
                    if(res.data == 1){
                        console.log('asd');
                        var n = new Noty({
                            type: 'success',
                            timeout: 1500,
                            theme: 'sunset',
                            closeWith: ['click', 'button'],
                            text: 'Deletado com sucesso!!',
                            layout: 'topCenter'
                        });
                        n.show();
                    }
                });
            }

        },
        computed:{
            lista:function () {
                axios.get(this.urlapi+'/'+this.$store.state.valueBuscaMatricula).then(res => {
                    //this.info = res.data;
                    this.info = Object.values(res.data);
                });
                return this.info;
            }
        },
        filters:{
            formataData: function(str,name){

                if(name == 'data_emprestimo'){
                    //return 'ad';
                }
                if(name == 'telefone'){
                    var num = str;
                    str=str.replace(/^(d{2})(d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                    str=str.replace(/(d)(d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
                    return str;
                }

                if(name == 'emprestado'){
                    if(str == 0){
                        return 'Disponivel';
                    }else{
                        return 'Emprestado'
                    }
                }

                if(name == 'status'){
                    if(str == 'D'){
                        return 'Não';
                    }else if(str == 'R'){
                        return 'Sim'
                    }
                }

                var size = 70;
                if (str==undefined || str=='undefined' || str =='' || size==undefined || size=='undefined' || size ==''){
                    return str;
                }

                var shortText = str;
                if(str.length >= size+3){
                    shortText = str.substring(0, size).concat('...');
                }
                return shortText;
            },
            formatInfo: function () {

            }
        },
        mounted() {

        }
    }
</script>

