<?php
class Sudoku{
    const MIN = 1;
    const MAX = 9;
    protected $tablero;
    protected $tableroResuelto;
    protected $tableroRespuestasUsuario;

    public function InicializarTablero(){
        $this->$tablero = [
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null],
            [null,null,null,null,null,null,null,null,null]
        ];
    }

    public function generarSudoku(array $tablero = []){
        if(!empty($tablero)){
            return $this->imprimirSudoku($tablero);
        }else{
            $this->crearSudoku();
            $this->cambiarIguales();
            //return $this->imprimirSudoku();
        }
    }

    function crearSudoku(){
        $total = $this->$tablero; //array vacio con las posiciones
        $excluir = [];
        $distinto = true;
        for($i = 0; $i < self::MAX; $i++){
            for($j = 0; $j < self::MAX; $j++){
                if($i != 0 && $j != 0){
                    $numdefinitivo = null;
                    while ($distinto != true){
                        for($a = 0; $a < $i; $a++){
                            for($b = 0; $b < $j; $b++){
                                $numero = rand(1, 9);
                                $excluir[] = $total[$a][$b];
                                if(!in_array($numero, $excluir)){
                                    $numdefinitivo = $numero;
                                    $distinto = false;
                                }
                            }
                        }
                    }
                    print_r($numdefinitivo);
                    $total[$i][$j] = $numdefinitivo;
                    
                }else{
                    $total[$i][$j] = rand(1, 9);
                }
            }
        }
        $this->$tablero = $total;
        return $total;
    }
    function cambiarIguales(){
        $total = $this->$tablero;
            $numero = null;
        for($i = 0; $i < self::MAX; $i++){
            for($j = 0; $j < self::MAX; $j++){
                if($i < self::MAX && $j < self::MAX){
                    if($total[$i][$j] == $total[$i+1][$j+1]){
                        $total[$i][$j] = $this->cambioNumero($total[$i][$j], $i, $j);
                    }
                }else{
                    if($total[$i][$j] == $total[$i-1][$j-1]){
                        $total[$i][$j] = $this->cambioNumero($total[$i][$j], $i, $j);
                    }
                }
            }
        }
        $this->tablero = $total;
        return $total;
    }
    private function cambioNumero(int $number, int $x, int $y){
        $duplicado = false;
        $total = $this->$tablero;
        $devolver = null;
        for($i = 0; $i < self::MAX; $i++){
            for($j = 0; $j < self::MAX; $j++){
                if($total[$i][$j] != null){
                    if($total[$x][$y] == $total[$i][$j]){
                        $numero = rand(self::MIN, self::MAX);
                        while($duplicado == true){
                            $excluir = [$total[$x][$y]];
                            if(!in_array($numero, $excluir)){
                                $duplicado = true;
                            }
                        }

                        $devolver = $numero;
                    }
                }
                $j = self::MAX;
            }
            $i = self::MAX;
        }
        return $devolver;
    }
    function getCuadrado($x, $y){
        $bloque = [];
        if($x > -1 && $x < 3){
            if($y > -1 && $y < 3){
                $bloque[0][0] = null;
                $bloque[0][1] = null;
                $bloque[0][2] = null;
                $bloque[1][0] = null;
                $bloque[1][1] = null;
                $bloque[1][2] = null;
                $bloque[2][0] = null;
                $bloque[2][1] = null;
                $bloque[2][2] = null;
            }elseif ($y > 2 && $y < 6) {
                $bloque[0][3] = null;
                $bloque[0][4] = null;
                $bloque[0][5] = null;
                $bloque[1][3] = null;
                $bloque[1][4] = null;
                $bloque[1][5] = null;
                $bloque[2][3] = null;
                $bloque[2][4] = null;
                $bloque[2][5] = null;
            }elseif ($y > 5) {
                $bloque[0][6] = null;
                $bloque[0][7] = null;
                $bloque[0][8] = null;
                $bloque[1][6] = null;
                $bloque[1][7] = null;
                $bloque[1][8] = null;
                $bloque[2][6] = null;
                $bloque[2][7] = null;
                $bloque[2][8] = null;
            }
        }elseif ($x > 2 && $x < 6) {
            if($y > -1 && $y < 3){
                $bloque[3][0] = null;
                $bloque[3][1] = null;
                $bloque[3][2] = null;
                $bloque[4][0] = null;
                $bloque[4][1] = null;
                $bloque[4][2] = null;
                $bloque[5][0] = null;
                $bloque[5][1] = null;
                $bloque[5][2] = null;
            }elseif ($y > 2 && $y < 6) {
                $bloque[3][3] = null;
                $bloque[3][4] = null;
                $bloque[3][5] = null;
                $bloque[4][3] = null;
                $bloque[4][4] = null;
                $bloque[4][5] = null;
                $bloque[5][3] = null;
                $bloque[5][4] = null;
                $bloque[5][5] = null;
            }elseif ($y > 6) {
                $bloque[3][6] = null;
                $bloque[3][7] = null;
                $bloque[3][8] = null;
                $bloque[4][6] = null;
                $bloque[4][7] = null;
                $bloque[4][8] = null;
                $bloque[5][6] = null;
                $bloque[5][7] = null;
                $bloque[5][8] = null;
            }
        }elseif ($x > 5 && $x < 10) {
            if($y > -1 && $y < 3){
                $bloque[6][0] = null;
                $bloque[6][1] = null;
                $bloque[6][2] = null;
                $bloque[7][0] = null;
                $bloque[7][1] = null;
                $bloque[7][2] = null;
                $bloque[8][0] = null;
                $bloque[8][1] = null;
                $bloque[8][2] = null;
            }elseif ($y > 2 && $y < 6) {
                $bloque[6][3] = null;
                $bloque[6][4] = null;
                $bloque[6][5] = null;
                $bloque[7][3] = null;
                $bloque[7][4] = null;
                $bloque[7][5] = null;
                $bloque[8][3] = null;
                $bloque[8][4] = null;
                $bloque[8][5] = null;
            }elseif ($y > 5) {
                $bloque[6][6] = null;
                $bloque[6][7] = null;
                $bloque[6][8] = null;
                $bloque[7][6] = null;
                $bloque[7][7] = null;
                $bloque[7][8] = null;
                $bloque[8][6] = null;
                $bloque[8][7] = null;
                $bloque[8][8] = null;
            }
        }
        return $bloque;
    }
    /**
     * 
     * vale comprension
     * tener array de 9 numeros
     * y poner una condicion de si me diste ese numero no me lo repitas y luego aplicar una segunda condicion 
     */

    private function diferenteCuadranteFila(){
        
    }

    public function imprimirSudoku(array $sudoku){
        if(empty($sudoku)){
            $sudoku = $this->tablero;
        }
        $datos = "";
        for($i = 0; $i < length($sudoku); $i++){
            $datos += "<tr>";
            for($o = 0; $o < $i; $o++){
                $datos += "<td>".$sudoku[$i][$o]."</td>";
            }
            $datos += "</tr>";
        }
        return "<table>
        <tbody>".$datos."</tbody>
        </table>";
    }

}

/*$contador = 0;
while(){
$fila = false;
$columna = false;
$cuadro = false;
$x = 0;
$y = 0;
$valor = 1;
for($i = 0; $i < 9; $i++){
    for($j = 0; $j < 9; $j++){


        if($x != $i && $j != $y){

        }
}
[0][0] [0][1] [0][2] [0][3] [0][4] [0][5] [0][6] [0][7] [0][8]
[1][0] [1][1] [1][2]
[2][0] [2][1] [2][2]
[3][0]
[4][0]
[5][0]
[6][0]
[7][0]
[8][0]
[9][0]


[0][0]
[1][0]
[2][0]
[3][0] [3][1] [3][2] [3][3] [3][4] [3][5] [3][6] [3][7] [3][8]
[4][0] [4][1] [4][2]
[5][0] [5][1] [5][2]
[6][0]
[7][0]
[8][0]
[9][0]


}*/
?>