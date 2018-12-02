



    $(document).ready(function()
    {
        $('input[name=vymera_domu]').val("0");
        $("#vymera_domu").hide().find(':input').attr('required', false);
        $('input[name=vymera_pozemku]').val("0");

        $("#vymera_pozemku").hide().find(':input').attr('required', false);
        $("#uzitkova_plocha").show().find(':input').attr('required', true);



        $("#druh").change(function() {

            if ($('#druh :selected').parent().attr('id') == "Byty")   // Byty
            {
                $('input[name=vymera_domu]').val("0");
                $("#vymera_domu").hide().find(':input').attr('required', false);

                $('input[name=vymera_pozemku]').val("0");
                $("#vymera_pozemku").hide().find(':input').attr('required', false);

                $("#uzitkova_plocha").show().find(':input').attr('required', true);
                $("#stavy").show();
                $("#stavy_label").show();
            }
            else if ($('#druh :selected').parent().attr('id') == "Domy")  // Domy
            {
                $("#vymera_domu").show().find(':input').attr('required', true);
                $("#vymera_pozemku").show().find(':input').attr('required', true);

                $('input[name=uzitkova_plocha]').val("0");
                $("#uzitkova_plocha").hide().find(':input').attr('required', false);

                $("#stavy").show();
                $("#stavy_label").show();

            }
            else if ($('#druh :selected').parent().attr('id') == "Priestory")  // Priestory
            {

                $('input[name=vymera_domu]').val("0");
                $("#vymera_domu").hide().find(':input').attr('required', false);

                $('input[name=vymera_pozemku]').val("0");
                $("#vymera_pozemku").hide().find(':input').attr('required', false);


                $("#uzitkova_plocha").show().find(':input').attr('required', true);
                $("#stavy").show();
                $("#stavy_label").show();

            }

            else if ($('#druh :selected').parent().attr('id') == "Pozemky")         // Pozemky
            {
                $('input[name=vymera_domu]').val("0");
                $("#vymera_domu").hide().find(':input').attr('required', false);


                $("#vymera_pozemku").show().find(':input').attr('required', true);

                $('input[name=uzitkova_plocha]').val("0");
                $("#uzitkova_plocha").hide().find(':input').attr('required', false);

                $("#stavy").val(null);
                $("#stavy").hide();
                $("#stavy_label").hide();

            }
        });



        $("#typ").change(function() {                                               // Typy

            if ($('#typ :selected').attr('id') == "Kúpa" || $('#typ :selected').attr('id') == "Výmena" || $('#typ :selected').attr('id') == "Dražba") {

                $("#cena_dohodou").val(null);
                $("#cena_dohodou").hide();

            } else {
                $("#cena_dohodou").show();
            }



        });




    });

