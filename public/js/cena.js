






function hideCena_dohodou() {


    var name = $.trim( $('input#cena').val() ); // get the value of the input field



    if(!$.isNumeric( name ) || name == 0) {
        $("#cena_dohodou").show();
        $('input:radio[name=cena_dohodou]')[0].checked = true;

        hideCena();
    } else {
        $('input:radio[name=cena_dohodou]')[1].checked = true;
        $("#cena_dohodou").hide();



    }

}




function hideCena() {

    if ($('input:radio[name=cena_dohodou]')[0].checked == true) {
        $('input[name=cena]').val("");
        $("#cena").hide().find(':input').attr('required', false);


    } else {

        $("#cena").show().find(':input').attr('required', true);
    }



}




