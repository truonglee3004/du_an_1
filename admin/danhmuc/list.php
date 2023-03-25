<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <div class="mt-4 container mx-auto bg-gray-400 border-black border text-lg font-semibold uppercase h-12 justify-center align-middle">
        <h2>danh sách loại hàng</h2>
    </div>

    <section class="container max-w-7xl mx-auto mt-4">
        <div class="ml-0">
            <table class=" text-center">
                <tr>
                    <th></th>
                    <th class="w-60">MÃ LOẠI</th>
                    <th class="w-60">TÊN LOẠI</th>
                    <th class="w-60"></th>
                </tr>

                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id" . $id;
                    $xoadm = "index.php?act=xoadm&id" . $id;
                    echo '
                <tr>
                <td><input type="checkbox" id="""></td>
                <td  class="uppercase">' . $id . '</td>
                <td  class="uppercase">' . $cata_name . '</td>
                <td class="w-60 flex gap-3">
                <a href="' . $suadm . '"><input type="button" value="Sửa" class="border border-solid border-black bg-gray-200 w-10"></a>
                <a href="' . $xoadm . '"><input type="button" value="Xóa" class="border border-solid border-black bg-red-300 w-10"></a>
                </td>
                </tr>
                ';
                }
                ?>
            </table>
        </div>

        <div class="mt-2 flex gap-4">
            <button>
                <input type="button" value="Chọn tất cả" id="selectAll" class="border border-solid border-black bg-gray-200 w-auto" />
            </button>
            <button>
                <input type="button" value="Bỏ chọn tất cả" class="border border-solid border-black bg-gray-200 w-auto" />
            </button>
            <button>
                <input type="button" value="Xóa các mục đã chọn" class="border border-solid border-black bg-gray-200 w-auto" />
            </button>
        </div>
    </section>
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
    </script>



</body>

</html>