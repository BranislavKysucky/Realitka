


function hideCena_dohodou() {


    var name = $.trim( $('input#cena').val() ); // get the value of the input field


    if((name == "") || (name == 0)) {
        $("#cena_dohodou").show();
        $('input:radio[name=cena_dohodou]')[0].checked = true;
        $('input:radio[name=cena_dohodou]')[1].val("true");
        hideCena();
    } else {
        $('input:radio[name=cena_dohodou]')[1].checked = true;
        $('input:radio[name=cena_dohodou]')[1].val("false");
        $("#cena_dohodou").hide();


    }

}




function hideCena() {

    if ($('input:radio[name=cena_dohodou]')[0].checked == true) {
        $.trim( $('input#cena').val(""));
        $("#cena").hide();
    } else {

        $("#cena").show();
    }



}




