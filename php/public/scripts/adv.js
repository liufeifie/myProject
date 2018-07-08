define(['jquery'],function () {
    return {
        run:function () {
           // alert($);//滚播图
            $('.carousel').carousel({
                interval:2000
            });
            /*关闭广告*/
            $('.adv1 span').click(function () {
                $(this).parent().slideUp();
            });
            $('.sidebar span').click(function () {
                $(this).parent().slideUp();
            });

            /*图片预览*/
            $('#pic').change(function () {
                var fr=new FileReader();
                fr.readAsDataURL(this.files[0]);
                fr.addEventListener('load',function () {
                    $('#preview').attr('src',this.result);
                })
            });
        }
    }

});
