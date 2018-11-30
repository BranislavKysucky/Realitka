



$(document).ready(function()
{








    if($('input[name=vymera_pozemku]').val() == "") {
        console.log($('input[name=vymera_pozemku]').val() + "pozemek");
        $("#vymera_pozemku").hide().find(':input').attr('required', false);
    }


    if($('input[name=uzitkova_plocha]').val() == "") {
        console.log($('input[name=uzitkova_plocha]').val() + "plocha");
        $("#uzitkova_plocha").hide().find(':input').attr('required', true);
    }

    if($('input[name=vymera_domu]').val() == "") {
        console.log($('input[name=vymera_domu]').val() + "dom");
        $("#vymera_domu").hide().find(':input').attr('required', true);
    }


    $("#druh").change(function() {

        if ($('#druh :selected').parent().attr('id') == "Byty")   // Byty
        {
            $("#vymera_domu").hide().find(':input').attr('required', false);
            $("#vymera_pozemku").hide().find(':input').attr('required', false);
            $("#uzitkova_plocha").show().find(':input').attr('required', true);
            $("#stavy").show();
            $("#stavy_label").show();
        }
        else if ($('#druh :selected').parent().attr('id') == "Domy")  // Domy
        {
            $("#vymera_domu").show().find(':input').attr('required', true);
            $("#vymera_pozemku").show().find(':input').attr('required', true);
            $("#uzitkova_plocha").hide().find(':input').attr('required', false);
            $("#stavy").show();
            $("#stavy_label").show();

        }
        else if ($('#druh :selected').parent().attr('id') == "Priestory")  // Priestory
        {
            $("#vymera_domu").hide().find(':input').attr('required', false);
            $("#vymera_pozemku").hide().find(':input').attr('required', false);
            $("#uzitkova_plocha").show().find(':input').attr('required', true);
            $("#stavy").show();
            $("#stavy_label").show();

        }

        else if ($('#druh :selected').parent().attr('id') == "Pozemky")         // Pozemky
        {
            $("#vymera_domu").hide().find(':input').attr('required', false);
            $("#vymera_pozemku").show().find(':input').attr('required', true);
            $("#uzitkova_plocha").hide().find(':input').attr('required', false);
            $("#stavy").hide();
            $("#stavy_label").hide();

        }
    });



    $("#typ").change(function() {                                               // Typy

        if ($('#typ :selected').attr('id') == "Kúpa" || $('#typ :selected').attr('id') == "Výmena" || $('#typ :selected').attr('id') == "Dražba") {

            $("#cena_dohodou").hide();

        } else {
            $("#cena_dohodou").show();
        }



    });



});

