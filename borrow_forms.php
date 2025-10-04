<?php
require_once("connection.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-cover bg-center bg-[url('files/Background2.png')]">
     <div class="flex h-full" >
      <!-- Sidebar im sorry i kind of just copied the thing and now the sizes are messed -->
        <nav class="w-50 bg-black/80 text-green-400 flex flex-col items-center h-screen" style="font-family: 'Poppins', sans-serif;">
        <!-- Logo -->
        <img src="../../files/comsoc_logo-removebg-preview.png" alt="Logo" class="w-42 h-auto" href="#">
        <h1 class="text-xl font-bold mb-2">Inventory System</h1>
        <hr class="w-50 border-t-2 border-white">
        <!-- Nav links -->
        <ul class="space-y-10 text-base mt-10 text-green-700 font-semibold">
          <li><a href="#" class="flex items-center gap-3 w-full bg-gray-700/70 py-2 px-3 rounded-lg hover:bg-green-900 hover:text-white transition duration-200">
              <i class="fa-solid fa-handshake text-2xl"></i>
              <span>Borrow</span>
            </a>
          </li>
          <li><a href="#" class="flex items-center gap-3 w-full bg-gray-700/70 py-2 px-3 rounded-lg hover:bg-green-900 hover:text-white transition duration-200">
            <i class="fa-solid fa-calendar-days text-2xl"></i>
            <span>Event</span></a></li>
          <li><a href="#" class="flex items-center gap-3 w-full bg-gray-700/70 py-2 px-3 rounded-lg hover:bg-green-900 hover:text-white transition duration-200">
            <i class="fa-solid fa-box-open text-2xl"></i>
            <span>Current Out</span></a></li>
          <li><a href="all_equipment.php" class="flex items-center gap-3 w-full bg-gray-700/70 py-2 px-3 rounded-lg hover:bg-green-900 hover:text-white transition duration-200">
            <i class="fa-solid fa-table-list text-2xl"></i>
            <span>All Equipment</span></a></li>
        </ul>
      </nav>

      <main main class="flex-1 flex items-center justify-center" >
        <div class=" bg-black/80 shadow-lg rounded-lg p-8 h-[auto] w-[auto] flex flex-row" >
            <div>
              <form>
                <label class="font -[Roboto] text-[30px] text-white">Borrower Name: </label><br>
                <input type="text" class="bg-white h-[50px] p-5 text-lg/10 w-[500px] rounded-lg"><br>

                <label class="font -[Roboto] text-[30px] text-white">In-Charge: </label><br>
                <input type="text" class="bg-white h-[50px] p-5 text-lg/10 w-[500px] rounded-lg"><br>

                <label class="font -[Roboto] text-[30px] text-white">Scan Barcode: </label><br>
                <div class="bg-white rounded-lg p-8 h-[25rem] w-[31.25rem]">

                </div>
            </div>
            <div>
                <lable class="font -[Roboto] text-[30px] text-white mx-8">Eqipment List: </label>
                <table class="bg-white rounded-lg p-8 h-[40rem] w-[40rem] m-7">
                </table>
                <input type="submit" value="Confirm" class="text-white text-lg bg-green-600 hover:bg-green-800 w-[5rem] h-[2rem] rounded-lg">
                <input type="submit" value="Cancel" class="text-white text-lg bg-red-600 hover:bg-red-800 w-[5rem] h-[2rem] rounded-lg">
              </form>
            </div>
        </div>
      </main>

</body>

<html>