define(['jquery', 'bootstrap', 'Tools'], function () {
    return {
        run: function () {
            /*点击注销账户弹出框*/
            $('.userLogout').click(function () {
                $('#Msg')[0].style.display = 'block';
            });
            /*确认*/
            $('.confirmUserLogout').click(function () {
                $('#Msg')[0].style.display = 'none';
                var xhr = new XMLHttpRequest();
                xhr.open('post', 'main.php?a=home&m=logout');
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                xhr.send('user=' + user + '&pwd=' + pwd);
                xhr.addEventListener('readystatechange', function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if (xhr.responseText.trim() == 'logout') {
                                // localStorage.setItem('user',user);
                                progress('注销成功', '?a=home', 1, 2);
                            }
                        } else {
                            progress('注销失败', '?a=home', 0, 3);
                            console.log(xhr.responseText);
                        }
                    }
                });
            });
            /*取消*/
            $('.cancel').click(function () {
                $('#Msg')[0].style.display = 'none';
            });
            /*获取登录名*/
            // login();
            /**登录*/
            var level1, level2, user, pwd;
            $('#loginUser').blur(function () {
                user = $(this).val().trim();
                //alert(user);
                if (user.length <= 0) {
                    $('#userTip').html('*用户名不为空*').addClass('red').removeClass('green');
                    level1 = 0;
                } else {
                    $('#userTip').html('');
                    level1 = 1;
                }
            });
            $('#loginPwd').blur(function () {
                pwd = $(this).val().trim();
                if (pwd.length <= 0) {
                    $('#pwdTip').html('*密码不为空*').addClass('red').removeClass('green');
                    level2 = 0;
                } else {
                    $('#pwdTip').html('');
                    level2 = 1;
                }
            });
            /*登录*/
            $('#sendLogin').click(function () {
                // alert(user);
                var level = level1 + level2;
                if (level == 2) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('post', 'main.php?a=home&m=login');
                    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                    xhr.send('user=' + user + '&pwd=' + pwd);
                    xhr.addEventListener('readystatechange', function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if (xhr.responseText.trim() == 'login') {
                                    // localStorage.setItem('user',user);
                                    progress('登录成功', '?a=home', 1, 3);
                                } else if (xhr.responseText.trim() == 'deniedLogin') {
                                    $('#btnTip').html('*用户名或密码错误*').addClass('red').removeClass('green');
                                } else {
                                    progress('登录失败', '?a=home', 0, 3);
                                    console.log(xhr.responseText);
                                }
                            }
                        }
                    });
                } else {
                    $('#btnTip').html('*输入用户名或密码*').addClass('red').removeClass('green');
                }
            });
        }

    }
});
