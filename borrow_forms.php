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

      <!-- start of forms -->
      <main main class="flex-1 flex items-center justify-center" >
        <div class=" bg-black/80 shadow-lg rounded-lg p-8 h-[auto] w-[auto] flex flex-row" >
            <div>
              <form action="borrow_forms.php" method="post">
                <label class="font -[Roboto] text-[30px] text-white">Borrower Name: </label><br>
                <input type="text" name="Borrower_name"  class="bg-white h-[50px] p-5 text-lg/10 w-[500px] rounded-lg"><br>

                <label class="font -[Roboto] text-[30px] text-white">In-Charge: </label><br>
                <input type="text" name="In_charge" class="bg-white h-[50px] p-5 text-lg/10 w-[500px] rounded-lg"><br>

                <label class="font -[Roboto] text-[30px] text-white">Scan Barcode: </label><br>
                <div class="bg-white rounded-lg p-8 h-[20rem] w-[31.25rem]">
                  <input type="number" name="barcode" class="border-black-100">
                </div>
            </div>
            <div>
                <lable class="font -[Roboto] text-[30px] text-white mx-8">Eqipment List: </label>
                <div class="bg-white rounded-lg p-8 h-[30rem] w-[40rem] mx-7">
                  <table class="table-auto">
                    <thead>
                      <tr>
                        <th><p class="text-black">equipment name: </p></th>
                        <th><p class="text-black">Borrower Name: </p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr><td><h2 class="text-black">something something</h2><td></tr>
                      
                    </tbody>
                    

                  </table>
                </div>
                <div class="float-right mx-8">
                  <button type="submit" name="submit" class="text-white text-lg bg-green-600 hover:bg-green-800 w-[5rem] h-[2rem] rounded-lg">Confirm </button>
                  <button type="reset"class="text-white text-lg bg-red-600 hover:bg-red-800 w-[5rem] h-[2rem] rounded-lg">Cancel</button>
                </div>
              </form>
            </div>
        </div>
      </main>

</body>

<script></script>

<?php

  $confirm       = $_POST["submit"] ?? NULL;
  $borrower_name = $_POST["Borrower_name"] ?? "";
  $in_charge     = $_POST["In_charge"] ?? "";
  $barcode       = $_POST["barcode"] ?? 0;

  if(isset($confirm)){

    try{
      if(empty($borrower_name) || empty($in_charge)){
        echo "<script>window.alert('required input');</script>";
      }
      else{
        $query_compare = "select equipment_id, barcode from equipment";
        $list = mysqli_query($dbconn, $query_compare);

        if(mysqli_num_rows($list) > 0){
          $arr = array();
          while($row = mysqli_fetch_assoc($list)){
            $arr[$row['barcode']] = $row['equipment_id'];
            }
            
            if($arr[$barcode]){
                $equipment_id = $arr[$barcode]; //set equipment id for foreign keys
                //queries
                $query = "insert into borrow_log (equipment_id,borrow_type, borrower_event_name, in_charge) values('$equipment_id','Personal', '$borrower_name', '$in_charge')";
                $update_status = "update equipment set status = 'out(borrow)' where equipment_id = '$equipment_id'";

                mysqli_query($dbconn, $query);
                mysqli_query($dbconn, $update_status);
            }
            else{
              die();
              echo "<script>window.alert('invalid barcode')</script>";
            }
        }
      }
    }
    catch(mysqli_exceptions_sql){
      echo "<script>window.alert('an error has occured');</script>";
    }
  }
  
?>

<html>
