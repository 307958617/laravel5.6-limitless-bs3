<template>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading p-5">
                    <h5 class="panel-title text-center">Name</h5>
                </div>

                <div class="panel-body p-5">
                    <input type="text" class="form-control input-sm" placeholder="Search...">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading p-5">
                    <h5 class="panel-title text-center">CreatedAt</h5>
                </div>

                <div class="panel-body p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <vue-datepicker-local placeholder="开始时间" v-model="search.startTime" @input="searchAndFilterData" clearable format="YYYY-MM-DD HH:mm:ss" />
                        </div>
                        <div class="col-md-6">
                            <vue-datepicker-local placeholder="结束时间" v-model="search.endTime" @input="searchAndFilterData" clearable format="YYYY-MM-DD HH:mm:ss" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading p-5">
                    <h5 class="panel-title text-center">Name</h5>
                </div>

                <div class="panel-body p-5">
                    <input type="text" class="form-control input-sm" placeholder="Search...">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading p-5">
                    <h5 class="panel-title text-center">Name</h5>
                </div>

                <div class="panel-body p-5">
                    <input type="text" class="form-control input-sm" placeholder="Search...">
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import VueDatepickerLocal from 'vue-datepicker-local'

    export default {
        components: {
            VueDatepickerLocal
        },
        data () {
            return {
                search:{
                    name:'',
                    startTime: '',
                    endTime:''
                },
            }
        },
        methods: {
            searchAndFilterData() {
                console.log('change');
                if(this.search.startTime !== '' && this.search.endTime !== '' && this.search.startTime > this.search.endTime) {
                    console.log('不行啊，时间选择不对啊')
                }
            }
        }
    }
</script>

<style>
    .panel {
        border-top-color: #4CAF50;
    }
    .datepicker-popup a {
        color: #000;
    }.calendar-date-out.calendar-date {
             color: #cccccc;
    }
    .datepicker>input {
        padding: 0 34px 0 6px !important;
    }
    .heading-elements:not(.visible-elements) .heading-form .form-control {
        width: 100%;
    }
</style>