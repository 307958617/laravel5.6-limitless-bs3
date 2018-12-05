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
                <form action="">
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
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import VeeValidate, { Validator } from 'vee-validate';
    //引入中文--开始
    import zh_CN from 'vee-validate/dist/locale/zh_CN'
    import VueI18n from 'vue-i18n';
    Vue.use(VueI18n);
    const i18n = new VueI18n({
        locale:'zh_CN',
    });
    Vue.use(VeeValidate,{
        i18n,
        dictionary: {
            zh_CN
        }
    });
    //引入中文--结束
    //自定义部门电话判断提示--开始
    const dict = {
        custom: {
            电话号码: {
                regex: '电话号码必须是8位或11位'
            },
            身份证号码: {
                regex: '身份证号码不正确'
            },
            部门名称: {
                isUnique: '部门名称已经存在，请更换！'
            }
        }
    };
    Validator.localize('zh_CN', dict);
    Validator.extend('unique_bm', {
        getMessage: 部门名称 => '该部门名称已经存在，请修改！',
        validate: value => !! value
    });
    Validator.extend('unique_gender', {
        getMessage: 性别类型 => '该性别类型已经存在，请修改！',
        validate: value => !! value
    });
    //自定义部门电话判断提示--结束
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
    background-color:rgba(0,0,0,0.5);
    /*设置超出可视范围就滚动*/
    overflow-y:scroll;
}
</style>