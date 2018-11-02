<template>
    <!-- Column selectors -->
    <div>
        <table class="table datatable-department">
            <thead>
            <tr>
                <th>NO.</th>
                <th>描 述</th>
                <th>顺序号</th>
                <th>是否为初值</th>
                <th>当前状态</th>
                <th>备注信息</th>
                <th>创建时间</th>
                <th>操 作</th>
            </tr>
            </thead>
            <!--这里需要特别注意！！！，@click事件必须放到tbody上面，如果放到tr上，那么新增加的行的点击事件将不会被触发-->
            <tbody @click="showEditModel($event)">
                <tr v-for="gen in gender">
                    <td>{{ gen.order?gen.order:'0' }}</td> <!-- 默认排序为order字段，datatable必须将order放到第一列才行 -->
                    <td>{{ gen.description }}</td><!-- 上级部门的id -->
                    <td>{{ gen.order }}</td>
                    <td><span :class="[gen.isFirst==='T'? 'label label-success' : 'label label-danger']">{{ gen.isFirst==='T'?'是':'否' }}</span></td>
                    <td><span :class="[gen.status==='T'? 'label label-success' : 'label label-danger']">{{ gen.status==='T'?'已启用':'未启用' }}</span></td>
                    <td>{{ gen.remarks }}</td>
                    <td>{{ gen.created_at }}</td>
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
                            <label>部门名称 <span class="text-danger">*</span></label>
                            <input type="text" @input="checkName"  v-model="newDepartment.name" placeholder="新部门的名称" :class="{'form-control': true, 'is-invalid': errors.has('部门名称') }" v-validate="'required|min:2|unique'" name="部门名称">
                            <div v-show="errors.has('部门名称')" class="text-danger">{{ errors.first('部门名称') }}</div>
                        </div>

                        <div class="col-sm-6">
                            <label>选择上级部门</label>
                            <!--这里引入了'@riophae/vue-treeselect'插件，具体用法参加GitHub-->
                            <treeselect @open="reloadOptions" v-model="newDepartment.pid" placeholder="选择上级科室,不选默认为顶级科室" :normalizer="normalizer" :options="treeselectLists"></treeselect>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>部门主管 <span class="text-danger">*</span></label>
                            <input type="text" v-model="newDepartment.manager" placeholder="部门主管" :class="{'form-control': true, 'is-invalid': errors.has('部门主管') }" v-validate="'required|min:2'" name="部门主管">
                            <div v-show="errors.has('部门主管')" class="text-danger">{{ errors.first('部门主管') }}</div>
                        </div>

                        <div class="col-sm-6">
                            <label>部门电话 <span class="text-danger">*</span></label>
                            <input type="text" v-model="newDepartment.phone" placeholder="部门电话8位或11位" :class="{'form-control': true, 'is-invalid': errors.has('部门电话') }" v-validate="{required:true,numeric:true,regex: /^(\d{8}|\d{11})$/}" name="部门电话">
                            <div v-show="errors.has('部门电话')" class="text-danger">{{ errors.first('部门电话') }}</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>排序NO.</label>
                            <input type="text" v-model="newDepartment.order" placeholder="数值越大排名越靠前,默认为0" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>启用标志</label>
                            <!--<input type="text" v-model="newDepartment.status" placeholder="" class="form-control">-->
                            <div>
                                <toggle-button @change="changeStatus" :sync="true" :v-model="newDepartment.status" :value="newDepartment.status==='T'" :width="140" :height="34" :labels="{checked: '当前处于启用状态', unchecked: '当前处于停用状态'}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>备注信息</label>
                            <input type="text" v-model="newDepartment.remarks" placeholder="备注信息" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div slot="footer-commit-text">添 加</div>
        </department_modal>

        <department_modal v-show="showEditDepartmentModel" @close="closeEditModal" @commit="editDepartment">
            <div slot="head-title">编辑部门</div>
            <div slot="body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>部门名称 <span class="text-danger">*</span></label>
                            <input type="text" @input="checkName"  v-model="newDepartment.name" placeholder="新部门的名称" :class="{'form-control': true, 'is-invalid': errors.has('部门名称') }" v-validate="'required|min:2|unique'" name="部门名称">
                            <div v-show="errors.has('部门名称')" class="text-danger">{{ errors.first('部门名称') }}</div>
                        </div>

                        <div class="col-sm-6">
                            <label>选择上级部门</label>
                            <!--这里引入了'@riophae/vue-treeselect'插件，具体用法参加GitHub-->
                            <treeselect @open="reloadOptions" v-model="newDepartment.pid" placeholder="选择上级科室,不选默认为顶级科室" :normalizer="normalizer" :options="treeselectLists"></treeselect>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>部门主管 <span class="text-danger">*</span></label>
                            <input type="text" v-model="newDepartment.manager" placeholder="部门主管" :class="{'form-control': true, 'is-invalid': errors.has('部门主管') }" v-validate="'required|min:2'" name="部门主管">
                            <div v-show="errors.has('部门主管')" class="text-danger">{{ errors.first('部门主管') }}</div>
                        </div>

                        <div class="col-sm-6">
                            <label>部门电话 <span class="text-danger">*</span></label>
                            <input type="text" v-model="newDepartment.phone" placeholder="部门电话8位或11位" :class="{'form-control': true, 'is-invalid': errors.has('部门电话') }" v-validate="{required:true,numeric:true,regex: /^(\d{8}|\d{11})$/}" name="部门电话">
                            <div v-show="errors.has('部门电话')" class="text-danger">{{ errors.first('部门电话') }}</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>排序NO.</label>
                            <input type="text" v-model="newDepartment.order" placeholder="数值越大排名越靠前,默认为0" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>启用标志</label>
                            <!--<input type="text" v-model="newDepartment.status" placeholder="" class="form-control">-->
                            <div>
                                <toggle-button @change="changeStatus" :sync="true" :v-model="newDepartment.status" :value="newDepartment.status==='T'" :width="140" :height="34" :labels="{checked: '当前处于启用状态', unchecked: '当前处于停用状态'}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>备注信息</label>
                            <input type="text" v-model="newDepartment.remarks" placeholder="备注信息" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div slot="footer-commit-text">修 改</div>
        </department_modal>
        <!--引入‘vue-snotify’插件，用于显示提示消息，比如成功添加，删除确认等提示-->
        <vue-snotify></vue-snotify>
    </div>
    <!-- /column selectors -->
