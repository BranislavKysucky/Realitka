$(document).ready(function() {
    var input = $('#fileInput')[0];
    var preview = $('#container')[0];

    var total_element = $(".element").length;

    input.addEventListener('change', updateImageDisplay, false); // pri opatovnom nahravani dvich alebo viac obrazkov nechce nahrat
    function updateImageDisplay() {
        var curFiles = input.files;
        if(curFiles.length === 0) {
        } else {
            for(var i = 0; i < curFiles.length; i++) {
                var lastid = $(".element:last").attr("id");
                var split_id = lastid.split("_");
                var nextindex = Number(split_id[1]) + 1;
                var para = document.createElement('p');
                // if(validFileType(curFiles[i])) {
                para.textContent = 'Súbor ' + curFiles[i].name + ', veľkosť ' + returnFileSize(curFiles[i].size) + '.';
                var image = document.createElement('img');
                image.src = window.URL.createObjectURL(curFiles[i]);
                $(".element:last").after("<div class='element' id='div_" + nextindex + "'></div>");
                $("#div_" + nextindex).append("<span id='remove_" + nextindex + "' class='remove'>X</span>");
                $("#div_" + nextindex).append(image);
                $("#div_" + nextindex).append(para);
                // } else {
                //     para.textContent = 'Súbor ' + curFiles[i].name + ': Formát obrázku nepodporovaný.';
                //     listItem.appendChild(para);
                // }
                $('.remove').click(function(){
                    var id = this.id;
                    var split_id = id.split("_");
                    var deleteindex = split_id[1];

                    // Remove <div> with id
                    $("#div_" + deleteindex).remove();
                    event.preventDefault();
                });
            }
        }
    }
    // var fileTypes = [
    //     'image/jpeg',
    //     'image/jpeg',
    //     'image/png'
    // ]

    // function validFileType(file) {
    //     for(var i = 0; i < fileTypes.length; i++) {
    //         if(file.type === fileTypes[i]) {
    //             return true;
    //         }
    //     }
    //
    //     return false;
    // }
    function returnFileSize(number) {
        if(number < 1024) {
            return number + 'bytes';
        } else if(number >= 1024 && number < 1048576) {
            return (number/1024).toFixed(1) + 'KB';
        } else if(number >= 1048576) {
            return (number/1048576).toFixed(1) + 'MB';
        }
    }
});