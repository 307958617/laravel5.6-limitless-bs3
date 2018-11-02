<template>
    <div class="row">
        <div class="col-md">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">系统编码管理<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="tabbable nav-tabs-vertical nav-tabs-left">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="active"><a href="#left-tab1" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i> 性 别</a></li>
                            <li class=""><a href="#left-tab2" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i> 职 称</a></li>
                            <li class=""><a href="#left-tab3" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i> 职 务</a></li>
                            <li class=""><a href="#left-tab4" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i> 学 历</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane has-padding active" id="left-tab1">
                                <data-table-for-system-code-gender></data-table-for-system-code-gender>
                            </div>

                            <div class="tab-pane has-padding" id="left-tab2">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                            </div>

                            <div class="tab-pane has-padding" id="left-tab3">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                            </div>

                            <div class="tab-pane has-padding" id="left-tab4">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('system_code.')
        },
    }
</script>
