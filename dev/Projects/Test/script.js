class Sokoband {
    constructor(map) {
        this.map = map;
        this.board = document.getElementById("game-board");
        this.generateMap();
    }

    generateMap() {
        for (let indexRow in map) {
            let newRow = document.createElement('div');
            newRow.className = `game-row row-${indexRow}`;

            for(let indexColumn in map[indexRow]) {
                let newCase = document.createElement('div');
                newCase.className = `game-block col-${indexColumn}`;
                switch (map[indexRow][indexColumn]) {
                    case 0:
                        newCase.classList.add('texture-wall');
                        break;
                    case 1:
                        break;                        
                    case 2:
                        newCase.classList.add('texture-box');
                        break;                        
                    case 3:
                        newCase.classList.add('texture-start');
                        break;                        
                    case 4:
                        newCase.classList.add('texture-exit');
                        break;
                }
                newRow.appendChild(newCase);
            }

            this.board.appendChild(newRow);
        }
    }
}

const WALL = 0;
const GROUND = 1;
const BOX = 2;
const BEGIN = 3;
const EXIT = 4;

let map = [
    [0, 0, 0, 0, 0, 0],
    [3, 1, 2, 1, 1, 0],
    [0, 1, 2, 1, 1, 4],
    [0, 2, 2, 1, 1, 0],
    [0, 1, 1, 1, 1, 0],
    [0, 0, 0, 0, 0, 0]
];

let game = new Sokoband(map);

