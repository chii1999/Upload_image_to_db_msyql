<?php
@include_once("config.php");
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $sql = mysqli_query($conn, "SELECT * FROM user where id='$id'");
    $sql_update = mysqli_fetch_array($sql);

    if (isset($_POST['update'])) {
        $target = "user-img/" . basename($_FILES['img']['name']);

        $image = $_FILES['img']['name'];
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];

        $insertData = mysqli_query($conn, "UPDATE user set fullname='$fullname', img = '$image' where id='$id'");

        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            $Msg = "Successfully data Update";
            header("refresh:3;");
        }else {
            $Meg = "Warning! try your again";
            header("refresh:3;");
        }

    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update files</title>
    <!-- custom tailwindcss  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- custom font icons  -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="flex justify-center relative items-center">
    <?php
            if (isset($Msg)) {
                ?>
                <div
                    class="w-full h-screen absolute z-40 flex justify-center items-center gap-4 text-xl text-center bg-[#29292981]">
                    <div
                        class="sm:w-[30rem] relative flex justify-center items-center flex-col gap-5 w-full h-[16rem] bg-white rounded-md">
                        <span class="material-symbols-outlined text-[5rem] text-green-500">done_all</span>
                        <span
                            class="text-md absolute bottom-0 left-0 rounded-md rounded-br-md bg-green-500 w-full py-4 px-8 shadow-md font-semibold"><?php echo $Msg; ?></span>
                    </div>
                </div>
                <?php
            }
        ?>
    <?php
            if (isset($Meg)) {
                ?>
                <div
                    class="w-full h-screen absolute z-40 flex justify-center items-center gap-4 text-xl text-center bg-[#29292981]">
                    <div
                        class="sm:w-[30rem] relative flex justify-center items-center flex-col gap-5 w-full h-[16rem] bg-white rounded-md">
                        <span class="material-symbols-outlined text-[5rem] text-rose-500">dangerous</span>
                        <span 
                            class="text-md absolute bottom-0 left-0 rounded-md rounded-br-md bg-rose-500 w-full py-4 px-8 shadow-md font-semibold"><?php echo $Meg; ?></span>
                    </div>
                </div>
                <?php
            }
        ?>
        <div class="w-[40rem] h-auto rounded-md border-2 drop-shadow-md p-4">
            <div class="py-6 bg-sky-600 rounded-md text-center mb-5">
                <h2 class="text-white text-xl">Form Upload Images</h2>
            </div>
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <label for="title" class=" relative block">
                    <p class="text-slate-400 font-medium my-2 text-go">Fullname</p>
                    <input type="hidden" value="<?php echo $sql_update['id'] ?>" name="id">
                    <input type="text" value="<?php echo $sql_update['fullname'] ?>"
                        class=" placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-3 pl-2 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 text-sm"
                        name="fullname">
                </label>
                <label for="title" class=" relative block mt-4">
                    <p class="text-slate-400 font-medium my-2 text-go">Select images</p>
                    <input type="file"
                        class=" placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-3 pl-2 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 text-sm"
                        name="img" accept="image/png, image/jpg, image/jpeg, image/pdf">
                </label>
                <div class="mt-6 flex justify-center items-center gap-3">

                    <a href="index.php" class="py-2 px-4 rounded-md bg-rose-500 text-white">Black up</a>
                    <button type="submit" class="py-2 px-4 rounded-md bg-emerald-500 text-white" name="update">Update
                        now</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>