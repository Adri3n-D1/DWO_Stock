class Sokoband {
    constructor(map) {
        this.map = map;
        $("#game-content").css(`width`, `${this.map[0].length * SIZE_BLOC}px`);
        $("#game-content").css(`height`, `${this.map.length * SIZE_BLOC}px`);
        $("body").keydown((event) => {
            console.log(event.which);
            switch (event.which) {
                case KEY_UP:
                    this.moveCharacter(UP);
                    break;
                case KEY_RIGHT:
                    this.moveCharacter(RIGHT);
                    break;
                case KEY_DOWN:
                    this.moveCharacter(DOWN);
                    break;
                case KEY_LEFT:
                    this.moveCharacter(LEFT);
                    break;
            }
        });

        this.board = $("#game-board");
        this.meta = $("#game-meta");
        this.characterPos;
        this.startPos;
        this.generateMap(this.map);
        this.createCharacter();
    }

    generateMap(map) {
        for (let x in map) {
            for (let y in map[x]) {
                // Saving current position
                let pos = `r-${x} c-${y}`;
                // Create a new tile block
                let newTile = $(`<div>`);
                newTile.addClass(pos);
                newTile.addClass(`block`);
                newTile.css(`position`, `absolute`);
                newTile.css(`z-index`, `0`);
                newTile.css(`left`, `${y * SIZE_BLOC}px`);
                newTile.css(`top`, `${x * SIZE_BLOC}px`);

                // Create a new variable that will contain the information of a potential new game object
                let objectInfo = "";
                // Each tile block can be either 'wall' type or 'floor' type
                if (map[x][y] == WALL) {
                    newTile.addClass(`tile-wall`);
                }
                else {
                    newTile.addClass(`tile-floor`);
                    // Each 'floor' block can have one object
                    switch (map[x][y]) {
                        case BOX:
                            objectInfo = `obj-box`;
                            break;
                        case START:
                            objectInfo = `obj-start`;
                            this.startPos = [x, y];
                            this.CharacterPos = [x, y];
                            break;                            
                        case EXIT:
                            objectInfo = `obj-exit`;
                            break;
                    }
                }
                // Add the tile block
                newTile.appendTo(this.board);

                if (objectInfo != "") {
                    let newObject = $(`<div>`);
                    newObject.addClass(pos);
                    newObject.addClass(objectInfo);
                    newObject.addClass(`block`);
                    
                    newObject.css(`position`, `absolute`);
                    newObject.css(`z-index`, `9`);
                    newObject.css(`left`, `${y * SIZE_BLOC}px`);
                    newObject.css(`top`, `${x * SIZE_BLOC}px`);
                    newObject.appendTo(this.meta);
                }
            }
        }
    }
    createCharacter() {
        this.character = $(`<div>`);
        this.character.addClass(`bug-right`);
        this.character.addClass(`character`);
        this.character.css(`position`, `absolute`);
        this.character.css(`z-index`, `9`);
        this.character.css(`left`, `${this.CharacterPos[1] * SIZE_BLOC + 16}px`);
        this.character.css(`top`, `${this.CharacterPos[0] * SIZE_BLOC + 16}px`);
        this.character.appendTo(this.meta);
    }
    moveCharacter(direction) {
        switch(direction) {
            case UP:
                this.character.css(`background-position`, `-64px -480px`);
                this.character.css(`top`, `-=3px`);
                break;
            case RIGHT:
                this.character.css(`background-position`, `-64px -448px`);
                this.character.css(`left`, `+=2px`);
                break;
            case DOWN:
                this.character.css(`background-position`, `-96px -448px`);
                this.character.css(`top`, `+=2px`);
                break;
            case LEFT:
                this.character.css(`background-position`, `-96px -480px`);
                this.character.css(`left`, `-=2px`);
                break;
        }
    }
}

const WALL = 0;
const FLOOR = 1;
const BOX = 2;
const START = 3;
const EXIT = 4;

const UP = 0;
const RIGHT = 1;
const DOWN = 2;
const LEFT = 3;

const KEY_UP = 38;
const KEY_RIGHT = 39;
const KEY_DOWN = 40;
const KEY_LEFT = 37;

const SIZE_BLOC = 64;

// let map = [
//     [0, 0, 0, 0, 0, 0],
//     [3, 1, 2, 1, 1, 0],
//     [0, 1, 2, 1, 1, 4],
//     [0, 2, 2, 1, 1, 0],
//     [0, 1, 1, 1, 1, 0],
//     [0, 0, 0, 0, 0, 0]
// ];
let map = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [3, 1, 2, 1, 1, 0, 1, 1, 1],
    [0, 1, 2, 1, 1, 1, 1, 0, 0],
    [0, 2, 2, 1, 1, 0, 1, 1, 0],
    [0, 1, 1, 1, 1, 0, 1, 1, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0]
];
let game;
$(document).ready(function() {
    game = new Sokoband(map);
});

