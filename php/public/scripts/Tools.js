
function getWindowSize(){
    return {
        width:window.innerWidth||document.documentElement.clientWidth,
        height:window.innerHeight||document.documentElement.clientWidth
    }
}
function getScrollSize(){
    return{
        top:document.body.scrollTop||document.documentElement.scrollTop,
        left:document.body.scrollLeft||document.documentElement.scrollLeft
    }
}
//元素居中
function center(_element,_elementSize){
    _element.style.left= (getWindowSize().width-_elementSize.width)/2+"px";
    _element.style.top= (getWindowSize().height-_elementSize.height)/2+"px";
}
/*密码*/
function testPwd(_pwd) {
    if (_pwd.trim().length != 0) {
        var num = 0;
        if (!/[\d]/.test(_pwd)) {
            num += 1;
        }
        if (!/[a-z]/.test(_pwd)) {
            num += 1;
        }
        if (!/[A-Z]/.test(_pwd)) {
            num += 1;
        }
        if (!/[\W]/.test(_pwd)) {
            num += 1;
        }
    }
    return num;// 0 1 2 3
}
/*手机号*/
function Valid_tel(_tel) {
    var pattern = /^1(3|5|7)[0-9]{9}$/i;
    var result = null;
    if(pattern.test(_tel)) {
        result = true;
    } else {
        result = false;
    }
    return result;
}
function Valid_email(_email) {
    var pattern = /^[0-9a-z]+([\._-][a-z0-9]+)?@([0-9a-z]+([_-]+[0-9a-z]+)?\.[a-z]{2,9}(\.[a-z0-9]+)?)$/i;
    var result = null;
    if (pattern.test(_email)) {
        result = true;
    } else {
        result = false;
    }
    return result;
}
/*登录名存在*/
/*function login() {
    if(localStorage.getItem('user')){
        $('.login')[0].style.display='none';
        $('.logout')[0].style.display='block';
    }else {
        $('.login')[0].style.display='block';
        $('.logout')[0].style.display='none';
    }
}*/
/*进度条*/
function progress(_msg, _url, _color, _time) {
    var progress = document.querySelector('#progress-bar');
    $('#progressBox')[0].style.display = 'block';
    if (_color == 0) {
        progress.style.background = 'red';
    } else if (_color == 1) {
        progress.style.background = 'green';
    }
    var t = _time * 10;
    var w = t;
    // console.log(w);
    var tt = setInterval(function () {
        t--;
        var w0 = parseInt((w - t) * 100 / w);
        if(w0<=80) {
            progress.style.width = w0 + '%';
            document.querySelector('#num1').innerHTML = w0 + '%';
        }else if (w0 > 80&&w0<100) {
            progress.style.width = w0 + '%';
            document.querySelector('#num1').innerHTML = _msg+w0 + '%';
        } else {
            w0=100;
            progress.style.width = w0 + '%';
            document.querySelector('#num1').innerHTML = _msg+w0 + '%';
            location.href = _url;
            login();
            $('#progressBox')[0].style.display = 'none';
            clearInterval(tt);
        }

    }, 100);
}
/*ajax*/
function ajax(_type,_info, _id) {
    var xhr = new XMLHttpRequest();
    xhr.open('post', '?a='+_type+'&action=delete&id='+ _id);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
    xhr.send('info=' + _info);
    xhr.addEventListener('readystatechange', function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText.trim().substr(0, 2) == 'ok') {
                    progress('删除成功', '?a='+_type+'&action=show', 1, 3);
                } else if (xhr.responseText.trim().substr(0, 2) == 'no') {
                    console.log(xhr.responseText);
                    progress('删除失败', '?a='+_type+'&action=show', 0, 3);
                }else {
                    console.log(xhr.responseText);
                }
            }
        }
    });
}