</main>
<footer class="bg-light">
    <div class="text-center p-3" style="background:#e3f2fd;">
        Copyright &copy; 2023
    </div>
</footer>
<script>

    var id = '';
    var nama = '';
    var alamat = '';

    // // When the user scrolls the page, execute myFunction
    // window.onscroll = function () { myFunction() };

    // // Get the header
    // var header = document.getElementById("myHeader");
    // var sidebar = document.getElementById("mySidebar");

    // // Get the offset position of the navbar
    // var sticky = header.offsetTop;
    // var sticky1 = sidebar.offsetTop;

    // // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    // function myFunction() {
    //     if (window.pageYOffset > sticky) {
    //         header.classList.add("sticky");
    //     } else {
    //         header.classList.remove("sticky");
    //     }

    //     if (window.pageYOffset > sticky1) {
    //         header.classList.add("sticky1");
    //     } else {
    //         header.classList.remove("sticky1");
    //     }
    // }

    $(document).ready(function () {
        $('#summernote').summernote({
            callbacks: {
                onImageUpload: function (files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                }
            },
            height: 200,
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["insert", ["link", "picture", "imageList", "video", "hr"]],
                ["help", ["help"]]
            ],
            dialogsInBody: true,
            imageList: {
                endpoint: "daftar_gambar.php",
                fullUrlPrefix: "../gambar/",
                thumbUrlPrefix: "../gambar/"
            }
        });
        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajax({
                method: 'POST',
                url: 'upload_gambar.php',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('#summernote').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
    });

    //Plus Minus Input Counter

    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });

        // const plus = document.querySelector(".plus"),
        //                 minus = document.querySelector(".plus"),
        //                 hitung = document.querySelector(".hitung");

        //             let a = 0;

        //             plus.addEventListener("click", () => {
        //                 a++;
        //                 a = (a < 10) ? "0" + a : a;
        //                 hitung.innerHTML = a;
        //                 console.log(a);
        //             })

        //             minus.addEventListener("click", () => {
        //                 if (a > 0) {
        //                     a--;
        //                     a = (a < 10) ? "0" + a : a;
        //                     hitung.innerHTML = a;
        //                 }
        //             })

    // const plus = document.querySelector(".plus"),
    //                     minus = document.querySelector(".plus"),
    //                     hitung = document.querySelector(".hitung");

    //                 let a = 0;

    //                 plus.addEventListener("click", () => {
    //                     a++;
    //                     a = (a < 10) ? "0" + a : a;
    //                     hitung.innerHTML = a;
    //                     console.log(a);
    //                 })

    //                 minus.addEventListener("click", () => {
    //                     if (a > 0) {
    //                         a--;
    //                         a = (a < 10) ? "0" + a : a;
    //                         hitung.innerHTML = a;
    //                     }
    //                 })

</script>
</body>

</html>