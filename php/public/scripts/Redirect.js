define(['jquery'], function () {
    return {
        /*run:function () {
         var redirect=document.querySelector("#Redirect");
         var timer=document.querySelector("#timer");
         var size={width:"200",height:"200"};
         center(redirect,size);
         var countdown=redirect.dataset.countdown;
         var url=redirect.dataset.url;
         var tt=setInterval(function(){
         if(countdown<=1){
         countdown=1;
         clearInterval(tt);
         redirect.style.display="none";
         location.href=url;
         }
         countdown--;
         timer.innerHTML=countdown;
         },1000);
         },*/
        /*进度条*/
        run: function () {
            var progress = document.querySelector('.progress_bar');
            //console.log(progress.dataset);
            var t = (progress.dataset.time) * 10;
            var w = t;
            var msg = progress.dataset.msg;
            var url = progress.dataset.url;
            //console.log(w);
            var tt = setInterval(function () {
                t--;
                var w0 = (w - t) * 100 / w;
                if(w0<=80){
                    progress.style.width = w0 + '%';
                    document.querySelector('#num').innerHTML = parseInt(w0) + '%';
                }else if (w0 > 80&&w0<=100) {
                    progress.style.width = w0 + '%';
                    document.querySelector('#num').innerHTML = msg+parseInt(w0) + '%';
                } else {
                    w0=100;
                    progress.style.width = w0 + '%';
                    location.href = url;
                    clearInterval(tt);
                }
            }, 100);
        }
    }
});
/*
 function Redirect(){
 var t=new Tools();
 var redirect=document.querySelector("#Redirect");
 var timer=document.querySelector("#timer");
 var size={width:"200",height:"200"};
 t.center(redirect,size);
 var countdown=redirect.dataset.countdown;
 var url=redirect.dataset.url;
 //console.log(url);
 var tt=setInterval(function(){
 if(countdown<=1){
 countdown=1;
 clearInterval(tt);
 redirect.style.display="none";
 location.href=url;
 }
 countdown--;
 timer.innerHTML=countdown;
 },1000);
 }
 Redirect();	*/
