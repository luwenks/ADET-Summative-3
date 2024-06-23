<?php
session_start();

// CRUD Operations

if (isset($_POST['create'])) {
    $_SESSION['tasks'][] = $_POST['task'];
    header('Location: index.php');
    exit;
}

if (isset($_POST['update'])) {
    $_SESSION['tasks'][$_POST['id']] = $_POST['task'];
    header('Location: index.php');
    exit;
}

if (isset($_POST['delete'])) {
    unset($_SESSION['tasks'][$_POST['id']]);
    header('Location: index.php');
    exit;
}

// Display tasks
$tasks = $_SESSION['tasks']?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>Taskura - your very own To-do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <video autoplay muted loop id="myVideo">
        <source src="img/CherryBlossomV.mp4" type="video/mp4">
    </video>

    <header>
        <h1>TASKURA</h1>
    </header>

    <main>

        <section>
            <h2>To-do List</h2>
            <ul>
                <?php foreach ($tasks as $id => $task) {?>
                    <li>
                        <input type="checkbox" id="task-<?php echo $id;?>">
                        <label for="task-<?php echo $id;?>"><?php echo $task;?></label>
                        <form action="index.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </li>
                <?php }?>
            </ul>
            <form action="index.php" method="post">
                <input type="text" name="task" placeholder="Add new task">
                <input type="submit" name="create" value="Add">
            </form>
        </section>

    </main>
    <footer>
        <p>&copy; 2023 Sakura Tasks</p>
    </footer>
</body>
</html>