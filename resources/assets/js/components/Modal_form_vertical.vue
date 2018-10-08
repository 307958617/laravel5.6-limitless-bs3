<template>
    <div class="modal-backdrop">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" @click="close">&times;</button>

                    <h5 class="modal-title">
                        <slot name="head-title">Disable backdrop</slot>
                    </h5>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <h6 class="text-semibold">Text in a modal</h6>
                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                        <hr>

                        <h6 class="text-semibold">Another paragraph</h6>
                    </slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal" @click="close">
                        <slot name="footer-close-text">关 闭</slot>
                    </button>
                    <button type="button" class="btn btn-primary" @click="commit">
                        <slot name="footer-commit-text">保 存</slot>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            close: function () {
                this.$emit('close');
            },
            commit: function () {
                this.$emit('commit');
            }
        }
    }
</script>
<style scoped>
.modal-backdrop {
    background-color:rgba(0,0,0,0.5)
}
</style>