<template>
    <div class="table-responsive">
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
                    <span v-if="name != 'id'">{{value | formataData(name)}}</span>
                </td>
                <!--<td v-for="itenarray in Object.values(item)">
                    {{}}
                </td>-->
                <td>
                    <button type="button" class="btn btn-primary" v-on:click="editarSlider(item.id)">Detalhes</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "TableComponent",
        props : ['urlapi','url','urlset','type','urlitemid','colunas'],
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

        },
        computed:{
            lista:function () {
                axios.get(this.urlapi).then(res => {
                    //this.info = res.data;
                    this.info = Object.values(res.data);
                    //console.table(Object.values(dados));
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
                    if(str == 1){
                        return 'Devolvido';
                    }else if(str == 0){
                        return 'Não Devolvido'
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

