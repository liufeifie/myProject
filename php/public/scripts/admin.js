define(['jquery','Tools'],function () {
    return {
        /**隐藏菜单栏*/
        hide:function () {
            $('#list').click(function () {
                if ($('.middleLeft').width() != 0) {
                    $('.middleLeft').animate({'width': '0px', 'padding-left': '0px', 'padding-right': '0px'},
                        2000, 'linear', function () {
                            $(this).css('display', 'none');
                        });
                    $('.middleRight').animate({'width': '100%'},
                        2000, 'linear');
                } else {
                    $('.middleLeft').css('display', 'block');
                    $('.middleLeft').animate({'width': '16.6%', 'padding-left': '15px', 'padding-right': '15px'},
                        2000, 'linear');
                    $('.middleRight').animate({'width': '83.3%'}, 2000, 'linear');
                }
            });
        },
        /**点击单条删除 出现弹出框*/
        run:function () {
            var info, id;
            $('.delete').click(function () {
                $('#Msg')[0].style.display = 'block';
                id = $(this).attr('name');
            });
            /**点击多条删除*/
            $('.send1').click(function () {
                $('#Msg')[0].style.display = 'block';
                id=' ';
                $('.choice').each(function () {
                    if($(this).prop('checked')==true){
                       id+= $(this).val()+',';
                    }
                });
            });
            /*取消删除*/
            $('.cancel').click(function () {
                $('#Msg')[0].style.display = 'none';
            });
            /*删除广告*/
            $('.confirmAd').click(function () {
                info = 'ok';
                ajax('ad',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除文章*/
            $('.confirmArticle').click(function () {
                info = 'ok';
                ajax('article',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除等级*/
            $('.confirmLevel').click(function () {
                info = 'ok';
                ajax('level',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除权限*/
            $('.confirmPermission').click(function () {
                info = 'ok';
                ajax('permission',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除管理员*/
            $('.confirmUser').click(function () {
                info = 'ok';
                ajax('user',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除导航*/
            $('.confirmNav').click(function () {
                info = 'ok';
                ajax('nav',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除会员*/
            $('.confirmMember').click(function () {
                info = 'ok';
                ajax('member',info, id);
                $('#Msg')[0].style.display = 'none';
            });
            /*删除试题*/
            $('.confirmExam').click(function () {
                info = 'ok';
                ajax('exam',info, id);
                $('#Msg')[0].style.display = 'none';
            });
        },
        /**全选*/
        checkll:function () {
            $('.allCheck').click(function () {
                var attr=$('.allCheck').prop('checked');
                if(attr){
                    for (i in $('.choice')){
                        $('.choice')[i].checked='checked';
                    }
                }else {
                    for (i in $('.choice')){
                        $('.choice')[i].checked='';
                    }
                }
            });
        },
        /*分页*/
        page:function () {
            //location.search:查询字符串
            var url=window.location.search.split("&");
            if(/page/.test(url[url.length-1])){
                url.pop();
            }
            url=url.join("&");
            $('#pageValue').click(function(){
                location.href=url+"&page="+$(this).val();
            });
            $('#pageValue').change(function(){
                location.href=url+"&page="+$(this).val();
            });
            $('#pageSelect').change(function(){
                location.href=url+"&page="+$(this).val();
            });
            document.addEventListener("keydown",function(evt){
                if(evt.keyCode==13){
                    location.href=url+"&page="+$('#pageValue').val();
                }
            });
        }
    }
});