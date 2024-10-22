<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquey.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <style>
        .container {

            width: 60%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;

        }
    </style>

    <div class="container">

        <table id="company_users">
            <thead>
                <tr>
                    <th>uu</th>
                    <th>ii</th>
                    <th>aa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                    <td>Data 3</td>
                </tr>
                <!-- Ajoutez autant de lignes que nécessaire avec les données correspondantes -->
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#company_users").DataTable();
        });
    </script>
</body>

</html>