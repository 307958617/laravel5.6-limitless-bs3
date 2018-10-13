<template>
    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">部门信息列表</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <button class="btn btn-primary btn-sm pull-right" @click="showAddModel()"><i class="fa fa-plus" aria-hidden="true"></i> 新增部门 </button>
        </div>

        <table class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th>NO.</th>
                <th>部门名称</th>
                <th>上级部门</th>
                <th>部门主管</th>
                <th>部门电话</th>
                <th>备注信息</th>
                <th>当前状态</th>
                <th>操 作</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="department in departments">
                    <td>{{ department.order }}</td> <!-- 默认排序为order字段，datatable必须将order放到第一列才行 -->
                    <td>{{ department.name }}</td>
                    <td>{{ department.pid }}</td>
                    <td>{{ department.manager }}</td>
                    <td>{{ department.phone }}</td>
                    <td>{{ department.remarks }}</td>
                    <td><span :class="[department.status==='已启用'? 'label label-success' : 'label label-danger']">{{ department.status }}</span></td>
                    <td>
                        <button class="edit btn btn-xxs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 修改</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <department_modal v-show="showAddDepartmentModel" @close="closeAddModal" @commit="addDepartment">
            <div slot="head-title">新增部门</div>
            <div slot="body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>选择上级部门</label>
                            <input type="text" placeholder="Eugene" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>部门名称</label>
                            <input type="text" placeholder="Kopyov" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>部门主管</label>
                            <input type="text" placeholder="Eugene" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>部门电话</label>
                            <input type="text" placeholder="Kopyov" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>排序NO.</label>
                            <input type="text" placeholder="Eugene" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>启用标志</label>
                            <input type="text" placeholder="Kopyov" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>备注信息</label>
                            <input type="text" placeholder="Eugene" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div slot="footer-commit-text">添 加</div>
        </department_modal>
    </div>
    <!-- /column selectors -->
</template>

<script>
    import $hub from 'hub-js'
    import department_modal from './Modal_form_vertical.vue'
    export default {
        data() {
            return {
                showAddDepartmentModel:false,
                departments:[],
            }
        },

        components: {
            department_modal
        },

        mounted() {
            this.$nextTick(function() {
                this.getDepartments().then((response) => {
                    // do what you need to do
                    this.departments = response.data
                }).then(() => {
                    // execute the call to render the table, now that you have the data you need
                    this.tableSetup();
                })
            });


            // 注册监听者
            $hub.on( 'test', ( data ) => {
                console.log( 'test', data );
            } );
        },
        methods: {
            getDepartments() {
               return axios.get('/departments/get')
            },
            showAddModel() {
                this.showAddDepartmentModel = true;
                //模态框弹出的时候禁止底层body滚动
                $('body').css('overflow','hidden');
                console.log('showAddModel')
            },
            closeAddModal() {
                this.showAddDepartmentModel = false;
                //模态框关闭的时候启用body滚动
                $('body').css('overflow','auto');
            },
            addDepartment() {
                console.log('add Department')
            },
            tableSetup() {
                $(function () {
                    // Setting datatable defaults
                    $.extend( $.fn.dataTable.defaults, {
                        autoWidth: false,
                        colReorder: true,
                        rowReorder: true,
                        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                        language: {
                            search: '<span>Filter:</span> _INPUT_',
                            searchPlaceholder: 'Type to filter...',
                            info: "第 _PAGE_ 页 / 总 _PAGES_ 页，共 _TOTAL_ 条数据",
                            sInfoFiltered: "(从 _MAX_ 条记录中过滤)",
                            zeroRecords: "没有找到记录",
                            infoEmpty: "无记录",
                            lengthMenu: '<span>Show:</span> _MENU_',
                            select: { rows:" , %d 条记录被选中" },
                            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                        }
                    });
                    // Column selectors
                    let t = $('.datatable-button-html5-columns').DataTable({
                        buttons: {
                            buttons: [
                                {
                                    extend: 'copyHtml5',
                                    className: 'btn btn-default',
                                    exportOptions: {
                                        columns: [ 0, ':visible' ]
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    className: 'btn btn-default',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    className: 'btn btn-default',
                                    exportOptions: {
                                        columns: [0, 1, 2, 5]
                                    }
                                },
                                {
                                    extend: 'colvis',
                                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                                    className: 'btn bg-blue btn-icon'
                                }
                            ]
                        },
                        select: true,
                        columnDefs: [{
                            orderable: false,//不允许排序
                            targets: [0,7]
                        }],
                    });
                    //添加索引列,注意：如果要使拖拽排序看起来比较正常，那么必须让索引列这一栏生成递增的数据，即<td></td>中间必须生成数字
                    t.on('order.dt search.dt',
                        function() {
                            t.column(0, {
                                search: 'applied',
                                order: 'applied'
                            }).nodes().each(function(cell, i) {
                                cell.innerHTML = i + 1;
                            });
                        }).draw();

                    // Enable Select2 select for the length option
                    $('.dataTables_length select').select2({
                        minimumResultsForSearch: Infinity,
                        width: 'auto'
                    });
                });
            }
        }
    }
</script>
