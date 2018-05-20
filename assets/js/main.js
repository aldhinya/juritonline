var getUrl  = window.location.protocol + "//" + window.location.host + "/";

function CekEmail(x){

    $.ajax({
        url     : getUrl+'member/cekEmailRegistrasi',
        data    : {x:x},
        type    : 'POST',
        dataType: 'json',
        success : function(result){
            if(result.rs == 1){
                $("#pesan-error-email").html(result.msg);
                $(".tombol-register").html("<button type='button' class='btn btn-primary disabled'><i class='fa fa-exclamation-circle'></i> Lengkapi bagian yang salah</button>");
            }else{
                $("#pesan-error-email").html(result.msg);
                $(".tombol-register").html("<button type='submit' class='btn btn-primary' name='daftar' id='btn-register'><i class='fa fa-check'></i> Register</button>");
            }
        },
    });
}

function CekPassword(){
    var password = $("#password").val();
    var pass     = $("#pass").val();

    if(pass != '' && password != ''){
        if(password == pass){
            $("#pesan-error-password").html("");
            $(".tombol-register").html("<button type='submit' class='btn btn-primary' id='btn-register' name='daftar' ><i class='fa fa-check'></i> Register</button>");
        }else{
            $("#pesan-error-password").html("<span style='color:red;font-size:12px'>Password tidak sama</span>");
            $(".tombol-register").html("<button type='button' class='btn btn-primary disabled'><i class='fa fa-exclamation-circle'></i> Lengkapi bagian yang salah</button>");
        }
    }

}
