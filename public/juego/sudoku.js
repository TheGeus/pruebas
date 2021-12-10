const tablero = [
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
const MAX = 9;
const total = tablero;
const excluir = [[], [], [], [], [], [], [], [], []];
const excluir2 = [[], [], [], [], [], [], [], [], []];
let contador1 = 0;
let contador2 = 0;


for(let i = 0; i < MAX; i++){
    for(let j = 0; j < MAX; j++){
        if(i == 0 && j == 0){
            total[i][j] = Math.floor(Math.random() * 10) + 1;
            excluir[0].push(total[i][j]);
            excluir2[0].push(total[i][j]);
        }else{
            let numero = Math.floor(Math.random() * 10) + 1;
            let numeroDefinitivo = null;
            let distinto = true;
            do{
                if(excluir[i].includes(numero) == false && excluir2[j].includes(numero) == false){
                    numeroDefinitivo = numero;
                    excluir[i].push(numeroDefinitivo);
                    excluir2[j].push(numeroDefinitivo);
                    distinto = false;
                }
            }
            while(distinto);
            total[i][j] = numeroDefinitivo;
        }
    }
}

console.log(total);