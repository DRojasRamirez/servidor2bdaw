<?php

function multiplicar($resultados){
    for($i =1; $i < 11; $i++){
        $resultados[$i] = ($multiplo * $i);
    }
    ?>
    <table>
            <thead>
                <tr>
                    <th>Tabla de multiplicar</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $numero => $resultado){
                    ?>
                    <tr>
                    <td><?php echo $multiplo . "X" . $numero ?></td>
                    <td><?php echo $resultado ?></td>
                    </tr><?php
                };
                ?>
            </tbody>
    </table>
<?php}
?>