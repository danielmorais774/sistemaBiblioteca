<template>
    <div class="modal fade" :id="idmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{title}}</h4>
                </div>
                <div class="modal-body">
                    <form v-if="urladd" ref="formnew" :action="urladd" method="post">
                        <slot></slot>
                    </form>
                    <form v-if="urlupdate" ref="formupdate" :action="urladd" method="post">
                        <slot></slot>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" v-if="urldeletar" class="btn btn-primary">Adicionar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" v-if="urladd" v-on:click="submitForm('new')" class="btn btn-primary">Adicionar</button>
                    <button type="button" v-if="urlupdate" class="btn btn-default bg-purple">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ModalComponent",
        props: ['idmodal','title','urladd','urldeletar','urlupdate'],
        methods:{
            submitForm: function (action) {
                if(action == 'update'){
                    this.$refs.formupdate.submit()
                }
                if(action == 'new'){
                    this.$refs.formnew.submit()
                }
            },
        }
    }
</script>
