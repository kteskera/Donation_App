$(document).ready(function () {
  naslov = $(document).find("title").text();
  var btn = document.getElementById("ok");
  var bar = document.getElementById("consent");
  var bool = false;
  if (naslov === "Profil" || naslov === "Autor" || naslov === "Dokumentacija" || naslov === "Donacije" || naslov === "Kategorije" || naslov === "RjesiZad") {
    $.ajax({
      url: 'dohvati_podatke/uvjetikoristenja.php',
      type: 'get',
      dataType: 'json',
      success: function (json) {

        $.each(json, function (key, value) {
          if (key === "uvjeti" && value !== null && getCookie("consent") == null)
            document.cookie = "consent=ok;path=/;"

        });
      }, error: function (xhr, ajaxOptions, thrownError) {
        bool = true;
      }
    });
  } else {
    $.ajax({
      url: '../dohvati_podatke/uvjetikoristenja.php',
      type: 'get',
      dataType: 'json',
      success: function (json) {
        $.each(json, function (key, value) {
          if (key === "uvjeti" && value !== null && getCookie("consent") == null)
            document.cookie = "consent=ok;path=/;"
        });

      }, error: function (xhr, ajaxOptions, thrownError) {
        bool = true;
      }
    });
  }
  btn.onclick = function () {
    if (bool === true) {
      bar.style.display = 'none';
      document.cookie = "consent=ok;path=/;"
    }
  }
  bar.style.display = (getCookie("consent") == 'ok') ? 'none' : 'table';
  function getCookie(name) {
    var v = new RegExp(name + "=([^;]+)").exec(document.cookie);
    return (v != null) ? unescape(v[1]) : null;
  }
  if (getCookie("stranicenje") == null || getCookie("stranicenje") == "") {
    var brojredaka = 7;
  }
  else {
    var brojredaka = getCookie("stranicenje");
  }
  if (getCookie("consent") == "ok") {
    $('#stranicenje').click(function (e) {
      if ($.trim($("#inputstranicenje").val()) === "") {
        $('#inputstranicenje').css('border', '1px solid red');
        greske2.innerHTML += "Broj nije unesen!" + "<br>"
        e.preventDefault();
      } else {
        $('#inputstranicenje').css('border', 'none');
        greske2.innerHTML = "";
        var brojstr = document.getElementById("inputstranicenje");
        document.cookie = "stranicenje=" + brojstr.value + ";path=/;"
        brojredaka = getCookie("stranicenje");
        brojstr.value = "";
      }
    });
  }
  switch (naslov) {
    case "Doniraj":
      $('#donirajform').submit(function (e) {
        greske.innerHTML = "";
        console.log($("#iznos"));
        if ($.trim($("#iznos").val()) === "" || $('#iznos').val() === null) {
          $('#iznos').css('border', '1px solid red');
          greske.innerHTML += "Naziv nije popunjen!" + "<br>"
          e.preventDefault();
        }
      });
      break;
    case "Registracija":
      var onloadCallback = function () {
        alert("grecaptcha is ready!");
      };
      var greske = document.getElementById("greske");
      $('#regbtn').click(function (event) {
        greske.innerHTML = "";
        var forma = document.getElementById("proba");
        for (i = 0; i < forma.length; i++) {
          if (forma[i].value === "") {
            forma[i].style = " border:1px solid red";
            greske.innerHTML += "Nije popunjeno: " + forma[i].name + "<br>"
          } else {
            forma[i].style = " border:none";
          }
        }
        var lozi = document.getElementById("lozinka");
        var ponlozi = document.getElementById("ponoviLozinku");
        if (lozi.value !== ponlozi.value) {
          greske.innerHTML += "Lozinke se ne poklapaju!" + "<br>";
          ponlozi.style = "border:1px solid red";
          lozi.style = "border:1px solid red";
        }
        if (lozi.value !== "") {
          if (lozi.value.length < 6) {
            greske.innerHTML += "Lozinka se mora sastojati od minimalno 6 znakova!" + "<br>";
            lozi.style = "border:1px solid red";
          }
        }
        var match = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
        var email = document.getElementById("email");
        if (email.value !== "") {
          if (!match.test(email.value)) {
            email.style = "border:1px solid red";
            greske.innerHTML += "Krivi format email-a!" + "<br>";
          }
        }
        var ime = document.getElementById("ime");
        if (ime.value !== "") {
          if (ime.value.length < 2) {
            greske.innerHTML += "Ime se mora sastojati od minimalno 2 slova" + "<br>";
            ime.style = "border:1px solid red";
          }
        }
        var prezime = document.getElementById("prezime");
        if (prezime.value !== "") {
          if (prezime.value.length < 2) {
            greske.innerHTML += "Prezime se mora sastojati od minimalno 2 slova" + "<br>";
            prezime.style = "border:1px solid red";
          }
        }
        var korime = document.getElementById("KorisnickoIme");
        if (korime.value !== "") {
          if (korime.value.length < 5) {
            greske.innerHTML += "Korisničko ime se mora sastojati od minimalno 5 slova" + "<br>";
            korime.style = "border:1px solid red";
          }
        }
        if (greske.innerHTML.length !== 0) {
          event.preventDefault();
        }
      });
      break;
    case "Donacija":
      $('#sakrijsveprojekte').hide();
      var tablica2 = $('#odabranakategorija').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ],
        "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'filter records'
        }
      });
      $('#selekcijakategorije').change(function () {
        tablica2.clear();
        var id_kategorija = document.getElementById("selekcijakategorije").value;
        var naziv;
        var akronim;
        var datumpocetka;
        var datumzavrsetka;
        var opiszah;
        var mindonacije;
        var trenutnedonacija;
        var naziv;
        $.ajax({
          url: '../dohvati_podatke/aktivni_projekti.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_kategorija: id_kategorija
          },
          success: function (json) {
            tablica2.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "id_projekt") {
                  link = "<a href='../kategorije/doniraj.php?id=" + value2 + "'><i class='fa fa-credit-card-alt' aria-hidden='true'></i>";
                }
                if (key2 === "naziv_projekta") {
                  naziv = value2;
                } if (key2 === "akronim") {
                  akronim = value2;
                } if (key2 === "datum_pocetka") {
                  datumpocetka = value2;
                }
                if (key2 === "datum_zavrsetka") {
                  datumzavrsetka = value2;
                }
                if (key2 === "opis_zahtjeva") {
                  opiszah = value2;
                }
                if (key2 === "min_iznos_donacija") {
                  mindonacije = value2;
                } if (key2 === "trenutni_iznos_donacija") {
                  trenutnedonacija = value2;
                }
              });
              tablica2.row.add([naziv, akronim, datumpocetka, datumzavrsetka, opiszah, mindonacije, trenutnedonacija, link]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica2.row.add(["-", "-", "-", "-", "-", "-", "-", "-"]).draw(false);
          }

        });
        $('#sakrijsveprojekte').show();
      });

      break;
    case "Postavke":
      var tablicadnevnik = $('#dnevnik').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "columnDefs": [{ "orderable": false, "targets": 1 }],
        dom: 'Bfrtip',
        buttons: [
          'print', 'pdf'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      $('#dnevnik thead tr').clone(true).appendTo('#dnevnik thead ');
      $('#dnevnik thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Pretraži ' + title + '" />');

        $('input', this).on('keyup change', function () {
          if (table.column(i).search() !== this.value) {
            table
              .column(i)
              .search(this.value)
              .draw();
          }
        });
      });

      var tablica = $('#popiskompetencijatable').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "columnDefs": [{ "orderable": false, "targets": 1 }],
        dom: 'Bfrtip',
        buttons: [
          'print', 'pdf'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      var tablica2 = $('#popiskorisnikatbl').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "columnDefs": [
          { "orderable": false, "targets": 3 },
          { "orderable": false, "targets": 5 }
        ],
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });

      $('#kreirajkompetencijudiv').hide();
      $('#prikazikompetencije').hide();
      $('#popiskorisnika').hide();
      $('#dnevnikaktivnosti').hide();
      $('#postavkestranice').hide();


      $('#uredikom').click(function () {
        $('#kompetencije').show();
        $('#popiskorisnika').hide();
        $('#dnevnikaktivnosti').hide();
        $('#postavkestranice').hide();
      });
      $('#prikazipopis').click(function () {
        $('#kompetencije').hide();
        $('#popiskorisnika').show();
        $('#dnevnikaktivnosti').hide();
        $('#postavkestranice').hide();
      });
      $('#prikazipostavke').click(function () {
        $('#kompetencije').hide();
        $('#popiskorisnika').hide();
        $('#dnevnikaktivnosti').hide();
        $('#postavkestranice').show();
      });
      $('#dnevnikrada').click(function () {
        $('#kompetencije').hide();
        $('#popiskorisnika').hide();
        $('#dnevnikaktivnosti').show();
        $('#postavkestranice').hide();
      });



      $('#dodajkompetencije').click(function () {
        $('#listakomp').hide();
        $('#dodajkompetencije').hide();
        $('#kreirajkompetencijudiv').show();
        $('#prikazikompetencije').show();
      });


      $('#dodajkompetencije').click(function () {
        $('#listakomp').hide();
        $('#dodajkompetencije').hide();
        $('#kreirajkompetencijudiv').show();
        $('#prikazikompetencije').show();
      });

      $('#prikazikompetencije').click(function () {
        $('#listakomp').show();
        $('#dodajkompetencije').show();
        $('#kreirajkompetencijudiv').hide();
        $('#prikazikompetencije').hide();
      });

      $('#kompt').click(function (event) {
        if ($('#kreirajkat').val() === null) {
          event.preventDefault();
          greske.innerHTML = "Nije odabran nikakav projekt!";
          $('#kreirajkat').css('border', '1px solid red');
        }
      });
      $('#kompetencijeform').submit(function (e) {
        greske.innerHTML = "";
        if ($.trim($("#kreirajkat").val()) === "") {
          $('#kreirajkat').css('border', '1px solid red');
          greske.innerHTML += "Naziv nije popunjen!" + "<br>"
          e.preventDefault();
        }
      });

      $('#adminform').submit(function (e) {
        greske3.innerHTML = "";
        if ($.trim($("#selkorisnici").val()) === "" || $.trim($("#selkorisnici").val()) === "--Odaberi korisnika--") {
          $('#selkorisnici').css('border', '1px solid red');
          greske3.innerHTML += "Nije odabran korisnik!" + "<br>"
          e.preventDefault();
        }
      });
      $('#cookieform').submit(function (e) {
        greske4.innerHTML = "";
        if ($.trim($("#vrijemekolacica").val()) === "") {
          $('#vrijemekolacica').css('border', '1px solid red');
          greske4.innerHTML += "Trajanje nije popunjeno!" + "<br>"
          e.preventDefault();
        }
      });

      $('#sesijaform').submit(function (e) {
        greske5.innerHTML = "";
        if ($.trim($("#vrijemesesije").val()) === "") {
          $('#vrijemesesije').css('border', '1px solid red');
          greske5.innerHTML += "Trajanje nije popunjeno!" + "<br>"
          e.preventDefault();
        }
      });
      break;
    case "Zadatak":
      $(".korisnicizadatak option").val(function (idx, val) {
        $(this).siblings('[value="' + val + '"]').remove();
      });
      break;
    case "Zadaci":

      $('#kreirajzad22').click(function (event) {
        if ($('#selekcijaprojektakrei').val() === null) {
          event.preventDefault();
          greske.innerHTML = "Nije odabran nikakav projekt!";
          $('#selekcijakategorijekrei').css('border', '1px solid red');
          $('#selekcijaprojektakrei').css('border', '1px solid red');
        }
      });

      $('#sakrijzadatke').hide();
      $('#sakrijkreiranje').hide();
      $('#prikazizad').hide();

      $('#selekcijakategorije').change(function () {
        $('#selekcijaprojekta').empty();
        var id_kategorija = document.getElementById("selekcijakategorije").value;
        console.log(id_kategorija);
        $.ajax({
          url: '../dohvati_podatke/dohvati_projekte.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_kategorija: id_kategorija
          },
          success: function (json) {
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {

                if (key2 === "id_projekt") {
                  id = value2;
                }
                if (key2 === "naziv_projekta") {
                  naziv = value2;
                }
              });
              $('#selekcijaprojekta').append($('<option>', {
                value: id,
                text: naziv
              }));
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            $('#selekcijaprojekta').append($('<option>', {
              value: "0",
              text: "Nema projekta za odabranu kategoriju!"
            }));
          }
        });
      });
      $('#selekcijakategorijekrei').change(function () {
        $('#selekcijaprojektakrei').empty();
        var id_kategorija = document.getElementById("selekcijakategorijekrei").value;
        var min;
        var max;
        console.log(id_kategorija);
        $.ajax({
          url: '../dohvati_podatke/dohvati_projekte.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_kategorija: id_kategorija
          },
          success: function (json) {
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {

                if (key2 === "id_projekt") {
                  id = value2;
                }
                if (key2 === "naziv_projekta") {
                  naziv = value2;
                }
                if (key2 === "min_iznos_donacija") {
                  min = value2;
                }
                if (key2 === "trenutni_iznos_donacija") {
                  max = value2;
                }

              });
              if (min <= max) {
                $('#selekcijaprojektakrei').append($('<option>', {
                  value: id,
                  text: naziv
                }));
              }
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            $('#selekcijaprojektakrei').append($('<option>', {
              value: "0",
              text: "Nema projekta za odabranu kategoriju!"
            }));
          }
        });
      });
      var tablica = $('#zadaci').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }

      });
      $('#prikaziprojekte').click(function () {
        tablica.clear();
        var id_projekt = document.getElementById("selekcijaprojekta").value;
        var datum_pocekta;
        var datum_zavrsetka;
        var opis;
        var ime;
        var prezime;
        var link;
        var link2;
        $.ajax({
          url: '../dohvati_podatke/dohvatizadatke.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_projekt: id_projekt
          },
          success: function (json) {
            tablica.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "id_zadatak") {
                  link = "<a href='../kategorije/zadatak.php?id=" + value2 + '&idproj=' + id_projekt + "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                  link2 = "<a href='../kategorije/obrisi.php?idzad=" + value2 + "'> \<i class='fa fa-trash' aria-hidden='true'></i></a>";
                }
                if (key2 === "opis") {
                  opis = value2;
                } if (key2 === "datum_pocetka") {
                  datum_pocekta = value2;
                } if (key2 === "datum_zavrsetka") {
                  datum_zavrsetka = value2;
                }
                if (key2 === "ime") {
                  ime = value2;
                }
                if (key2 === "prezime") {
                  prezime = value2;
                }
              });
              tablica.row.add([opis, datum_pocekta, datum_zavrsetka, ime + " " + prezime, link, link2]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica.row.add(["-", "-", "-", "-", "-", "-"]).draw(false);
          }
        });
        $('#sakrijzadatke').show();
      });
      $('#kreirajzad').click(function () {
        $('#sakrijkreiranje').show();
        $('#sakrijzadtke').hide();
        $('#kreirajzad').hide();
        $('#prikazizad').show();
      });
      $('#prikazizad').click(function () {
        $('#prikazizad').hide();
        $('#kreirajzad').show();
        $('#sakrijkreiranje').hide();
        $('#sakrijzadtke').show();
      });

      $('#filterfild').toggle();
      $('#toogle').click(function () {
        $('#filterfild').toggle();
      });

      $('#filter').click(function () {
        tablica.clear();
        var id_projekt = document.getElementById("selekcijaprojekta").value;
        var datum_pocetka = document.getElementById("date").value;
        var datum_zavrsetka = document.getElementById("dodate").value;
        var opis;
        var akronim;
        var naziv_kategorije;
        var datumpocetka;
        var datumzavrsetka;
        var opiszah;
        var mindonacije;
        var trenutnedonacija;
        $.ajax({
          url: '../dohvati_podatke/dohvatizadatke.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_projekt: id_projekt,
            datum_pocetka: datum_pocetka,
            datum_zavrsetka: datum_zavrsetka
          },
          success: function (json) {
            tablica.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "id_zadatak") {
                  link = "<a href='../kategorije/zadatak.php?id=" + value2 + '&idproj=' + id_projekt + "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                  link2 = "<a href='../kategorije/obrisi.php?idzad=" + value2 + "'> \<i class='fa fa-trash' aria-hidden='true'></i></a>";
                }
                if (key2 === "opis") {
                  opis = value2;
                } if (key2 === "datum_pocetka") {
                  datum_pocekta = value2;
                } if (key2 === "datum_zavrsetka") {
                  datum_zavrsetka = value2;
                }
                if (key2 === "ime") {
                  ime = value2;
                }
                if (key2 === "prezime") {
                  prezime = value2;
                }
              });
              tablica.row.add([opis, datum_pocekta, datum_zavrsetka, ime + " " + prezime, link, link2]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica.row.add(["-", "-", "-", "-", "-", "-"]).draw(false);
          }
        });
      });
      $('#ponisti').click(function () {
        tablica.clear();
        var id_projekt = document.getElementById("selekcijaprojekta").value;
        var datum_pocekta;
        var datum_zavrsetka;
        var opis;
        var ime;
        var prezime;
        var link;
        var link2;
        $.ajax({
          url: '../dohvati_podatke/dohvatizadatke.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_projekt: id_projekt
          },
          success: function (json) {
            tablica.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "id_zadatak") {
                  link = "<a href='../kategorije/zadatak.php?id=" + value2 + '&idproj=' + id_projekt + "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                  link2 = "<a href='../kategorije/obrisi.php?idzad=" + value2 + "'> \<i class='fa fa-trash' aria-hidden='true'></i></a>";
                }
                if (key2 === "opis") {
                  opis = value2;
                } if (key2 === "datum_pocetka") {
                  datum_pocekta = value2;
                } if (key2 === "datum_zavrsetka") {
                  datum_zavrsetka = value2;
                }
                if (key2 === "ime") {
                  ime = value2;
                }
                if (key2 === "prezime") {
                  prezime = value2;
                }
              });
              tablica.row.add([opis, datum_pocekta, datum_zavrsetka, ime + " " + prezime, link, link2]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica.row.add(["-", "-", "-", "-", "-", "-"]).draw(false);
          }
        });
        $('#sakrijzadatke').show();
      });

      break;
    case "Popis projekata":
      $('#sakrijkreiranje').hide();
      $('#sakrijsveprojekte').hide();
      $('#prikaziproj').hide();
      var buttonProjekti = $('#odaberiproj');
      var kreirajproj = $('#kreirajproj');
      buttonProjekti.click(function () {
        $('#sakrijkreiranje').hide();
        $('#sakrij2').show();
      });
      $('#prikaziproj').click(function () {
        $('#sakrijkreiranje').hide();
        $('#sakrij2').show();
        $('#prikaziproj').hide();
        $('#kreirajproj').show();
      });
      kreirajproj.click(function () {
        $('#sakrijkreiranje').show();
        $('#sakrij2').hide();
        $('#kreirajproj').hide();
        $('#prikaziproj').show();
      });
      var tablica2 = $('#odabranakategorija').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      tablica2.clear();
      $('#selekcijakategorije').change(function () {
        tablica2.clear();
        var id_kategorija = document.getElementById("selekcijakategorije").value;
        var naziv;
        var akronim;
        var datumpocetka;
        var datumzavrsetka;
        var opiszah;
        var mindonacije;
        var trenutnedonacija;
        var naziv;
        var stanje;
        var novcanostanje;
        $.ajax({
          url: '../dohvati_podatke/dohvati_projekte.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_kategorija: id_kategorija
          },
          success: function (json) {
            tablica2.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                console.log(key2, value2);
                if (key2 === "id_projekt") {
                  link = "<a href='../kategorije/projekt.php?id=" + value2 + "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                  link2 = "<a href='../kategorije/obrisi.php?id=" + value2 + "'> \<i class='fa fa-trash' aria-hidden='true'></i></a>";
                }
                if (key2 === "naziv_projekta") {
                  naziv = value2;
                } if (key2 === "akronim") {
                  akronim = value2;
                } if (key2 === "datum_pocetka") {
                  datumpocetka = value2;
                }
                if (key2 === "datum_zavrsetka") {
                  datumzavrsetka = value2;
                }
                if (key2 === "opis_zahtjeva") {
                  opiszah = value2;
                }
                if (key2 === "min_iznos_donacija") {
                  mindonacije = value2;
                } if (key2 === "trenutni_iznos_donacija") {
                  trenutnedonacija = value2;
                }
              });
              var dat = new Date(datumzavrsetka);
              if (dat < Date.now()) {
                stanje = "Projekt je završio" + "<br>";
                if (Number(trenutnedonacija) < Number(mindonacije)) {
                  novcanostanje = "Nije prikupljen minimalni iznos";
                } else {
                  novcanostanje = "";
                }
              } else {
                stanje = "Projekt je aktivan";
                novcanostanje = "";
              }
              tablica2.row.add([naziv, akronim, datumpocetka, datumzavrsetka, opiszah, mindonacije, trenutnedonacija, link, link2, stanje + novcanostanje]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica2.row.add(["-", "-", "-", "-", "-", "-", "-", "-", "-", "-"]).draw(false);
          }

        });
        $('#sakrijsveprojekte').show();
      });
      break;
    case "Popis kategorija":
      var tablica = $('#tablicakategorija').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }

      });
      $('#kreirajkatdiv').hide();
      $('#prikazikat').hide();
      var buttonKategorije = $('#odaberikat');
      var kreirajkat = $('#kreirajkat');
      buttonKategorije.click(function () {
        $('#sakrij1').show();
        $('#sakrij2').hide();
        $('#sakrijkreiranje').hide();
        $('#kreirajkatdiv').hide();
      });
      kreirajkat.click(function () {
        $('#sakrijkreiranje').hide();
        $('#sakrij1').hide();
        $('#sakrij2').hide();
        $('#kreirajkatdiv').show();
        $('#prikazikat').show();
        $('#kreirajkat').hide();
      });
      $('#prikazikat').click(function () {
        $('#prikazikat').hide();
        $('#sakrij1').show();
        $('#sakrij2').hide();
        $('#sakrijkreiranje').hide();
        $('#kreirajkatdiv').hide();
        $('#kreirajkat').show();
      });



      $('#pokusaj').submit(function (e) {
        greske.innerHTML = "";
        if ($.trim($("#kreirajkatinput").val()) === "") {
          $('#kreirajkatinput').css('border', '1px solid red');
          greske.innerHTML += "Naziv nije popunjen!" + "<br>"
          e.preventDefault();
        }
      });

      break;
    case "Kategorije":
      var table = $('#popiskategorija').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print', 'pdf'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });


      var table2 = $('#popisprojekata').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });


      var filtertable = $('#popisprojekatafilt').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      $('#filterfild').toggle();
      $('#toogle').click(function () {
        $('#filterfild').toggle();
      });
      $('#sakrijfilt').hide();

      $('#ponisti').click(function () {
        $('#sakrijfilt').hide();
        $('#sakrijproj').show();
      });

      $('#filter').click(function () {
        $('#sakrijfilt').show();
        $('#sakrijproj').hide();
        filtertable.clear();
        var datum_pocetka = document.getElementById("date").value;
        var datum_zavrsetka = document.getElementById("dodate").value;
        var naziv;
        var akronim;
        var naziv_kategorije;
        var datumpocetka;
        var datumzavrsetka;
        var opiszah;
        var mindonacije;
        var trenutnedonacija;
        $.ajax({
          url: 'dohvati_podatke/dohvati.php',
          type: 'get',
          dataType: 'json',
          data: {
            datum_pocetka: datum_pocetka,
            datum_zavrsetka: datum_zavrsetka
          },
          success: function (json) {
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "naziv_kategorije") {
                  naziv_kategorije = value2;
                }
                if (key2 === "naziv_projekta") {
                  naziv = value2;
                } if (key2 === "akronim") {
                  akronim = value2;
                } if (key2 === "datum_pocetka") {
                  datumpocetka = value2;
                }
                if (key2 === "datum_zavrsetka") {
                  datumzavrsetka = value2;
                }
                if (key2 === "opis_zahtjeva") {
                  opiszah = value2;
                }
                if (key2 === "min_iznos_donacija") {
                  mindonacije = value2;
                } if (key2 === "trenutni_iznos_donacija") {
                  trenutnedonacija = value2;
                }
              });
              filtertable.row.add([naziv, akronim, naziv_kategorije, datumpocetka, datumzavrsetka, opiszah, mindonacije, trenutnedonacija]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            filtertable.row.add(["-", "-", "-", "-", "-", "-", "-", "-"]).draw(false);
          }

        });
      });


      $('#sakrijprojekte').hide();
      var buttonKategorije = $('#odaberikategorije');
      var buttonProjekti = $('#odaberiprojekte');
      buttonKategorije.click(function () {
        $('#sakrijkategorije').show();
        $('#sakrijprojekte').hide();
      });
      buttonProjekti.click(function () {
        $('#sakrijkategorije').hide();
        $('#sakrijprojekte').show();
      });
      break;
    case "Uredi":
      break;
    case "Profil":
      var table = $('#zadaci').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }

      });
      var table2 = $('#zahtjevi').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      var table3 = $('#popiskompetencijatable').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      $('#popiszahtjevazasudjelovanje').hide();
      $('#popiskompetencija').hide();

      $('#popiszahtjeva').click(function () {
        $('#popiszadataka').hide();
        $('#popiskompetencija').hide();
        $('#popiszahtjevazasudjelovanje').show();
      });
      $('#popiszad').click(function () {
        $('#popiszadataka').show();
        $('#popiskompetencija').hide();
        $('#popiszahtjevazasudjelovanje').hide();
      });
      $('#dodajkomp').click(function () {
        $('#popiszadataka').hide();
        $('#popiskompetencija').show();
        $('#listakomp').show();
        $('#popiszahtjevazasudjelovanje').hide();
        $('#dodajkompeten').hide();
        $('#prikazikompetencije').hide();
        $('#dodajkompetencije').show();
      });

      $('#dodajkompetencije').click(function () {
        $('#dodajkompetencije').hide();
        $('#dodajkompeten').show();
        $('#prikazikompetencije').show();
        $('#popiszadataka').hide();
        $('#popiskompetencija').show();
        $('#listakomp').hide();
        $('#popiszahtjevazasudjelovanje').hide();

      });
      $('#prikazikompetencije').click(function () {
        $('#dodajkompetencije').show();
        $('#prikazikompetencije').hide();
        $('#dodajkompeten').hide();
        $('#popiszadataka').hide();
        $('#popiskompetencija').show();
        $('#listakomp').show();
        $('#popiszahtjevazasudjelovanje').hide();

      });

      break;
    case "Korisnici":
      var tablica = $('#korisnicikompetencije').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "buttons": [
          'print'
        ], "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      $('#sakrijtab').hide();
      $('#kompentencije').change(function () {
        var id_kompetencije = document.getElementById("kompentencije").value;
        var ime;
        var prezime;
        var korisnicko_ime;
        $.ajax({
          url: '../dohvati_podatke/dohvati_korisnike.php',
          type: 'get',
          dataType: 'json',
          data: {
            id_kompetencije: id_kompetencije
          },
          success: function (json) {
            tablica.clear();
            $.each(json, function (key, value) {
              $.each(value, function (key2, value2) {
                if (key2 === "id_korisnik") {
                  link = "<a href='../kategorije/zahtjevzasudjelovanje.php?id=" + value2 + "'><i class='fa fa-plus' aria-hidden='true'></i></i></a>";
                }
                if (key2 === "ime") {
                  ime = value2;
                } if (key2 === "prezime") {
                  prezime = value2;
                } if (key2 === "korisnicko_ime") {
                  korisnicko_ime = value2;
                }
              });
              tablica.row.add([ime, prezime, korisnicko_ime, link]).draw(false);
            });
          }, error: function (xhr, ajaxOptions, thrownError) {
            tablica.clear();
            tablica.row.add(["-", "-", "-", "-"]).draw(false);
          }
        });
        $('#sakrijtab').show();
      });
      break;
    case "Promjeni lozinku":
      break;
    case "Dokumentacija":
      var tablica = $('#tablicaskripata').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "pageLength": brojredaka,
        "dom": 'Bfrtip',
        "language": {
          search: '<i class="fa fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Pretraži',
          "oPaginate": {
            "sFirst": "Prva",
            "sLast": "Zadnja",
            "sNext": "Sljedeća",
            "sPrevious": "Prethodna"
          }
        }
      });
      break;

  }
});
