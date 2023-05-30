console.log("main.js loaded");

$("#createForm").submit(function (e) {
    e.preventDefault();
    let msg = $("#msg");
    //formData
    // let formData = {
    //     firstname: $(".createForm input[name=firstname]").val(),
    //     lastname: $(".createForm input[name=lastname]").val(),
    //     email: $(".createForm input[name=email]").val(),
    // };

    var formData = $(this).serialize();
    console.log(formData);

    $.ajax({
        url: "/profile/store",
        method: "post",
        data: formData,
        "_token": "{{ csrf_token() }}",
        success: function (data) {
            console.log(data);

            if (data.errors) {
                // alert(data.errors.firstname);
                $('#firstname-error').text(data.errors.firstname ? data.errors.firstname[0] : '');
                $('#lastname-error').text(data.errors.lastname ? data.errors.lastname[0] : '');
                $('#email-error').text(data.errors.email ? data.errors.email[0] : '');
            }
            // If validation passes
            else {
                $(msg).append(
                            `<div class="alert alert-success" id="alert_msg">Profile added successfully</div>`
                        );
                        $("#showData").append(`
                    <tr>
                        <td>${data.firstname}</td>
                        <td>${data.lastname}</td>
                        <td>${data.email}</td>
                        <td>
                            <a href="/profile/${data.id}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <a href="/profile/${data.id}/delete" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    `);
                        // $(".createForm input[name=firstname]").val("");
                        // $(".createForm input[name=lastname]").val("");
                        // $(".createForm input[name=email]").val("");
                        //reset form
                        $('#createForm')[0].reset();

                        $("#addModal").modal("hide");
            
                        setTimeout(() => {
                            $("#alert_msg").remove();
                        }, 3000);
            }

        },

       });

    });