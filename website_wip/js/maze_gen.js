var body = document.getElementsByTagName('body')[0];
var MAZE_HEIGHT = Math.floor(body.offsetHeight / 2);
var MAZE_WIDTH = Math.floor(body.offsetWidth / 2);
var MAZE_SCALE = 2;
var SPEED = 1000; 
var WALL_COLOR = 'firebrick';
var HALL_COLOR = 'gold';

var width = MAZE_WIDTH % 2 !== 0 ? MAZE_WIDTH : MAZE_WIDTH + 1;
var height = MAZE_HEIGHT  % 2 !== 0 ? MAZE_HEIGHT  : MAZE_HEIGHT  + 1;
var cvs = document.getElementById('cvs');
cvs.height = height*MAZE_SCALE;
cvs.width = width*MAZE_SCALE;
var ctx = cvs.getContext('2d');  

function Cell(row, col, cellState) {
    this.row = row;
    this.col = col;
    this.cellState = cellState;
}
function Maze(width, height, callback) {
    var self = this;
    this.width = width % 2 !== 0 ? width : width + 1;
    this.height = height % 2 !== 0 ? height : height + 1;
    this.branchableCells = {};
    this.bCellsArray = [];
    this.grid = [];
    this.cachedCells = [];
    this.possibleExits = function(cell) {
	var row = cell.row;
	var col = cell.col;
	var exits = [];
	var up = !(row <= 1 || this.grid[row-2][col].cellState === 'hall');
	var down = !(row >= this.height-2 || this.grid[row+2][col].cellState === 'hall');
	var left = !(col <= 1 || this.grid[row][col-2].cellState === 'hall');
	var right = !(col >= this.width - 2 || this.grid[row][col+2].cellState === 'hall');
	if (up) { 
	    exits.unshift('up');
	}
	if (down) {
	    exits.unshift('down');
	}
	if (left) { 
	    exits.unshift('left');
	}
	if (right) { 
	    exits.unshift('right');
	}
	return exits;
    };
    this.zigAndZag = function(cell) {
	var exits = this.possibleExits(cell);
	while (exits.length > 0) {
	    var idx = Math.floor(Math.random()*(exits.length));
	    var direction = exits[idx];
	    if (direction === 'right') {
		this.grid[cell.row][cell.col + 1].cellState = 'hall';
		this.grid[cell.row][cell.col + 2].cellState = 'hall';
		this.cachedCells.push(this.grid[cell.row][cell.col + 1]);
		this.cachedCells.push(this.grid[cell.row][cell.col + 2]);
		cell = this.grid[cell.row][cell.col + 2];
	    } else if (direction === 'left') {
		this.grid[cell.row][cell.col - 1].cellState = 'hall';
		this.grid[cell.row][cell.col - 2].cellState = 'hall';
		this.cachedCells.push(this.grid[cell.row][cell.col - 1]);
		this.cachedCells.push(this.grid[cell.row][cell.col - 2]);
		cell = this.grid[cell.row][cell.col - 2];
	    } else if (direction === 'up') {
		this.grid[cell.row-1][cell.col].cellState = 'hall';
		this.grid[cell.row-2][cell.col].cellState = 'hall';
		this.cachedCells.push(this.grid[cell.row - 1][cell.col]);
		this.cachedCells.push(this.grid[cell.row - 2][cell.col]);
		cell = this.grid[cell.row-2][cell.col];
	    }else if (direction === 'down') {
		this.grid[cell.row+1][cell.col].cellState = 'hall';
		this.grid[cell.row+2][cell.col].cellState = 'hall';
		this.cachedCells.push(this.grid[cell.row + 1][cell.col]);
		this.cachedCells.push(this.grid[cell.row + 2][cell.col]);
		cell = this.grid[cell.row+2][cell.col];
	    }
	    exits = this.possibleExits(cell);
	    if (exits.length > 1) {
		var key = 'x' + cell.col + 'y' + cell.row;
		if (!this.branchableCells.hasOwnProperty(key)) {
		    this.branchableCells[key] = true;
		    this.bCellsArray.push(cell);
		}
	    }
	}
    }
    this.generateMaze = function(cell) {
	this.zigAndZag(cell);
	var p;
	while (this.bCellsArray.length > 0) {
	    cell = this.bCellsArray.pop();
	    var key = 'x' + cell.col + 'y' + cell.row;
	    delete this.branchableCells[key];
	    var exits = this.possibleExits(cell);
	    if (exits.length > 0) {
		this.zigAndZag(cell);
	    }
	}
    }
    this.draw = function(callback,hasBegun) {
	if (!hasBegun) {
	    ctx.fillStyle = WALL_COLOR;
	    ctx.fillRect(0,0,MAZE_SCALE*self.width, MAZE_SCALE*self.height);
	    ctx.fillStyle = HALL_COLOR;
	}
	if (self.cachedCells.length > 0) {
	    setTimeout(function(){
		    var cell = self.cachedCells.shift();
		    ctx.fillRect(MAZE_SCALE*cell.col, MAZE_SCALE*cell.row, MAZE_SCALE,MAZE_SCALE);
		    self.draw(callback,true);
		}, 1000/SPEED);
	} else {
	    callback();
	}
    };
    var row, col;
    for (row = 0; row < this.height; row++) {
	var newRow = [];
	for (col = 0; col < this.width; col++)
	    {
		newRow.push(new Cell(row, col, 'wall'));
	    }
	this.grid.push(newRow);
    }
    var startCell = this.grid[1][1];
    startCell.cellState = 'hall';
    this.generateMaze(startCell);
    this.grid[0][1].cellState = 'hall';
    this.grid[this.height - 1][this.width - 2].cellState = 'hall';
    this.cachedCells.unshift(startCell);
    this.cachedCells.unshift(this.grid[this.height - 1][this.width - 2]);
    this.cachedCells.unshift(this.grid[0][1]);
    this.draw(callback);
}

(function makeANewOne() {
    a = new Maze(MAZE_WIDTH, MAZE_HEIGHT, makeANewOne);
}());