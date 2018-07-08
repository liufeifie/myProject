define(['jquery','Tools'],function () {
    return{
        run:function () {
            /**注册页面*/
            var level1, level2, level3, level4, level5, level6, level7;
            var user;
            var pwd, repwd;
            var phone;
            var email;//code
            /**用户*/
            $('#user').keyup(function () {
                user = $(this).val().trim();
                if (user.length <= 0) {
                    $('.user').html('用户名不为空').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level1 = 0;
                } else if (user.length > 8) {
                    $('.user').html('用户名长度大于8').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level1 = 0;
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open('post', '?a=register&action=user');
                    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                    xhr.send('user=' + user);
                    xhr.addEventListener('readystatechange', function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                               // console.log(xhr.responseText);
                                //alert(xhr.responseText);
                                if (xhr.responseText == 'no') {
                                    $('.user').html('用户名已注册').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                                        .parent().addClass('red').removeClass('green');
                                    level1 = 0;
                                } else if (xhr.responseText == 'ok') {
                                    $('.user').html('用户名可以使用')
                                        .next().removeClass('glyphicon-remove').addClass('glyphicon-ok')
                                        .parent().addClass('green').removeClass('red');
                                    level1 = 1;
                                } else {
                                    $('.user').html(xhr.responseText);
                                    level1 = 0;
                                }
                            }
                        }
                    });
                }
            });
            /**密码验证*/
            $('#pwd').keyup(function () {
                pwd = $(this).val().trim();
                repwd = $('#repwd').val().trim();
                if (repwd.length != 0) {
                    if (pwd == repwd) {
                        $('.repwd').html('两次密码一致').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                            .parent().addClass('green').removeClass('red');
                        level3 = 1;
                    } else if (pwd != repwd) {
                        $('.repwd').html('两次密码不一致').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                            .parent().addClass('red').removeClass('green');
                        level3 = 0;
                    }
                }
                if (pwd.length < 6) {
                    $('.pwd').html('密码小于6个字符').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level2 = 0;
                } else if (pwd.length > 20) {
                    $('.pwd').html('密码长度大于20').next().addClass('glyphicon-remove').removeClass('glyphicon-remove')
                        .parent().addClass('red').removeClass('green');
                    level2 = 0;
                } else {
                    var n=testPwd(pwd);
                   // progress('注册失败', '?a=register&action=register', 0, 3);
                    switch (n) {
                        case 0:
                            $('.pwd').html('密码强度最强').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                .parent().addClass('green').removeClass('red');
                            level2 = 1;
                            break;
                        case 1:
                            $('.pwd').html('密码强度强').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                .parent().addClass('green').removeClass('red');
                            level2 = 1;
                            break;
                        case 2:
                            $('.pwd').html('密码强度中').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                .parent().addClass('green').removeClass('red');
                            level2 = 1;
                            break;
                        case 3:
                            $('.pwd').html('密码强度弱').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                                .parent().addClass('red').removeClass('green');
                            level2 = 0;
                            break;
                    }
                }
            });
            /**密码核对*/
            $('#repwd').keyup(function () {
                repwd = $(this).val().trim();
                if (repwd.length == 0) {
                    $('.repwd').html('密码不能为空').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level3 = 0;
                } else if (pwd == repwd) {
                    $('.repwd').html('两次密码一致').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                        .parent().addClass('green').removeClass('red');
                    level3 = 1;
                } else if (pwd != repwd) {
                    $('.repwd').html('两次密码不一致').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level3 = 0;
                }
            });
            /**头像上传*/
            $('#pic').change(function () {
                var fr=new FileReader();
                var file=this.files[0];
                // upload(file);
                fr.readAsDataURL(file);
                /*fr.onload=function () {
                 $('.previewPic').attr('src',this.result);
                 };*/
                fr.addEventListener('load',function () {
                    $('.previewPic').attr('src',this.result);
                });
                var xhr=new XMLHttpRequest();
                var fd=new FormData();
                xhr.open('post','?a=register&action=pic');
                fd.append('pic',file);
                xhr.send(fd);
                xhr.addEventListener('readystatechange',function () {
                    if(xhr.readyState==4){
                        if(xhr.status==200){
                            if(xhr.responseText=='okPic'){
                                $('.pic').html('头像可以使用').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                    .parent().addClass('green').removeClass('red');
                                level7= 1;
                            }else {
                                $('.pic').html(xhr.responseText).next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                                    .parent().addClass('red').removeClass('green');
                                level7= 0;
                            }
                        }
                    }
                });
            });

            /**手机号*/
            $('#phone').keyup(function () {
                phone = $(this).val().trim();
                if (phone.length < 11 || phone.length > 11) {
                    // console.log(phone.length);
                    $('.phone').html('输入11位号码').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level4 = 0;
                } else if (Valid_tel(phone)) {
                    $('.phone').html('手机号码正确').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                        .parent().addClass('green').removeClass('red');
                    level4 = 1;
                } else {
                    $('.phone').html('手机号码不正确').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level4 = 0;
                }
            });
            /**邮箱*/
            $('#email').keyup(function () {
                email = $(this).val().trim();
                if (Valid_email(email)) {
                    $('.email').html('邮箱格式正确').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                        .parent().addClass('green').removeClass('red');
                    level5 = 1;
                } else {
                    $('.email').html('邮箱格式不正确').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level5 = 0;
                }
                if (email.length > 30) {
                    $('.email').html('邮箱长度大于30').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                    level5 = 0;
                }
            });
            /*验证码*/
            $('#code').keyup(function () {
                code = $(this).val().trim();
                var xhr = new XMLHttpRequest();
                xhr.open('post', 'main.php?a=register&action=code');
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                xhr.send(null);
                xhr.addEventListener('readystatechange', function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var code0 = xhr.responseText;
                            if (code.length == 4) {
                                if (code.toLowerCase() == code0.toLowerCase()) {
                                    $('.code').html('验证码正确').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                        .parent().addClass('green').removeClass('red');
                                    level6 = 1;
                                } else {
                                    $('.code').html('验证码错误').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                                        .parent().addClass('red').removeClass('green');
                                    level6 = 0;
                                }
                            } else {
                                level6 = 0;
                                $('.code').html('').next().removeClass('glyphicon-remove glyphicon-ok');
                            }
                        }
                    }
                });
            });
            /**点击刷新验证码*/
            $('#codeImg').click(function () {
                //alert(Math.random()*1);
                this.src = 'application/includes/code.php?num=' + Math.random() * 1;
            });
            /**提交注册*/
            $('#send').click(function () {
                var level = level1 + level2 + level3 + level4 + level5 + level6+level7;
                if (level != 7) {
                    $('.send').html('请输入正确信息').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                } else if (level == 7) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('post', '?a=register&action=add');
                    //xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                    var fd=new FormData();
                    fd.append('user',user);
                    fd.append('pwd',pwd);
                    fd.append('phone',phone);
                    fd.append('email',email);
                    xhr.send(fd);
                    // xhr.send('user=' + user + '&pwd=' + pwd + '&phone=' + phone + '&email=' + email);
                    xhr.addEventListener('readystatechange', function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if (xhr.responseText == 'register') {
                                   // localStorage.setItem('user', user);
                                    progress('注册成功', '?a=home', 1, 3);
                                } else if (xhr.responseText == 'deniedRegister') {
                                    progress('注册失败', '?a=register', 0, 3);
                                }else {
                                    console.log(xhr.responseText);
                                }
                            }
                        }
                    })
                }
            });

            /**忘记密码页面*/
            $('#resend').click(function () {
                var reuser = $('#reuser').val().trim();
                var rephone = $('#rephone').val().trim();
                var remail = $('#remail').val().trim();
                var xhr = new XMLHttpRequest();
                xhr.open('post', '?a=register&action=verifyInfo');
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                xhr.send('user=' + reuser + '&phone=' + rephone + '&email=' + remail);
                xhr.addEventListener('readystatechange', function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            //alert(xhr.responseText);
                            if (xhr.responseText == 'noPass') {
                                $('.resend').html('验证失败').next().addClass('glyphicon-ok').removeClass('glyphicon-remove')
                                    .parent().addClass('red').removeClass('green');
                            } else if (xhr.responseText == 'pass') {
                              //  sessionStorage.setItem('user', reuser);
                                progress('验证成功', '?a=register&action=reset', 1, 3);
                            } else {
                                console.log(xhr.responseText);
                            }
                        }
                    }
                });
            });
            /**重置密码页面*/
            $('#resetSend').click(function () {
                pwd = $('#pwd').val().trim();
                var level = level2 + level3+level6;
                if (level == 3) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('post', '?a=register&action=resetPwd');
                    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded,charset=UTF-8");
                    xhr.send('pwd=' + pwd + '&user=' + sessionStorage.getItem('user'));
                    xhr.addEventListener('readystatechange', function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                //alert(xhr.responseText);
                                if (xhr.responseText == 'rePwd') {
                                    progress('密码重置成功', '?a=home', 1, 3);
                                   // localStorage.setItem('user',sessionStorage.getItem('user'));
                                } else if (xhr.responseText == 'noRePwd') {
                                    $('.send').html('密码重置失败').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                                        .parent().addClass('red').removeClass('green');
                                    //localStorage.removeItem('user');
                                }else {
                                    console.log(xhr.responseText);
                                }
                            }
                        }
                    });
                }else {
                    $('.send').html('输入正确信息').next().addClass('glyphicon-remove').removeClass('glyphicon-ok')
                        .parent().addClass('red').removeClass('green');
                }
            });
        }
    }
});
