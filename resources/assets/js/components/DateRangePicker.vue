<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control daterange-time">
                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('dateRangePicker.');
            this.initDateRangePicker();
        },
        methods: {
            initDateRangePicker() {
                document.addEventListener('DOMContentLoaded', function() {
                    $('.daterange-time').daterangepicker({
                        startDate: moment(),
                        endDate: moment(),
                        timePicker24Hour: true,
                        timePicker: true,
                        timePickerSeconds: true,
                        applyClass: 'bg-slate-600',
                        cancelClass: 'btn-default',
                        locale: {
                            "format": "YYYY/MM/DD HH:mm:ss",
                            "separator": " - ",
                            "applyLabel": "确 认",
                            "cancelLabel": "取 消",
                            "fromLabel": "From",
                            "toLabel": "To",
                            "customRangeLabel": "Custom",
                            "weekLabel": "W",
                            "daysOfWeek": ["日", "一", "二", "三", "四", "五", "六"],
                            "monthNames": ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                            "firstDay": 1
                        },
                    });
                });
            }
        }
    }
</script>
