<template>
    <!-- Modal -->
    <div>
    <div class="modal fade" v-bind:id="id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div :class="('modal-dialog') + (this.action == 'info-livro')?'modal-dialog modal-xl modal-dialog-centered':'modal-dialog modal-dialog'" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form ref="formnew" v-if="action == 'new'" method="post" :action="urladd" enctype="multipart/form-data">
                        <slot></slot>
                    </form>

                    <form ref="formupdate" v-if="action == 'editar'" method="post" :action="urlupdate + '/' + this.$store.state.itemModal.id" enctype="multipart/form-data">
                        <slot></slot>
                    </form>

                    <form ref="formreservar" v-if="action == 'info-livro'" method="post" :action="urlupdate + '/' + this.$store.state.itemModal.id" enctype="multipart/form-data">
                        <slot></slot>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button v-if="action == 'editar'" type="button" class="btn btn-danger" v-on:click="deleteItem()" >Deletar</button>
                    <button v-if="action == 'editar'" type="button" class="btn btn-primary" v-on:click="submitForm('update')" >Atualizar</button>
                    <button v-if="action == 'new'" type="button" class="btn btn-primary" v-on:click="submitForm('new')" >Adicionar</button>
                    <button v-if="action == 'info-livro' && this.$store.state.itemModal.status == 'D'" type="button" class="btn btn-primary" v-on:click="submitForm('reservar')" >Reservar</button>
                    <button v-if="action == 'info-livro' && this.$store.state.itemModal.status == 'R'" type="button" class="btn btn-danger" v-on:click="cancelarReserva()" >Cancelar Reserva</button>
                </div>
            </div>
        </div>
    </div>
        <modal-delete-component :urldelete="urldelete" :iditem="$store.state.itemModal.id"></modal-delete-component>
    </div>
</template>

<script>
    import ModalDelete from './ModalDeleteComponent.vue';
    export default {
        name: "ModalComponent",
        props: ['id','title','action','url','urlapi','token','urladd','urlupdate','urldelete','urlcancelar'],
        data: function(){
            return {
                info: '',
                result: '',

            }
        },
        methods:{
            submitForm: function (action) {
                if(action == 'update'){
                    this.$refs.formupdate.submit()
                }
                if(action == 'new'){
                    this.$refs.formnew.submit()
                }
                if(action == 'reservar'){
                    this.$refs.formreservar.submit()
                }
            },
            deleteItem: function(){
                axios.delete(this.urldelete + '/' + this.$store.state.itemModal.id).then(res => {
                    this.result = res.data;
                    if(res.data == 1){
                        //console.log('asd');
                        var n = new Noty({
                            type: 'success',
                            timeout: 1500,
                            theme: 'sunset',
                            closeWith: ['click', 'button'],
                            text: 'Cancelado com sucesso!!',
                            layout: 'topCenter'
                        });
                        n.show();
                    }
                });

                $("#modal-update").modal("hide");
                //$("#modal-delete-confir").modal('show');
            },
            cancelarReserva: function () {
                axios.delete(this.urlcancelar + '/' + this.$store.state.itemModal.id).then(res => {
                    this.result = res.data;
                    if(res.data == 1){
                        //console.log('asd');
                        var n = new Noty({
                            type: 'success',
                            timeout: 1500,
                            theme: 'sunset',
                            closeWith: ['click', 'button'],
                            text: 'Cancelado com sucesso!!',
                            layout: 'topCenter'
                        });
                        n.show();
                    }
                });

                $("#modal-descricao-livro").modal("hide");
            }
        },
        components: {
            ModalDeleteComponent: ModalDelete,
        },
        /*computed:{
            preencherCampo: function () {
                //alert(this.urlapi + '/' + 8);
                /*axios.get(this.urlapi + '/' + this.$store.state.id).then(res => {
                    this.info = res.data;
                });
                //this.$store.commit('setItemModal',this.info);

            }
        },*/
        mounted() {
            //$("input[name='icon']").val(this.info.icon);
            //console.log(this.urldelete);
        }
    }
</script>
