$(window).on("load", function(){
    $("form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: action,
            data: data,
            type: "post",
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (su) {
                ajax_load("close");

                setTimeout(function(){  

                if (su.message) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })

                      Toast.fire({
                        icon: '' + su.message.type + '',
                        title: '' + su.message.message + ''
                      })
                      
              
                    return;
                }

                if (su.redirect) {
                    window.location.href = su.redirect.url;
                }

            },650)
            
            }
        });

        function ajax_load(action) {
            ajax_load_div = $(".ajax_load");

            if (action === "open") {
                ajax_load_div.fadeIn(450).css("display", "flex");
            }

            if (action === "close") {
                ajax_load_div.fadeOut(500);
            }
        }
    });
});