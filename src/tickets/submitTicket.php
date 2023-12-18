<?php 
    include ("../utils/userClass.php");
    include ("../utils/ticketClass.php");
    include("../utils/connect.php");
    session_start();
    $test = new User("", "", "", "");
    if(!isset($_SESSION["id"])){
        header("Location: ../../index.php");
    }

    $e = new Ticket("", "", "", "", $conn, "");
    
    if(isset($_POST["logout"])){
        $test->logout();
        header("Location: ../../index.php");
    }
    if(isset($_POST['submit'])){
      $ttl = $_POST["title"];
      $dsc = $_POST["description"];
      $sts = $_POST["status"];
      $prt = $_POST["priority"];
      $tck = new Ticket($ttl, $dsc, $sts, $prt, $conn, $_SESSION["username"]);
      $tck->newTicket();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tagsinput@1.3.6/bootstrap-tagsinput.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="relative border-b">
    <nav class="container mx-auto">
      <div class="max-w-4xl h-12 nd:h-16 mx-auto flex justify-between align-stretch px-4">
        <div id="logo" class="flex items-center text-blue-600 font-bold">
          <a href="dashboard.php">DASHBOARD</a>
        </div>
        <ul id="nav-links" class="hidden md:block absolute md:relative md:flex md:align-stretch md:justify-end right-0 top-0 mt-10 md:mt-0 py-2 md:py-0 w-48 md:w-auto h-auto z-10 bg-white shadow md:shadow-none">
          <li>
            <a class="w-full h-full flex md:items-center pl-6 md:pl-4 pr-4 py-1 hover:bg-gray-100" href="submitTicket.php">Submit a ticket </a>
          </li>
          <li>
            <form class="h-full" method="post">
                <button class="w-full h-full font-bold text-red-600 flex md:items-center pl-6 md:pl-4 pr-4 py-1 hover:bg-gray-100" name="logout" type="submit">logout</a>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  

<form class="max-w-md mx-auto py-5" method="post">
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="description	" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">descirption</label>
  </div>
  <div class="relative z-0 w-full mb-5 group flex flex-col">
    <label for="status" class="text-gray-400">Status</label>
      <select name="status" id="status">
        <option value="" disabled selected hidden>---select status---</option>
        <option name="open" value="open">open</option>
        <option name="done" value="done">ongoing</option>
        <option name="done" value="done">fixed</option>
      </select>
  </div>

  <div class="relative z-0 w-full mb-5 group flex flex-col">
    <label for="priority" class="text-gray-400">Priority</label>
      <select name="priority" id="priority">
        <option value="" disabled selected hidden>---select priority---</option>
        <option name="high" value="open">high</option>
        <option name="low" value="done">low</option>
      </select>
  </div>

  <div class="relative z-0 w-full mb-5 group flex flex-col">
    <label for="priority" class="text-gray-400">Assignees</label>
      <select name="priority" id="assignees">
        <option value="" disabled selected hidden>---select assignee---</option>
        <?php $e->getAllDevs(); ?>
      </select>
  </div>
  
  <div class="relative z-0 w-full mb-5 group flex flex-col">
    <label for="priority" class="text-gray-400">tags</label>
      <select name="priority" id="priority">
        <option value="" disabled selected hidden>---select tags---</option>
        <option name="high" value="open">high</option>
        <option name="low" value="done">low</option>
      </select>
  </div>
  <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
<script src="../js/script.js"></script>
</body>
</html>