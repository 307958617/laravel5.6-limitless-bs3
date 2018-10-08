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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>DOB</th>
                <th>Status</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>21</td>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="label label-success">Active</span></td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jackelyn</td>
                <td>Weible</td>
                <td><a href="#">Airline Transport Pilot</a></td>
                <td>3 Oct 1981</td>
                <td><span class="label label-default">Inactive</span></td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Aura</td>
                <td>Hard</td>
                <td>Business Services Sales Representative</td>
                <td>19 Apr 1969</td>
                <td><span class="label label-danger">Suspended</span></td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Nathalie</td>
                <td><a href="#">Pretty</a></td>
                <td>Drywall Stripper</td>
                <td>13 Dec 1977</td>
                <td><span class="label label-info">Pending</span></td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Sharan</td>
                <td>Leland</td>
                <td>Aviation Tactical Readiness Officer</td>
                <td>30 Dec 1991</td>
                <td><span class="label label-default">Inactive</span></td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Maxine</td>
                <td><a href="#">Woldt</a></td>
                <td><a href="#">Business Services Sales Representative</a></td>
                <td>17 Oct 1987</td>
                <td><span class="label label-info">Pending</span></td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Sylvia</td>
                <td><a href="#">Mcgaughy</a></td>
                <td>Hemodialysis Technician</td>
                <td>11 Nov 1983</td>
                <td><span class="label label-danger">Suspended</span></td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Lizzee</td>
                <td><a href="#">Goodlow</a></td>
                <td>Technical Services Librarian</td>
                <td>1 Nov 1961</td>
                <td><span class="label label-danger">Suspended</span></td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Kennedy</td>
                <td>Haley</td>
                <td>Senior Marketing Designer</td>
                <td>18 Dec 1960</td>
                <td><span class="label label-success">Active</span></td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Chantal</td>
                <td><a href="#">Nailor</a></td>
                <td>Technical Services Librarian</td>
                <td>10 Jan 1980</td>
                <td><span class="label label-default">Inactive</span></td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Delma</td>
                <td>Bonds</td>
                <td>Lead Brand Manager</td>
                <td>21 Dec 1968</td>
                <td><span class="label label-info">Pending</span></td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Roland</td>
                <td>Salmos</td>
                <td><a href="#">Senior Program Developer</a></td>
                <td>5 Jun 1986</td>
                <td><span class="label label-default">Inactive</span></td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>13</td>
                <td>Coy</td>
                <td>Wollard</td>
                <td>Customer Service Operator</td>
                <td>12 Oct 1982</td>
                <td><span class="label label-success">Active</span></td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Maxwell</td>
                <td>Maben</td>
                <td>Regional Representative</td>
                <td>25 Feb 1988</td>
                <td><span class="label label-danger">Suspended</span></td>
                <td>$130,500</td>
            </tr>
            <tr>
                <td>19</td>
                <td>Cicely</td>
                <td>Sigler</td>
                <td><a href="#">Senior Research Officer</a></td>
                <td>15 Mar 1960</td>
                <td><span class="label label-info">Pending</span></td>
                <td>$159,000</td>
            </tr>
            </tbody>
        </table>

        <department_modal v-show="showAddDepartmentModel" @close="closeAddModal" @commit="addDepartment">
            <div slot="head-title">添加部门</div>
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
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>备注信息</label>
                            <input type="text" placeholder="Eugene" class="form-control">
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
                showAddDepartmentModel:false
            }
        },

        components: {
            department_modal
        },

        mounted() {
            console.log('Component mounted.');
            this.tableSetup();
            // 注册监听者
            $hub.on( 'test', ( data ) => {
                console.log( 'test', data );
            } );
        },
        methods: {
            showAddModel() {
                this.showAddDepartmentModel = true;
                console.log('showAddModel')
            },
            closeAddModal() {
                this.showAddDepartmentModel = false;
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
                            targets: 0
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
