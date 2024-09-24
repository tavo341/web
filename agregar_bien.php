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
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger los datos del formulario
        $formato = $_POST['formato'];
        $CodigoPatrimonial = $_POST['CodigoPatrimonial'];
        $Correlativo = $_POST['Correlativo'];
        $DenominacionBien = $_POST['DenominacionBien'];
        $FormaAdquisicion = $_POST['FormaAdquisicion'];
        $EntidadProcedencia = $_POST['EntidadProcedencia'];
        $FechaAdquisicion = $_POST['FechaAdquisicion'];
        $ValorLibros = $_POST['ValorLibros'];
        $NDocumentoAdquisicion = $_POST['NDocumentoAdquisicion'];
        $UnidadMedida = $_POST['UnidadMedida'];
        $EstadoBien = $_POST['EstadoBien'];
        $Usuario = $_POST['Usuario'];
        $Area = $_POST['Area'];
        $Largo = $_POST['Largo'] ?? null;
        $Ancho = $_POST['Ancho'] ?? null;
        $Alto = $_POST['Alto'] ?? null;
        $Marca = $_POST['Marca'] ?? null;
        $Modelo = $_POST['Modelo'] ?? null;
        $Color = $_POST['Color'] ?? null;
        $NSerie = $_POST['NSerie'] ?? null;
        $CaracteristicasAdicionales = $_POST['CaracteristicasAdicionales'];

        // Selección de la tabla según el formato
        switch ($formato) {
            case 'I':
                $sql = "INSERT INTO maquinarias_equipo_diversos (CodigoPatrimonial, Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, Largo, Ancho, Alto, Marca, Modelo, Color, NSerie, CaracteristicasAdicionales) 
            VALUES (:CodigoPatrimonial, :Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :Largo, :Ancho, :Alto, :Marca, :Modelo, :Color, :NSerie, :CaracteristicasAdicionales)";
                break;
            case 'II':
                $sql = "INSERT INTO maquinas_equipo_educativos (CodigoPatrimonial, Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, Largo, Ancho, Alto, Marca, Modelo, Color, NSerie, CaracteristicasAdicionales) 
                        VALUES (:CodigoPatrimonial, :Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :Largo, :Ancho, :Alto, :Marca, :Modelo, :Color, :NSerie, :CaracteristicasAdicionales)";
                break;
            case 'III':
                $sql = "INSERT INTO mobiliario_educativo (CodigoPatrimonial, Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, Largo, Ancho, Alto, Marca, Modelo, Color, NSerie, CaracteristicasAdicionales) 
                        VALUES (:CodigoPatrimonial, :Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :Largo, :Ancho, :Alto, :Marca, :Modelo, :Color, :NSerie, :CaracteristicasAdicionales)";
                break;
            case 'IV':
                $sql = "INSERT INTO equipos_computo (CodigoPatrimonial, Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, Largo, Ancho, Alto, Marca, Modelo, Color, NSerie, CaracteristicasAdicionales) 
                        VALUES (:CodigoPatrimonial, :Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :Largo, :Ancho, :Alto, :Marca, :Modelo, :Color, :NSerie, :CaracteristicasAdicionales)";
                break;
            case 'V':
                $sql = "INSERT INTO muebles_enseres_no_depreciable (CodigoPatrimonial, Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, Largo, Ancho, Alto, Marca, Modelo, Color, NSerie, CaracteristicasAdicionales) 
                        VALUES (:CodigoPatrimonial, :Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :Largo, :Ancho, :Alto, :Marca, :Modelo, :Color, :NSerie, :CaracteristicasAdicionales)";
                break;
            case 'VI':
                $sql = "INSERT INTO bienes_culturales (Correlativo, DenominacionBien, FormaAdquisicion, EntidadProcedencia, FechaAdquisicion, ValorLibros, NDocumentoAdquisicion, UnidadMedida, EstadoBien, Usuario, Area, CaracteristicasAdicionales) 
                        VALUES (:Correlativo, :DenominacionBien, :FormaAdquisicion, :EntidadProcedencia, :FechaAdquisicion, :ValorLibros, :NDocumentoAdquisicion, :UnidadMedida, :EstadoBien, :Usuario, :Area, :CaracteristicasAdicionales)";
                break;
            default:
                echo "Formato no válido.";
                exit();
        }

        try {
            $stmt = $conexion->prepare($sql);
        
            // Vinculación de parámetros
            if ($formato === 'VI') {
                $stmt->bindParam(':Correlativo', $Correlativo);
                $stmt->bindParam(':DenominacionBien', $DenominacionBien);
                $stmt->bindParam(':FormaAdquisicion', $FormaAdquisicion);
                $stmt->bindParam(':EntidadProcedencia', $EntidadProcedencia);
                $stmt->bindParam(':FechaAdquisicion', $FechaAdquisicion);
                $stmt->bindParam(':ValorLibros', $ValorLibros);
                $stmt->bindParam(':NDocumentoAdquisicion', $NDocumentoAdquisicion);
                $stmt->bindParam(':UnidadMedida', $UnidadMedida);
                $stmt->bindParam(':EstadoBien', $EstadoBien);
                $stmt->bindParam(':Usuario', $Usuario);
                $stmt->bindParam(':Area', $Area);
                $stmt->bindParam(':CaracteristicasAdicionales', $CaracteristicasAdicionales);
            } else {
                $stmt->bindParam(':CodigoPatrimonial', $CodigoPatrimonial);
                $stmt->bindParam(':Correlativo', $Correlativo);
                $stmt->bindParam(':DenominacionBien', $DenominacionBien);
                $stmt->bindParam(':FormaAdquisicion', $FormaAdquisicion);
                $stmt->bindParam(':EntidadProcedencia', $EntidadProcedencia);
                $stmt->bindParam(':FechaAdquisicion', $FechaAdquisicion);
                $stmt->bindParam(':ValorLibros', $ValorLibros);
                $stmt->bindParam(':NDocumentoAdquisicion', $NDocumentoAdquisicion);
                $stmt->bindParam(':UnidadMedida', $UnidadMedida);
                $stmt->bindParam(':EstadoBien', $EstadoBien);
                $stmt->bindParam(':Usuario', $Usuario);
                $stmt->bindParam(':Area', $Area);
                $stmt->bindParam(':Largo', $Largo);
                $stmt->bindParam(':Ancho', $Ancho);
                $stmt->bindParam(':Alto', $Alto);
                $stmt->bindParam(':Marca', $Marca);
                $stmt->bindParam(':Modelo', $Modelo);
                $stmt->bindParam(':Color', $Color);
                $stmt->bindParam(':NSerie', $NSerie);
                $stmt->bindParam(':CaracteristicasAdicionales', $CaracteristicasAdicionales);
            }
        
            // Ejecutar la consulta
            $stmt->execute();
        
            // Redirección
            header("Location: Agregar.html");
            exit();
        } catch (PDOException $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
        }
        
    }
    ?>
