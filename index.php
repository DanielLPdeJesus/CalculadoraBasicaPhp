<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Calculadora de Daniel</span>
</nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Calculadora</h1>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="numero1">Número 1:</label>
                                <input type="number" id="numero1" name="numero1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="numero2">Número 2:</label>
                                <input type="number" id="numero2" name="numero2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="operacion">Operación:</label>
                                <select id="operacion" name="operacion" class="form-control" required>
                                    <option value="suma" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'suma' ? 'selected' : ''; ?>>Suma</option>
                                    <option value="resta" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'resta' ? 'selected' : ''; ?>>Resta</option>
                                    <option value="multiplicacion" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'multiplicacion' ? 'selected' : ''; ?>>Multiplicación</option>
                                    <option value="division" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'division' ? 'selected' : ''; ?>>División</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Calcular</button>
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
                                        echo "<div class='alert alert-danger mt-3'>No se puede dividir por cero</div>";
                                        exit();
                                    }
                                    break;
                                default:
                                    echo "<div class='alert alert-danger mt-3'>Operación no válida</div>";
                                    exit();
                            }

                            echo "<div class='alert alert-success mt-3'>El resultado de la operación es: $resultado</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
