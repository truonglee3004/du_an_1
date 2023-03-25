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
    <section class="container relative mx-auto mt-4">
        <div class="uppercase text-lg">
            <h2>thêm mới loại hàng</h2>
        </div>
        <form action="index.php?act=adddm" method="post" class="mt-4">
            <div>
                Mã loại <br />
                <input type="text" name="maloai" disabled class="w-full border" />
            </div>
            <div>
                Tên loại <br />
                <input type="text" name="tenloai" class="w-full border" />
            </div>
            <div class="mt-2 flex gap-4">
                <button>
                    <input type="Submit" value="THÊM MỚI" name="themmoi" class="border border-solid border-black bg-gray-200 w-24" />
                </button>
                <button class="border border-solid border-black bg-gray-200 w-24">
                    <input type="reset" value="NHẬP LẠI" />
                </button>
                <a href="index.php?act=listdm"><button class="border border-solid border-black bg-gray-200 w-24">
                        DANH SÁCH
                    </button></a>

            </div>
            <?
            if (isset($thongbao) && ($thongbao = !'')) echo $thongbao;
            ?>
        </form>
    </section>
</body>

</html>