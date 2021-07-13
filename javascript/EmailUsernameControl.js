$(document).ready(function () {
    $("#KorisnickoIme").keyup(function () {
        var KorisnickoIme = $(this).val().trim();
        $.ajax({
            url: '../provjere/dohvati_username.php',
            type: 'get',
            dataType: 'json',
            data: {
                KorisnickoIme: KorisnickoIme
            },
            success: function (response) {
                if (response === null) {
                    odgovor2.innerHTML = "Korisničko ime je slobodno!";
                    document.getElementById("KorisnickoIme").style = "border:none";
                    odgovor2.style = "color:green";

                } else {
                    document.getElementById("KorisnickoIme").style = "border:1px solid red";
                    odgovor2.innerHTML = "Korisničko ime je zauzeto!";
                    odgovor2.style = "color:red";
                }
            }
        });
    });
    $("#email").keyup(function () {
        var email = $(this).val().trim();
        $.ajax({
            url: '../provjere/dohvati_email.php',
            type: 'get',
            dataType: 'xml',
            data: {
                email: email
            },
            success: function (response) {
                if (response === null) {
                    document.getElementById("email").style = "border:none";
                    odgovor3.innerHTML = "Email  je slobodan!";
                    odgovor3.style = "color:green";

                } else {
                    document.getElementById("email").style = "border:1px solid red";
                    odgovor3.innerHTML = "Email je zauzet!";
                    odgovor3.style = "color:red";
                }
            }
        });
    });
});