</template>

<script>
    import Vue from 'vue'
    import ToggleButton from 'vue-js-toggle-button'
    //引入vue-treeselect
    import Treeselect from '@riophae/vue-treeselect'
    //引入vue-treeselect的样式
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'
    import moment from 'moment'
    import $hub from 'hub-js'
    import department_modal from './Modal_form_vertical.vue'
    Vue.use(ToggleButton);
    export default {
        data() {
            return {
                showAddDepartmentModel:false,
                showEditDepartmentModel:false,
                gender:[],
                treeselectLists:[],//所有的节点
                //注意，这里必须要用自定义，不然显示不出来的
                normalizer(node) {
                    return {
                        id: node.id,//指定id是什么字段
                        label: node.name,//指定label是用的什么字段，即显示什么字段出来
                    }
                },
                selectedRow:{},//当前选中的行
                isEditDepartmentName:'',
                newDepartment: {
                    name:'',
                    pid:null,
                    manager:'',
                    phone:'',
                    order:null,
                    created_at:'',
                    status:'T',
                    remarks:''
                },
            }
        },

        components: {
            department_modal,
            Treeselect,
        },

        mounted() {
            this.$nextTick(function() {
                this.getGender().then((response) => {
                    // do what you need to do
                    this.gender = response.data;
                    console.log(response.data)
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
            getGender() {
               return axios.get('/system_code/get/gender')
            },
            showAddModel() {
                //模态框重新显示之前，清空所有的验证提示消息。
                this.errors.clear();
                this.showAddDepartmentModel = true;
                //模态框弹出的时候禁止底层body滚动
                $('body').css('overflow','hidden');
                console.log('showAddModel')
            },
            closeAddModal() {
                this.showAddDepartmentModel = false;
                //模态框关闭的时候清空表中的数据为初始值
                this.newDepartment = {
                    name:'',
                    pid:null,
                    manager:'',
                    phone:'',
                    order:null,
                    status:'T',
                    remarks:''
                };
                //模态框关闭的时候启用body滚动
                $('body').css('overflow','auto');
            },
            showEditModel(e) {
                let buttonClass = $(e.target).get(0).className;
                if(buttonClass.indexOf('edit') !== -1) {
                    this.showEditDepartmentModel = true;
                    this.reloadOptions();
                    $('body').css('overflow','hidden');
                    let table = $('.datatable-department').DataTable();
                    let tr = $(e.target.closest('tr'));
                    let row = table.row(tr.get(0));
                    this.selectedRow = row;
                    let data = row.data();
                    this.newDepartment.name = data['2'];
                    this.newDepartment.manager = data['4'];
                    this.newDepartment.phone = data['5'];
                    this.newDepartment.remarks = data['6']!=='/'?data['6']:'';
                    this.newDepartment.order = data['7']===0?'':data['7'];
                    this.newDepartment.created_at = data['8'];
                    this.newDepartment.status = data['9'] === '<span class="label label-success">已启用</span>'?'T':'F';
                    this.newDepartment.pid = data['1']?data['1']:null;
                    //记录打开编辑窗口时的科室名称
                    this.isEditDepartmentName = this.newDepartment.name;
                    console.log(this.isEditDepartmentName)
                }

            },
            closeEditModal() {
                this.showEditDepartmentModel = false;
                this.isEditDepartmentName = '';
                //模态框关闭的时候清空表中的数据为初始值
                this.newDepartment = {
                    name:'',
                    pid:null,
                    manager:'',
                    phone:'',
                    order:null,
                    status:'T',
                    remarks:''
                };

                //模态框关闭的时候启用body滚动
                $('body').css('overflow','auto');
            },
            editDepartment() {
                this.$validator.validateAll().then((result)=> {//验证是否符合表单规则
                    if(result) {//如果符合才提交
                        console.log(this.newDepartment);
                        console.log(this.isEditDepartmentName);
                        axios.post('/departments/edit',{department:this.newDepartment,isEdit:this.isEditDepartmentName}).then(res=> {
                            let table = $('.datatable-department').DataTable();
                            let data = [
                                this.newDepartment.order?this.newDepartment.order:0,
                                this.newDepartment.pid,
                                this.newDepartment.name,
                                this.newDepartment.pid?res.data:'/',
                                this.newDepartment.manager,
                                this.newDepartment.phone,
                                this.newDepartment.remarks?this.newDepartment.remarks:'/',
                                this.newDepartment.order?this.newDepartment.order:'0',
                                this.newDepartment.created_at,
                                this.newDepartment.status==='T'?'<span class="label label-success">已启用</span>':'<span class="label label-danger">未启用</span>',
                                '<button class="edit btn btn-xxs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 修改</button>',
                            ];
                            table.row(this.selectedRow).data(data).draw(false);
                            this.closeEditModal();
                            this.$snotify.success('编辑成功！');
                        }).catch(error=> {
                            throw error
                        });
                    }
                })
            },
            changeStatus() {
                if(this.newDepartment.status==='T') {
                    this.newDepartment.status = 'F'
                }else {
                    this.newDepartment.status = 'T'
                }
            },
            checkName() {
                //需要判断时新增还是编辑窗口，如果时编辑窗口，那么验证的时候就必须排除当前选中的部门名称isEdit:that.isEditDepartmentName
                let that = this;
                //判断部门名称的唯一性
                this.$validator.extend('unique',{
                    validate: value => {
                        const promise = new Promise(function(resolve, reject) {
                            axios.post('/departments/validate/name',{name:that.newDepartment.name,isEdit:that.isEditDepartmentName}).then(res=> {
                                resolve(res.data.data);
                                console.log(res.data.data);
                                console.log(that.isEditDepartmentName)
                            })
                        });
                        //必须返回一个promise对象，否则报错
                        return promise.then((val)=>{
                            return  !val   //val值取反
                        })
                    }
                })
            },
            addDepartment() {
                this.$validator.validateAll().then((result)=> {//验证是否符合表单规则
                    if(result) {//如果符合才提交
                        axios.post('/departments/add',{department:this.newDepartment}).then(res=> {
                            let table = $('.datatable-department').DataTable();
                            table.row.add([
                                this.newDepartment.order?this.newDepartment.order:0,
                                res.data[0],
                                this.newDepartment.name,
                                this.newDepartment.pid?res.data[1]:'/',
                                this.newDepartment.manager,
                                this.newDepartment.phone,
                                this.newDepartment.remarks?this.newDepartment.remarks:'/',
                                this.newDepartment.order?this.newDepartment.order:'0',
                                moment(res.data[2]['date']).format("YYYY-MM-DD HH:mm:ss"),//格式化日期
                                this.newDepartment.status==='T'?'<span class="label label-success">已启用</span>':'<span class="label label-danger">未启用</span>',
                                '<button class="edit btn btn-xxs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 修改</button>',
                            ]).draw(false);
                            this.closeAddModal();
                            console.log(res.data);
                            this.$snotify.success('添加成功！');
                        }).catch(error=> {
                            throw error
                        });
                    }
                })
            },
            reloadOptions() {
                axios.get('/departments/get/used').then(res=> {
                    //console.log(res.data);
                    this.treeselectLists = res.data;
                });
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
                    let t = $('.datatable-department').DataTable({
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
                                    extend: 'colvis',
                                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                                    className: 'btn bg-blue btn-icon',
                                },
                            ],
                        },
                        select: {
                            style:    'os',
                        },
                        columnDefs: [
                            {
                                orderable: false,//不允许排序
                                targets: [0,-1]
                            },
                        ],
                        order:[[0, 'desc']] //默认排序降序
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
