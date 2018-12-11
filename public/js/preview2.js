$(document).ready(function() {
    var IDs = [];
    var input = document.createElement("input");
    input.type = "hidden";
    input.name = 'ids';
    input.className = "imagesInput";


    $('#form').append(input);

    $('#zoznamObrazkov').children().each(function(index){
        var lastid = $(".element:last").attr("id");
        var split_id = lastid.split("_");
        var nextindex = Number(split_id[1]) + 1;
        var para = document.createElement('p');
        var image = document.createElement('img');
        image.src = this.children[0].children[0].src;

        $(".element:last").after("<div class='element' id='div_" + nextindex + "'></div>");
        $("#div_" + nextindex).append("<span id='remove_" + nextindex + "' class='remove'>X</span>");
        $("#remove_" + nextindex).append("<span style='display: none' id='" + this.id + "'></span>");
        $("#div_" + nextindex).append(image);
        $("#div_" + nextindex).append(para);

        $('.remove').click(function(){
            IDs.push(this.children[0].id);

            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];

            // Remove <div> with id
            $("#div_" + deleteindex).remove();
            event.stopPropagation();
            event.preventDefault();
        });
    });

    var input = $('#fileInput')[0];

    input.addEventListener('change', updateImageDisplay, false); // pri opatovnom nahravani dvoch alebo viac obrazkov nechce nahrat
    function updateImageDisplay() {
        var curFiles = input.files;

        if(curFiles.length === 0) {
        } else {
            for(var i = 0; i < curFiles.length; i++) {
                // if(isThere(curFiles[i].name)){
                //     alert('uz sa tam nachadza');
                // }
                // else(alert('neni'))
                // alert(isThere(curFiles[i]));
                var lastid = $(".element:last").attr("id");
                var split_id = lastid.split("_");
                var nextindex = Number(split_id[1]) + 1;
                var para = document.createElement('p');

                // para.textContent = 'Súbor ' + curFiles[i].name + ', veľkosť ' + returnFileSize(curFiles[i].size) + '.';
                var image = document.createElement('img');
                image.src = window.URL.createObjectURL(curFiles[i]);
                // alert(curFiles[i].name);
                $(".element:last").after("<div class='element' id='div_" + nextindex + "'></div>");
                $("#div_" + nextindex).append("<span id='remove_" + nextindex + "' class='remove'>X</span>");
                $("#div_" + nextindex).append(image);
                $("#div_" + nextindex).append(para);

                // var lastPic = $('li:last').data-target;
                // $('li:last').after('<li><a data-target="'+lastPic+'" data-toggle="tab"><img src="'+this.children[0].children[0].src+'" /></a></li>');

                $('.remove').click(function(){
                    var id = this.id;
                    var split_id = id.split("_");
                    var deleteindex = split_id[1];

                    // Remove <div> with id
                    $("#div_" + deleteindex).remove();
                    event.stopPropagation();
                    event.preventDefault();
                });
            }
        }
    }

    function setIDs(){
         // IDs = [];
        //  $('#containerImages').children().each(function (index) {
        //     if (index != 0) {
        //         // console.log(this.children[1].id);
        //         // var pos = this.children[1].src.indexOf("8000") + 4;
        //         // var url = this.children[1].src.substring(pos, this.children[1].src.length);
        //         // console.log(this.children[1].src);
        //         // if (url.substring(0, 7) === '/images') {
        //         //     images[index - 1] = url;
        //         // } else {
        //         //     images[index - 1] = '/images' + url;
        //         // }
        //         // IDs[index] = this.name;
        //     }
        // });
        var uniqueNames = [];
        $.each(IDs, function(i, el){
            if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
        });

        $('.imagesInput').val(JSON.stringify(uniqueNames));
        // console.log($('.imagesInput').val());
    }

    // function isThere(name){
    //     var zhoda = false;
    //     $('#containerImages').children().each(function (index) {
    //         if (index != 0) {
    //             // alert(this.children[1].src.substring(39, this.children[1].src.length));
    //             if (name == this.children[1].src.substring(39, this.children[1].src.length)) {
    //                 zhoda = true;
    //             }
    //         }
    //     });
    //     return zhoda;
    // }

    document.body.addEventListener('click', function(){
        setIDs();
    }, true);

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