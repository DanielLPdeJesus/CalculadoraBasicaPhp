<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form method="post">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required><br><br>
        
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required><br><br>
        
        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion" required>
            <option value="suma" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'suma' ? 'selected' : ''; ?>>Suma</option>
            <option value="resta" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'resta' ? 'selected' : ''; ?>>Resta</option>
            <option value="multiplicacion" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'multiplicacion' ? 'selected' : ''; ?>>Multiplicación</option>
            <option value="division" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'division' ? 'selected' : ''; ?>>División</option>
        </select><br><br>
        
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacion = $_POST['operacion'];
        $resultado = 0;

        switch ($operacion) {
            case 'suma':
                $resultado = $numero1 + $numero2;
                break;
            case 'resta':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacion':
                $resultado = $numero1 * $numero2;
                break;
            case 'division':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    echo "<p>No se puede dividir por cero</p>";
                    exit();
                }
                break;
            default:
                echo "<p>Operación no válida</p>";
                exit();
        }

        echo "<p>El resultado de la operación es: $resultado</p>";
    }
    ?>
</body>
</html>
