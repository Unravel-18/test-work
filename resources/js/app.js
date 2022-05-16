require('./bootstrap');

$(document).ready(function () {

    let settings = {
        url: 'http://work-test.zzz.com.ua/api/users',
        method: 'get',
        success: function (data) {
            let string1 = JSON.stringify(data);
            let result = JSON.parse(string1);

            $(function () {
                $('#show-more').click(function () {
                    let $target = $(this);
                    let page = $target.attr('data-page');
                    page++;

                    $.ajax({
                        url: 'http://work-test.zzz.com.ua/api/users?page=' + page,
                        method: 'get',
                        success: function (data) {
                            let str = JSON.stringify(data);
                            let res = JSON.parse(str);
                            for (let i = 0; i < res.data.length; i++) {
                                $(" <tr></tr><td id = \"id-field\" >" + res.data[i].id + "</td>").appendTo($("#table1"));
                                $(" <td id = \"name-field\" >" + res.data[i].name + "</td><").appendTo($("#table1"));
                                $(" <td id = \"email-field\" >" + res.data[i].email + "</td>").appendTo($("#table1"));
                                $(" <td id = \"phone-field\" >" + res.data[i].phone + "</td>").appendTo($("#table1"));
                                $(" <td id = \"photo-field\" >" + res.data[i].photo + "</td>").appendTo($("#table1"));
                                $(" <td id = \"created_at-field\" >" + res.data[i].created_at + "</td></tr>").appendTo($("#table1"));

                            }
                        }
                    });

                    $target.attr('data-page', page);
                    let length = result.meta.links.length
                    if (page === (length - 2)) {
                        $target.hide();
                    }

                    return false;
                });
            });
        }
    }

    $.ajax(settings).done(function (response) {
        for (let i = 0; i < response.data.length; i++) {
            $(" <tr></tr><td id = \"id-field\" >" + response.data[i].id + "</td>").appendTo($("#table1"));
            $(" <td id = \"name-field\" >" + response.data[i].name + "</td><").appendTo($("#table1"));
            $(" <td id = \"email-field\" >" + response.data[i].email + "</td>").appendTo($("#table1"));
            $(" <td id = \"phone-field\" >" + response.data[i].phone + "</td>").appendTo($("#table1"));
            $(" <td id = \"photo-field\" >" + response.data[i].photo + "</td>").appendTo($("#table1"));
            $(" <td id = \"created_at-field\" >" + response.data[i].created_at + "</td></tr>").appendTo($("#table1"));

        }
    });

    $("#form_data").on("submit", function (ev) {
        ev.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: 'http://work-test.zzz.com.ua/api/users',
            type: "POST",
            data: formData,
            success: function (msg) {
                alert(msg)
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});

