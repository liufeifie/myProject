define(['jquery','bootstrap','Tools'],function () {
    return {
        run:function () {
            /*点击开始考试php*/
            $('#testPhp').click(function () {
                $('#examPhp')[0].style.display = 'block';
                if($('.userName').html().trim().length>0){
                    $('.infoTip').html('是否进行考试');
                }else {
                    $('.infoTip').html('请登录');
                }
            });
            /*确认*/
            $('.confirmTest').click(function () {
                if($('.userName').html().trim().length>0){
                    $('#examPhp')[0].style.display = 'none';
                     progress('试题获取成功','?a=grade&action=php',1,2);
                }else {
                    $('#examPhp')[0].style.display = 'none';
                    $('#login').addClass('in');
                    $('#login')[0].style.display='block';
                }
            });
            /*点击js考试*/
            $('#testJs').click(function () {
                $('#examJs')[0].style.display = 'block';
                if($('.userName').html().trim().length>0){
                    $('.infoTip').html('是否进行考试');
                }else {
                    $('.infoTip').html('请登录');
                }
            });
            /*确认*/
            $('.confirmTestJs').click(function () {
                if($('.userName').html().trim().length>0){
                    $('#examJs')[0].style.display = 'none';
                    progress('试题获取成功','?a=grade&action=js',1,2);
                }else {
                    $('#examJs')[0].style.display = 'none';
                    $('#login').addClass('in');
                    $('#login')[0].style.display='block';
                }
            });
            /*点击htmlCss考试*/
            $('#testHtmlCss').click(function () {
                $('#examHtmlCss')[0].style.display = 'block';
                if($('.userName').html().trim().length>0){
                    $('.infoTip').html('是否进行考试');
                }else {
                    $('.infoTip').html('请登录');
                }
            });
            /*确认*/
            $('.confirmTestHtmlCss').click(function () {
                if($('.userName').html().trim().length>0){
                    $('#examHtmlCss')[0].style.display = 'none';
                    progress('试题获取成功','?a=grade&action=htmlCss',1,2);
                }else {
                    $('#examHtmlCss')[0].style.display = 'none';
                    $('#login').addClass('in');
                    $('#login')[0].style.display='block';
                }
            });

            $('.close').click(function () {
                $('#login').removeClass('in');
                $('#login')[0].style.display='none';
            });
            /*取消*/
            $('.cancel').click(function () {
                $('#examPhp')[0].style.display = 'none';
                $('#examJs')[0].style.display = 'none';
                $('#examHtmlCss')[0].style.display = 'none';
            });
        }
    }
});
