$(document).ready(function () {
    const token = JSON.parse(localStorage.getItem("token"));

    if (token === null) {
        Swal.fire({
            title: "Akses Ditolak",
            text: "Silahkan login karyawan terlebih dahulu",
            icon: "error",
            confirmButtonText: "Mengerti",
            confirmButtonColor: "#FA896B",
            backdrop: "rgba(0,0,0,1)",
            showConfirmButton: false,
            timer: 2000,
        }).then(() => {
            window.location.href = url_dashboard;
        });
    }

    btn_hash.on("click", function (e) {
        e.preventDefault();

        let password = $("#password").val();
        if (password === "") {
            Swal.fire({
                title: "Error",
                text: "Password tidak boleh kosong",
                icon: "error",
                confirmButtonText: "Mengerti",
                confirmButtonColor: "#FA896B",
            });
        }

        btn_hash.fadeOut(500);
        modal_compare.find("form").append(hashed_password_component);

        let password_and_salt = password + salt;
        $("#hashed-password").val(password_and_salt);

        modal_compare.on("click", ".btn-encrypt", function (e) {
            e.preventDefault();

            $(".btn-encrypt").fadeOut(500);
            let hashed_password = md5(password_and_salt);
            modal_compare.find("#form").append(new_hashed_password_component);
            $("new-hashed-password").val(hashed_password);

            if (hashed_password === old_hashed_password) {
                if (modal_compare.modal("hide")) {
                    Swal.fire({
                        title: "Password Cocok!",
                        html: `
                        <div class="my-2 alert alert-info text-center" role="alert">
                            <h6 class="fw-semibold mb-2 fs-3">Old Password Hashed</h6>
                            <p class="m-0 fs-3 fw-bolder">${old_hashed_password}</p>
                        </div>
                        <div class="my-2 alert alert-success text-center" role="alert">
                            <h6 class="fw-semibold mb-2 fs-3">New Password Hashed</h6>
                            <p class="m-0 fs-3 fw-bolder">${hashed_password}</p>
                            
                            <h6 class="fw-semibold mt-2 fs-3">Password Anda</h6>
                            <p class="m-0 fs-3 fw-bolder password-result">${password}</p>
                        </div>`,
                        icon: "success",
                        confirmButtonText: "Ok",
                        confirmButtonColor: "#31BEA4",
                        customClass: {
                            title: "fs-6",
                        },
                    }).then((res) => {
                        if (res.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            } else {
                if (modal_compare.modal("hide")) {
                    Swal.fire({
                        title: "Password Tidak Cocok!",
                        html: `
                        <div class="my-2 alert alert-info text-center" role="alert">
                            <h6 class="fw-semibold mb-2 fs-3">Old Password Hashed</h6>
                            <p class="m-0 fs-3 fw-bolder">${old_hashed_password}</p>
                        </div>
                        <div class="my-2 alert alert-danger text-center" role="alert">
                            <h6 class="fw-semibold mb-2 fs-3">New Password Hashed</h6>
                            <p class="m-0 fs-3 fw-bolder">${hashed_password}</p>
                            
                            <h6 class="fw-semibold mt-2 fs-3">Password Anda</h6>
                            <p class="m-0 fs-3 fw-bolder password-result">${password}</p>
                        </div>
                        `,
                        icon: "error",
                        confirmButtonText: "Ok",
                        confirmButtonColor: "#CA7157",
                        customClass: {
                            title: "fs-6",
                        },
                    }).then((res) => {
                        if (res.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });

        // modal_compare.on("click", ".btn-encrypt", function (e) {

        // });

        // modal_compare.on("click", ".btn-encrypt", function (e) {
        //     e.preventDefault();

        //     $(".btn-encrypt").fadeOut(500);
        //     let hashed_password = md5(password_and_salt);
        //     modal_compare.find("#form").append(new_hashed_password_component);
        //     $("new-hashed-password").val(hashed_password);

        //     if (hashed_password === old_hashed_password) {
        //         modal_compare.find("form").append(alert_success);
        //         modal_compare.find("form").append(modal_footer);
        //         if (modal_compare.modal("hide")) {
        //             Swal.fire({
        //                 title: "Berhasil",
        //                 text: "Password berhasil didekripsi",
        //                 icon: "success",
        //                 confirmButtonText: "Mengerti",
        //                 confirmButtonColor: "#FA896B",
        //             }).then((res) => {
        //                 if (res.isConfirmed) {
        //                     location.reload();
        //                 }
        //             });
        //         }
        //     } else {
        //         modal_compare.find("form").append(alert_danger);
        //         modal_compare.find("form").append(modal_footer);
        //         if (modal_compare.modal("hide")) {
        //             Swal.fire({
        //                 title: "Gagal",
        //                 text: "Password gagal didekripsi",
        //                 icon: "error",
        //                 confirmButtonText: "Mengerti",
        //                 confirmButtonColor: "#FA896B",
        //             }).then((res) => {
        //                 if (res.isConfirmed) {
        //                     location.reload();
        //                 }
        //             });
        //         }
        //     }
        // });
    });
});
