<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>INVENTARIO VI</title>
</head>
<body class="bg-gray-100">
    <nav class="p-5 bg-[#FC0709] shadow xl:flex xl:items-center xl:justify-between">
        <div class="flex items-center justify-between xl:w-auto w-full">
            <span class="text-2xl font-semibold cursor-pointer text-white hover:text-[#F9FD02] duration-400 md:text-[30px]"> 
                <img class="h-12 inline" src="./IMG/Logo.png" alt=""><a href="home.html">Inventario</a>
            </span>

            <!-- Contenedor para alinear el icono a la derecha -->
            <div class="xl:hidden flex items-center">
                <span class="text-3xl text-white hover:text-[#F9FD02] cursor-pointer mx-2 duration-400">
                    <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
                </span>
            </div>
        </div>

        <ul id="menu-list" class="xl:flex xl:items-center z-[-1] xl:z-auto xl:static absolute bg-[#FC0709] w-full left-0 xl:w-auto xl:py-0 py-4 xl:pl-1 pl-4 xl:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500"> 
            <li class="mx-4 my-6 xl:my-0">
                <a href="Formato1.php" class="text-[15px] text-white hover:text-[#F9FD02] duration-400">FORMATOS I</a>
            </li>
            <li class="mx-4 my-6 xl:my-5">
                <a href="Formato2.php" class="text-[15px]  text-white hover:text-[#F9FD02] duration-400">FORMATOS II</a>
            </li>
            <li class="mx-4 my-6 xl:my-5">
                <a href="Formato3.php" class="text-[15px] text-white hover:text-[#F9FD02] duration-400">FORMATOS III</a>
            </li>
            <li class="mx-4 my-6 xl:my-5">
                <a href="Formato4.php" class="text-[15px] text-white hover:text-[#F9FD02] duration-400">FORMATOS IV</a>
            </li>
            <li class="mx-4 my-6 xl:my-5">
                <a href="Formato5.php" class="text-[15px] text-white hover:text-[#F9FD02] duration-400">FORMATOS V</a>
            </li>
            <li class="mx-4 my-6 xl:my-5">
                <a href="Agregar.html" class="text-[15px] text-white hover:text-[#F9FD02] duration-400">AGREGAR</a>
            </li>
            <main class="mt-4 xl:mt-0 xl:mr-4 w-full xl:w-auto flex justify-start xl:justify-end">
                <div class=" flex rounded bg-white w-full mr-4 xl:w-auto ">
                    <input type="search" name="search" id="search" placeholder="Buscar" class="w-full border-none bg-transparent px-3 py-0 text-gray-900 outline-none focus:outline-none">
                    <button class="m-2 rounded bg-[#FC0709] hover:bg-[#ac0202] px-3 py-1 text-white">Buscar</button>
                </div>
            </main>
        </ul>
    </nav>
    <br>
    <br>
    <h1 class="text-3xl justify-center text-center font-bold ">FORMATO VI</h1>
    <div class="px-4">
        <p class="py-4"><span class="font-semibold">ENTIDAD: </span>UNIDAD DE GESTIÓN EDUCATIVA LOCAL SANTA</p>
        <div class="flex">
            <p><span class="font-semibold">LOCAL: </span>GASTON VIDAL PORTURAS</p>
            <p class="px-52"><span class="font-semibold">CÓDIGO DEL LOCAL: </span>GASTON VIDAL PORTURAS</p>
            <p><span class="font-semibold">FECHA: </span>GASTON VIDAL PORTURAS</p>
        </div>
        <div class="flex py-4">
            <p><span class="font-semibold">NIVEL: </span></p>
            <p class="px-28"><span class="font-semibold">MODALIDAD: </span></p>
        </div>
        <div class="flex">
            <p><span class="font-semibold">DEPARTAMENTO: </span>ANCASH</p>
            <p class="px-20"><span class="font-semibold">PROVINCIA: </span>SANTA</p>
            <p><span class="font-semibold">DISTRITO: </span></p>
        </div>
        <p class="py-4"><span class="font-semibold">DIRECCIÖN: </span></p>
    </div>
    <h1 class="text-[30px] justify-center text-center font-semibold">BIENES CULTURALES - LIBROS Y TEXTOS PARA BIBLIOTECA</h1>
    

    

    <br>
    <br>
    <br>
    <table class="min-w-full border border-black table-fixed">
        <!-- Encabezado de la tabla -->
        <thead>
          <tr class="bg-gray-200">
            <th class="border border-black p-2 text-sm">CORRELAT</th>
            <th class="border border-black p-2 text-sm">DENOMINACIÓN DEL BIEN</th>
            <th class="border border-black p-2 text-sm">FORMA DE ADQUISICIÓN</th>
            <th class="border border-black p-2 text-sm">ENTIDAD DE PROCEDENCIA</th>
            <th class="border border-black p-2 text-sm">FECHA DE ADQUISICIÓN</th>
            <th class="border border-black p-2 text-sm">VALOR EN LIBROS</th>
            <th class="border border-black p-2 text-sm">DATOS DE ADQUISICIÓN</th>
            <th class="border border-black p-2 text-sm">UNIDAD DE MEDIDA</th>
            <th class="border border-black p-2 text-sm">ESTADO DEL BIEN</th>
            <th class="border border-black p-2 text-sm">USUARIO</th> 
            <th class="border border-black p-2 text-sm">ÁREA</th>
            <th class="border border-black p-2 text-sm">CARACTERÍSTICAS ADICIONALES</th>
          </tr>
        </thead>
      
        <!-- Cuerpo de la tabla -->
        <tbody>
            <?php
            // Configuración de la base de datos
            $host = 'localhost';
            $dbname = 'dbinventario';
            $user = 'root'; 
            $pass = ''; 
            
            try {
                // Conexión a la base de datos
                $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Consulta SQL para obtener los datos de la tabla
                $sql = "SELECT * FROM bienes_culturales";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
            
                // Recorrer cada bien y mostrarlo en una fila de la tabla
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['Correlativo']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['DenominacionBien']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['FormaAdquisicion']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['EntidadProcedencia']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['FechaAdquisicion']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['ValorLibros']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['NDocumentoAdquisicion']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['UnidadMedida']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['EstadoBien']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['Usuario']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['Area']) . "</td>";
                    echo "<td class='border border-black p-2'>" . htmlspecialchars($row['CaracteristicasAdicionales']) . "</td>";
                    echo "</tr>";
                }
                
            } catch (PDOException $e) {
                echo "Error en la conexión: " . $e->getMessage();
            }
            ?>
          <tr>
            <td class="border border-black p-2">XXXX</td>
            <td class="border border-black p-2">Nombre del bien</td>
            <td class="border border-black p-2">Adquisición</td>
            <td class="border border-black p-2">Procedencia</td>
            <td class="border border-black p-2">AA/MM/DD</td>
            <td class="border border-black p-2">XXXX</td>
            <td class="border border-black p-2">XXXX</td>
            <td class="border border-black p-2">XXXX</td>
            <td class="border border-black p-2">Estado</td>
            <td class="border border-black p-2">Usuario</td>
            <td class="border border-black p-2">Área</td>
            <td class="border border-black p-2">Características adicionales</td>
          </tr>
        </tbody>
      </table>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./JS/menu.js"></script>


    

</body>
</html>
