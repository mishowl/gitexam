<html>
    <head>
        <title>Salon Customers</title>
        <link rel="icon" href="../assets/img/icon.png">
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/script.js"></script>
    </head>
    <body class="bg-[url('../img/background.jpg')] my-32 mx-48 font-poppins">
    <div class="bg-white bg-opacity-50 rounded-lg py-10 px-20">
    <a class="text-3xs" href="salon.php">View Services</a>
        <p class="font-poppins text-2xl">Salon Customers <button onclick="add_customer()" class="p-2 px-6 text-sm bg-custom-button text-white rounded-lg">Add</button> </p>
        <div class="bg-white rounded-lg drop-shadow-lg overflow-x-auto flex-none p-10 mt-4">
            <table class="customer_records min-w-full">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
            </table>
        </div>
</div>
    </body>
</html>