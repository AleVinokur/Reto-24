<?php

function cifrarDescifrarTexto($texto, $desplazamiento, $operacion) {
    $resultado = "";
    $longitud = strlen($texto);
    $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $desplazamiento = ($desplazamiento % 26 + 26) % 26;

    // Recorrer cada carácter del texto
    for ($i = 0; $i < $longitud; $i++) {
        $caracter = $texto[$i];

        
        if (ctype_alpha($caracter)) {
            
            $posicion = strpos($alfabeto, strtoupper($caracter));

            // Aplicar el desplazamiento según la operación seleccionada
            if ($operacion == "cifrar") {
                $nuevaPosicion = ($posicion + $desplazamiento) % 26;
            } else {
                $nuevaPosicion = ($posicion - $desplazamiento + 26) % 26;
            }

            
            $caracterResultado = $alfabeto[$nuevaPosicion];

            
            if (ctype_upper($caracter)) {
                $resultado .= $caracterResultado;
            } else {
                $resultado .= strtolower($caracterResultado);
            }
        } else {
            
            $resultado .= $caracter;
        }
    }

    return $resultado;
}

// Entrada del usuario

$operacion = strtolower(readline("¿Desea cifrar o descifrar? "));
$texto = readline("Ingrese el texto: ");
$desplazamiento = intval(readline("Ingrese el desplazamiento: "));


if ($operacion == "cifrar" || $operacion == "descifrar") {
    $resultado = cifrarDescifrarTexto($texto, $desplazamiento, $operacion);

    echo "Texto resultado: " . $resultado;
} else {
    echo "Operación inválida. Por favor, seleccione 'cifrar' o 'descifrar'.";
}

?>
