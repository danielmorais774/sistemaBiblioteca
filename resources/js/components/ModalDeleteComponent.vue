<template>
    <!-- Modal -->
    <div class="modal fade" id="modal-delete-confir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deixa deletar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-danger" >Não</button>
                    <button type="button" class="btn btn-primary" v-on:click="deleteItem()">Sim</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "ModalDeleteComponent",
        props: {
            urldelete: {
                type: String,
                // default: 'Lucas'
            },
            iditem: {
                required: true
                // default: 'Lucas'
            }
        },
        data: function(){
            return {
                info: '',
                result: ''
            }
        },
        methods:{
            deleteItem: function(){
                console.log(this.urldelete);
                /*axios.delete(this.urldelete + '/' + this.iditem).then(res => {
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
                });*/
                $("#modal-delete-confir").modal('hide');
            },
        }
    }
</script>
