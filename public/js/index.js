$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    var current_fs, next_fs, previous_fs;

    var steps = $(".card-body").length;
    var current = 1;

    setProgressBar(current);

    $(".next").click(function () {
        current_fs = $(this).parent().parent();
        next_fs = $(this).parent().parent().next();

        $(current_fs).removeClass("show");
        $(next_fs).addClass("show");

        current_fs.animate({}, {
            step: function () {

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });

                next_fs.css({
                    'display': 'block'
                });
            }
        });
        setProgressBar(++current);
        var c = document.getElementById('cnt').textContent;
        document.getElementById('cnt').textContent = Number(c) + 25;
    });

    $(".prev").click(function () {

        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        $(current_fs).removeClass("show");
        $(previous_fs).addClass("show");

        current_fs.animate({}, {
            step: function () {

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });

                previous_fs.css({
                    'display': 'block'
                });
            }
        });
        setProgressBar(--current);
        var c = document.getElementById('cnt').textContent;
        document.getElementById('cnt').textContent = Number(c) - 25;
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    $('.radio-group .radio').click(function () {
        $('.selected .fa').removeClass('fa-check');
        $('.selected .fa').addClass('fa-circle');
        $('.radio').removeClass('selected');
        $(this).addClass('selected');
        $('.selected .fa').removeClass('fa-circle');
        $('.selected .fa').addClass('fa-check');
    });
    function getchild(id){
        $.ajax({
            url:'category/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                let len = 0;
                $('#parent').empty(); // Empty <tbody>
                if (response['data'] != null) {
                    len = response['data'].length;
                }
                if (len > 0) {
                    for(var i=0; i<len; i++){
                        let  tr_str = "<div class=\"card-block radio selected\" data-toggle=\"tooltip\" title=\"+response[]+\">" +
                            "<div class=\" row justify-content-end d-flex px-3\">\n" +
                            "<div class=\"fa fa-check\"></div>\n" +
                            "</div>" +
                            "<div class=\"row justify-content-center d-flex\">" +
                            "<div class=\"pic\"> <img src=\"{{asset("+ response['data'][i].image_icon +")}}\" class=\"pic-0\"> </div>" +
                            "<h5 class=\"mb-4\">"+ response['data'][i].name  +"</h5>" +
                            "</div>";

                        $("#parent").append(tr_str);
                    }
                }
            }
        });

    }

});
