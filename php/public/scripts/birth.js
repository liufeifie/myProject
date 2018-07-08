define(['jquery'], function () {
    return {
        birth: function () {
            $(function () {
                var y = $('.year');
                var m = $('.month');
                var d = $('.day');
                for (i = 1980; i <= 2020; i++) {//年份
                    y.append("<option>" + i + "年</option>");
                }
                y.change(function () {//设置月数
                    m.empty();
                    d.empty();
                    m.append("<option>请选择月</option>");
                    d.append("<option>请选择天</option>");
                    /*  m.show();
                     d.show();*/
                    for (i = 1; i <= 12; i++) {
                        if (i < 10) {
                            m.append("<option name='" + i + "'>" + '0' + i + "月</option>");
                        } else {
                            m.append("<option name='" + i + "'>" + i + "月</option>");
                        }

                    }
                });
                m.change(function () {//设置天数
                    d.empty();
                    d.append("<option>请选择天</option>");
                    d.show();
                    var y0 = y.val();//获取年数  判断闰年 平年
                    y0 = parseInt(y0);
                    var m0 = $('.month option:checked').attr('name');//获取月数
                    m0 = parseInt(m0);
                    switch (m0) {
                        case 2:
                            if (y0 % 400 == 0 || (y0 % 4 == 0 && y0 % 100 != 0)) {//闰年判断
                                for (i = 1; i <= 29; i++) {
                                    if (i < 10) {
                                        d.append("<option>" + '0' + i + "号</option>");
                                    } else {
                                        d.append("<option>" + i + "号</option>");
                                    }
                                }
                            } else {
                                for (i = 1; i <= 28; i++) {
                                    if (i < 10) {
                                        d.append("<option>" + '0' + i + "号</option>");
                                    } else {
                                        d.append("<option>" + i + "号</option>");
                                    }
                                }
                            }
                            break;
                        case 1:
                        case 3:
                        case 5:
                        case 7:
                        case 8:
                        case 10:
                        case 12:
                            for (i = 1; i <= 31; i++) {
                                if (i < 10) {
                                    d.append("<option>" + '0' + i + "号</option>");
                                } else {
                                    d.append("<option>" + i + "号</option>");
                                }
                            }
                            break;
                        case 4:
                        case 6:
                        case 9:
                        case 11:
                            for (i = 1; i <= 30; i++) {
                                if (i < 10) {
                                    d.append("<option>" + '0' + i + "号</option>");
                                } else {
                                    d.append("<option>" + i + "号</option>");
                                }
                            }
                            break;
                    }
                });

            });
        }
    }
});
