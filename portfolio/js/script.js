let canvas = document.querySelector('#canvas').appendChild(document.createElement('canvas'));
let ctx = canvas.getContext('2d');
let xdata = document.getElementById("x");
let ydata = document.getElementById("y");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let mouse = {
    x: undefined,
    y: undefined,
    clicked: false
}

window.addEventListener('click', () => {
    mouse.clicked = !mouse.clicked;
})

window.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
})
class Star {
    constructor(x, y, radius, color) {
        this.x = x;
        this.y = y;
        this.radius = radius * 2;
        this.color = color;
    }
    draw() {
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        ctx.fill();
    }

    update() {
        this.draw()
        let velX = (((mouse.x - canvas.width / 2)) * this.radius) * 0.01;
        let velY = (((mouse.y - canvas.height / 2)) * this.radius) * 0.01;
        if (mouse.x || mouse.y) {
            this.x += velX;
            this.y += velY;
        }


        if (this.x - this.radius > canvas.width) {
            this.x = -this.radius;
        }
        if (this.y - this.radius > canvas.height) {
            this.y = -this.radius;
        }
        if (this.x + this.radius < 0) {
            this.x = canvas.width + this.radius;
        }
        if (this.y + this.radius < 0) {
            this.y = canvas.height + this.radius;
        }
    }
}

function background() {
    ctx.fillStyle = "hsl(266,76%,8%)";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function InstantiateStars(count) {
    let stars = [];
    return new Promise(resolve => {
        for (let i = 0; i < count; i++) {
            let rndX = Math.round(Math.random() * canvas.width);
            let rndY = Math.round(Math.random() * canvas.height);
            let radius = Math.random();
            let rndC = `hsl(266,76%, ${Math.trunc((Math.round(radius * 100)))}%)`;
            stars.push(new Star(rndX, rndY, radius, rndC))
        }
        resolve(stars)
    })
}
let doneStars;
async function sort() {
    doneStars = [...await InstantiateStars(50)].sort((a, b) => a.radius - b.radius);
}
sort();
let line = {
    x: canvas.width / 2,
    y: canvas.height / 2,
    draw() {
        if (mouse.clicked) {
            ctx.strokeStyle = "hsl(100,100%,50%)";
            ctx.beginPath();
            ctx.moveTo(this.x, this.y);
            ctx.lineTo(mouse.x, mouse.y);
            ctx.stroke();
        }
    }
}

let loop = setInterval(() => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    background();
    for (let i = 0; i < doneStars.length; i++) {
        doneStars[i].update();
    }
    line.draw();
}, 1000 / 60);