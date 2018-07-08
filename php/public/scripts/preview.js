define(['jquery'],function () {
    return{
        /*图片预览*/
        run:function () {
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
