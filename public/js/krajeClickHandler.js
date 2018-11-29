$(document).ready(function () {
    $('.clickMenu').click(function (e) {
        switch (e.target.id) {
            case 'BC':
                if (document.getElementById('okresyBC').style.display === "none") {
                    $('#okresyBC').show();
                } else {
                    $('#okresyBC').hide();
                }
                break;
            case 'BL':
                if (document.getElementById('okresyBL').style.display === "none") {
                    $('#okresyBL').show();
                } else {
                    $('#okresyBL').hide();
                }
                break;
            case 'KI':
                if (document.getElementById('okresyKI').style.display === "none") {
                    $('#okresyKI').show();
                } else {
                    $('#okresyKI').hide();
                }
                break;
            case 'NI':
                if (document.getElementById('okresyNI').style.display === "none") {
                    $('#okresyNI').show();
                } else {
                    $('#okresyNI').hide();
                }
                break;
            case 'PV':
                if (document.getElementById('okresyPV').style.display === "none") {
                    $('#okresyPV').show();
                } else {
                    $('#okresyPV').hide();
                }
                break;
            case 'TA':
                if (document.getElementById('okresyTA').style.display === "none") {
                    $('#okresyTA').show();
                } else {
                    $('#okresyTA').hide();
                }
                break;
            case 'TC':
                if (document.getElementById('okresyTC').style.display === "none") {
                    $('#okresyTC').show();
                } else {
                    $('#okresyTC').hide();
                }
                break;
            case 'ZI':
                if (document.getElementById('okresyZI').style.display === "none") {
                    $('#okresyZI').show();
                } else {
                    $('#okresyZI').hide();
                }
                break;
        }
    });
});